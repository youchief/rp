<?php

App::uses('Controller', 'Controller');
CakePlugin::load('Uploader');

class AppController extends Controller {

        public $helpers = array('Markdown');
        public $uses = array('Group');
        public $components = array(
            'Session',
            'Auth' => array(
                'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'home', 'admin' => false),
                'logoutRedirect' => array('controller' => 'coupons', 'action' => 'shop'),
                'authorize' => array('Controller') // Ligne ajoutée
            )
        );

        public function isAuthorized($user) {

                $actions = $this->Session->read('actions');

                if ($this->Auth->user('group_id') == 1) {
                        return true;
                } else {
                        return in_array($this->params['controller'] . '/' . $this->params['action'], $actions);
                }
        }

        public function beforeFilter() {

                //$this->isAuthorized($this->Auth->user());
                $this->Auth->allow(array('display', 'logout', 'login', 'shop', 'view', 'admin_logout', 'subscribe', 'code', 'checkcode', 'thanks'));
        }

        public function beforeRender() {
                $group = $this->Auth->user('group_id');
                if (isset($group)) {
                        $this->layout = 'default';
                        switch ($group) {
                                case 1:
                                        $this->set('header', 'header_admin');
                                        break;


                                case 2:
                                        $this->set('header', 'header_wgr');
                                        break;

                                case 3:
                                        $this->set('header', 'header_rp');
                                        break;
                                case 4:
                                        $this->set('header', 'header_part');
                                        break;

                                default:
                                        $this->set('header', 'header');
                                        break;
                        }
                } else {
                        $this->layout = 'anonymous';
                }
        }

}
