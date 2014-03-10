<?php
App::uses('AppController', 'Controller');
/**
 * DatesBlocks Controller
 *
 * @property DatesBlock $DatesBlock
 * @property PaginatorComponent $Paginator
 */
class DatesBlocksController extends AppController {

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
	
		$this->DatesBlock->recursive = 0;
		$this->set('datesBlocks', $this->Paginator->paginate());
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


		if (!$this->DatesBlock->exists($id)) {
			throw new NotFoundException(__('Invalid dates block'));
		}
		$options = array('conditions' => array('DatesBlock.' . $this->DatesBlock->primaryKey => $id));
		$this->set('datesBlock', $this->DatesBlock->find('first', $options));
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
			$this->DatesBlock->create();
			if ($this->DatesBlock->save($this->request->data)) {
				$this->Session->setFlash(__('The dates block has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dates block could not be saved. Please, try again.'));
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

		if (!$this->DatesBlock->exists($id)) {
			throw new NotFoundException(__('Invalid dates block'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DatesBlock->save($this->request->data)) {
				$this->Session->setFlash(__('The dates block has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dates block could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DatesBlock.' . $this->DatesBlock->primaryKey => $id));
			$this->request->data = $this->DatesBlock->find('first', $options);
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

		$this->DatesBlock->id = $id;
		if (!$this->DatesBlock->exists()) {
			throw new NotFoundException(__('Invalid dates block'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DatesBlock->delete()) {
			$this->Session->setFlash(__('The dates block has been deleted.'));
		} else {
			$this->Session->setFlash(__('The dates block could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
