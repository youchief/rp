<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * People Controller
 *
 * @property Person $Person
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PeopleController extends AppController {

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator', 'Session');
        public $helpers = array('Captcha');

        public function checkcode($coupon_id) {
                $codechecked = $this->Session->read('code');
                $coupon = $this->Person->Coupon->findById($coupon_id);
                if ($coupon['Coupon']['active'] == 0) {
                        $this->Session->setFlash(__("Ce concours est maintenant terminé, rendez-vous prochainement pour d'autre privilèges"), 'default', array('class' => 'alert alert-danger'));
                        $this->redirect($this->referer());
                }
                if ($codechecked) {
                        $this->redirect(array('action' => 'subscribe', $coupon_id));
                } else {
                        $this->redirect(array('action' => 'code', $coupon_id));
                }
        }

        public function code($coupon_id) {
                if ($this->request->is('post')) {
                        $coupon = $this->Person->Coupon->findById($coupon_id);
                        if ($coupon['Coupon']['active'] == 0) {
                                $this->Session->setFlash(__("Ce concours est maintenant terminé, rendez-vous prochainement pour d'autre privilèges"), 'default', array('class' => 'alert alert-danger'));
                                $this->redirect($this->referer());
                        }

                        $this->Person->Coupon->Edition->recursive = -1;
                        $edition = $this->Person->Coupon->Edition->find('first', array('conditions' => array('Edition.active' => 1)));
                        if ($this->request->data['Edition']['code'] == $edition['Edition']['code']) {
                                $this->Session->write('code', 1);
                                $this->redirect(array('action' => 'subscribe', $coupon_id));
                        } else {
                                $this->Session->setFlash(__('Code erroné'), 'default', array('class' => 'alert alert-danger'));
                        }
                }
        }

        /**
         * admin_add method
         *
         * @return void
         */
        public function subscribe($coupon_id) {

                $codechecked = $this->Session->read('code');
                if (!$codechecked) {
                        $this->redirect(array('action' => 'code', $coupon_id));
                }

                if ($this->request->is('post')) {
                        $this->Person->create();
                        //$this->Person->setCaptcha($this->Captcha->getVerCode()); //getting from component and passing to model to make proper validation check
                        //$this->Person->set($this->request->data);
                        $already = $this->Person->find('all', array('conditions' => array('Person.coupon_id' => $coupon_id, 'Person.email' => $this->request->data['Person']['email'])));
                        if (!empty($already)) {
                                $this->Session->setFlash(__('Vous participez déjà à ce tirage au sort.'), 'default', array('class' => 'alert alert-danger'));
                                $this->redirect(array('controller' => 'coupons', 'action' => 'shop'));
                        }

                        $this->request->data['Person']['coupon_id'] = $coupon_id;
                        $coupon = $this->Person->Coupon->findById($coupon_id);

                        if ($this->Person->save($this->request->data)) {
                                //$this->_notifyparticipation($coupon_id, $this->Person->getLastInsertID());
                                $this->Session->setFlash(__('Merci pour votre participation à: ') . strtoupper($coupon['Coupon']['name']) . ". Vous pouvez également participer à d'autres privilèges.", 'default', array('class' => 'alert alert-success'));

                                return $this->redirect(array('controller' => 'coupons', 'action' => 'shop'));
                        } else {
                                
                        }
                }
                //$this->Captcha = $this->Components->load('Captcha', array('captchaType' => 'image', 'jquerylib' => true, 'modelName' => 'Person', 'fieldName' => 'captcha')); //load it
                $coupon = $this->Person->Coupon->findById($coupon_id);
                $this->set('coupon', $coupon);
        }

        public function _notifyparticipation($coupon_id, $person_id) {
                $person = $this->Person->findById($person_id);
                $coupon = $this->Person->Coupon->findById($coupon_id);
                $email = new CakeEmail();
                $email->emailFormat('html');
                $email->template('participate');
                $email->from(array('bellavita@retraitespopulaires.ch' => 'Retraites Populaires - Magazine Bella Vita'));
                $email->to($person['Person']['email']);
                $email->subject('Merci de votre participation');
                $email->viewVars(array('person' => $person, 'coupon' => $coupon));
                $email->send();
        }

        /**
         * admin_index method
         *
         * @return void
         */
        public function admin_index() {
                $this->Person->recursive = 0;
                $this->set('people', $this->Paginator->paginate());
        }

        /**
         * admin_view method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_view($id = null) {
                if (!$this->Person->exists($id)) {
                        throw new NotFoundException(__('Invalid person'));
                }
                $options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
                $this->set('person', $this->Person->find('first', $options));
        }

        /**
         * admin_add method
         *
         * @return void
         */
        public function admin_add() {
                if ($this->request->is('post')) {
                        $this->Person->create();
                        if ($this->Person->save($this->request->data)) {
                                $this->Session->setFlash(__('The person has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The person could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                }
                $coupons = $this->Person->Coupon->find('list');
                $this->set(compact('coupons'));
        }

        /**
         * admin_edit method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_edit($id = null) {
                if (!$this->Person->exists($id)) {
                        throw new NotFoundException(__('Invalid person'));
                }
                if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->Person->save($this->request->data)) {
                                $this->Session->setFlash(__('The person has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The person could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                } else {
                        $options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
                        $this->request->data = $this->Person->find('first', $options);
                }
                $coupons = $this->Person->Coupon->find('list');
                $this->set(compact('coupons'));
        }

        /**
         * admin_delete method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_delete($id = null) {
                $this->Person->id = $id;
                if (!$this->Person->exists()) {
                        throw new NotFoundException(__('Invalid person'));
                }
                $this->request->onlyAllow('post', 'delete');
                if ($this->Person->delete()) {
                        $this->Session->setFlash(__('Person deleted'), 'default', array('class' => 'alert alert-success'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Person was not deleted'), 'default', array('class' => 'alert alert-error'));
                return $this->redirect(array('action' => 'index'));
        }

}
