<?php
App::uses('AppController', 'Controller');
/**
 * Locks Controller
 *
 * @property Lock $Lock
 * @property PaginatorComponent $Paginator
 */
class LocksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Lock->recursive = 0;
		$this->set('locks', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Lock->exists($id)) {
			throw new NotFoundException(__('Invalid lock'));
		}
		$options = array('conditions' => array('Lock.' . $this->Lock->primaryKey => $id));
		$this->set('lock', $this->Lock->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Lock->create();
			if ($this->Lock->save($this->request->data)) {
				$this->Session->setFlash(__('The lock has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lock could not be saved. Please, try again.'));
			}
		}
		$bacs = $this->Lock->Bac->find('list');
		$this->set(compact('bacs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Lock->exists($id)) {
			throw new NotFoundException(__('Invalid lock'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Lock->save($this->request->data)) {
				$this->Session->setFlash(__('The lock has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lock could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Lock.' . $this->Lock->primaryKey => $id));
			$this->request->data = $this->Lock->find('first', $options);
		}
		$bacs = $this->Lock->Bac->find('list');
		$this->set(compact('bacs'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Lock->id = $id;
		if (!$this->Lock->exists()) {
			throw new NotFoundException(__('Invalid lock'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Lock->delete()) {
			$this->Session->setFlash(__('The lock has been deleted.'));
		} else {
			$this->Session->setFlash(__('The lock could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
