<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Coupons Controller
 *
 * @property Coupon $Coupon
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CouponsController extends AppController {

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator', 'Session');

        /**
         * admin_index method
         *
         * @return void
         */
        public function shop() {
                $this->Coupon->recursive = 0;
                $this->Paginator->settings = array(
                    'limit' => 4
                );
                $this->set('coupons', $this->Paginator->paginate());
        }

        
        public function admin_preview() {
                $this->Coupon->recursive = 0;
                $this->Paginator->settings = array(
                    'limit' => 4
                );
                $this->set('coupons', $this->Paginator->paginate());
        }
        
        public function admin_preview_detail($id = null) {
                if (!$this->Coupon->exists($id)) {
                        throw new NotFoundException(__('Invalid coupon'));
                }
                $options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
                $this->set('coupon', $this->Coupon->find('first', $options));
        }
        
        public function view($id = null) {
                if (!$this->Coupon->exists($id)) {
                        throw new NotFoundException(__('Invalid coupon'));
                }
                $options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
                $this->set('coupon', $this->Coupon->find('first', $options));
        }

        public function admin_index() {
                $this->Coupon->recursive = 0;
                $this->set('coupons', $this->Paginator->paginate());
        }

        public function admin_lotery($coupon_id) {
                $coupon = $this->Coupon->findById($coupon_id);
                $people = $coupon['Person'];

                if (count($people) < $coupon['Coupon']['nb_available']) {
                        $this->Session->setFlash(__('Il y a plus de prix que de participant!'), 'default', array('class' => 'alert alert-danger'));
                        $this->redirect($this->referer());
                }


                if (count($people) < 3) {
                        $this->Session->setFlash(__('Vous devez avoir au moins 3 participants!'), 'default', array('class' => 'alert alert-danger'));
                        $this->redirect($this->referer());
                }

                $winner_int = array_rand($people, $coupon['Coupon']['nb_available']);


                $winners = array();
                foreach ($winner_int as $int) {
                        $winners[] = $people[$int];
                }

                $this->Session->write('winners', $winners);
                $this->set('winners', $winners);
                $this->set('coupon', $coupon);
        }

        public function admin_validate($coupon_id) {
                $winners = $this->Session->read('winners');
                $i = 0;
                foreach ($winners as $winner) {
                        $this->Coupon->Person->id = $winner['id'];
                        $this->Coupon->Person->saveField('winner', 1);
                        $i++;

                        try {
                                $this->_notify($winner['id'], $coupon_id);
                        } catch (Exception $exc) {
                                echo $exc->getTraceAsString();
                        }
                }

                $this->Coupon->id = $coupon_id;
                $this->Coupon->saveField('active', 0);

                $this->redirect(array('action' => 'view', $coupon_id));
        }

        public function _notify($winner_id, $coupon_id) {
                $winner = $this->Coupon->Person->read(null, $winner_id);
                $coupon = $this->Coupon->read(null, $coupon_id);
                $email = new CakeEmail();
                $email->emailFormat('html');
                $email->template('winner');
                $email->from(array('bellavita@retraitespopulaires.ch' => 'Retraites Populaires - Magazine Bella Vita'));
                $email->to($winner['Person']['email']);
                $email->subject('Félicitations vous avez été tiré au sort!');
                $email->viewVars(array('winner' => $winner, 'coupon' => $coupon));
                $email->send();
        }

        /**
         * admin_view method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_view($id = null) {
                if (!$this->Coupon->exists($id)) {
                        throw new NotFoundException(__('Invalid coupon'));
                }
                $options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
                $this->set('coupon', $this->Coupon->find('first', $options));
        }

        /**
         * admin_add method
         *
         * @return void
         */
        public function admin_add() {
                if ($this->request->is('post')) {
                        $this->Coupon->create();
                        if ($this->Coupon->save($this->request->data)) {
                                $this->Session->setFlash(__('The coupon has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The coupon could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                }
                $editions = $this->Coupon->Edition->find('list');
                $this->set(compact('editions'));
        }

        /**
         * admin_edit method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_edit($id = null) {
                if (!$this->Coupon->exists($id)) {
                        throw new NotFoundException(__('Invalid coupon'));
                }
                if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->Coupon->save($this->request->data)) {
                                $this->Session->setFlash(__('The coupon has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The coupon could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                } else {
                        $options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
                        $this->request->data = $this->Coupon->find('first', $options);
                }
                $editions = $this->Coupon->Edition->find('list');
                $this->set(compact('editions'));
        }

        /**
         * admin_delete method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_delete($id = null) {
                $this->Coupon->id = $id;
                if (!$this->Coupon->exists()) {
                        throw new NotFoundException(__('Invalid coupon'));
                }
                $this->request->onlyAllow('post', 'delete');
                if ($this->Coupon->delete()) {
                        $this->Session->setFlash(__('Coupon deleted'), 'default', array('class' => 'alert alert-success'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Coupon was not deleted'), 'default', array('class' => 'alert alert-error'));
                return $this->redirect(array('action' => 'index'));
        }

        public function part_view($id) {
                if (!$this->Coupon->exists($id)) {
                        throw new NotFoundException(__('Invalid coupon'));
                }
                $options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
                $this->set('coupon', $this->Coupon->find('first', $options));
        }

        public function part_index() {
                $this->Coupon->recursive = 0;
                $this->set('coupons', $this->Paginator->paginate());
        }

        public function admin_print($coupon_id) {
                $winners = $this->Coupon->Person->find('all', array('conditions' => array('Person.coupon_id' => $coupon_id, 'Person.winner' => 1)));
                $this->set('people', $winners);
        }

}
