<?php
App::uses('AppController', 'Controller');
/**
 * Editions Controller
 *
 * @property Edition $Edition
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EditionsController extends AppController {

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
	public function admin_index() {
		$this->Edition->recursive = 0;
		$this->set('editions', $this->Paginator->paginate());
	}

        
        public function index() {
		$this->Edition->recursive = 0;
		$this->set('editions', $this->Paginator->paginate());
	}
        
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$options = array('conditions' => array('Edition.' . $this->Edition->primaryKey => $id));
		$this->set('edition', $this->Edition->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Edition->create();
			if ($this->Edition->save($this->request->data)) {
				$this->Session->setFlash(__('The edition has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edition could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Edition->save($this->request->data)) {
				$this->Session->setFlash(__('The edition has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edition could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Edition.' . $this->Edition->primaryKey => $id));
			$this->request->data = $this->Edition->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Edition->id = $id;
		if (!$this->Edition->exists()) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Edition->delete()) {
			$this->Session->setFlash(__('Edition deleted'), 'default', array('class'=>'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Edition was not deleted'), 'default', array('class'=>'alert alert-error'));
		return $this->redirect(array('action' => 'index'));
	}}
