<?php
App::uses('AppController', 'Controller');
/**
 * HoursBlocks Controller
 *
 * @property HoursBlock $HoursBlock
 * @property PaginatorComponent $Paginator
 */
class HoursBlocksController extends AppController {

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
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin
	

		$this->HoursBlock->recursive = 0;
		$this->set('hoursBlocks', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin
	

		if (!$this->HoursBlock->exists($id)) {
			throw new NotFoundException(__('Invalid hours block'));
		}
		$options = array('conditions' => array('HoursBlock.' . $this->HoursBlock->primaryKey => $id));
		$this->set('hoursBlock', $this->HoursBlock->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin
	

		if ($this->request->is('post')) {
			$this->HoursBlock->create();
			if ($this->HoursBlock->save($this->request->data)) {
				$this->Session->setFlash(__('The hours block has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hours block could not be saved. Please, try again.'));
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
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin
	

		if (!$this->HoursBlock->exists($id)) {
			throw new NotFoundException(__('Invalid hours block'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->HoursBlock->save($this->request->data)) {
				$this->Session->setFlash(__('The hours block has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hours block could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('HoursBlock.' . $this->HoursBlock->primaryKey => $id));
			$this->request->data = $this->HoursBlock->find('first', $options);
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
		// Si l'utilisateur est admin
		if(!($this->Session->read('Auth.User.role') >= 90)) {
			throw new NotFoundException;
		}
		$this->layout = 'admin'; // Layout admin
	
		
		$this->HoursBlock->id = $id;
		if (!$this->HoursBlock->exists()) {
			throw new NotFoundException(__('Invalid hours block'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HoursBlock->delete()) {
			$this->Session->setFlash(__('The hours block has been deleted.'));
		} else {
			$this->Session->setFlash(__('The hours block could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
