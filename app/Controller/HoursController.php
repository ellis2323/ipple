<?php
App::uses('AppController', 'Controller');
/**
 * Hours Controller
 *
 * @property Hour $Hour
 * @property PaginatorComponent $Paginator
 */
class HoursController extends AppController {

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

		$this->Hour->recursive = 0;
		$this->set('hours', $this->Paginator->paginate());
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

		if (!$this->Hour->exists($id)) {
			throw new NotFoundException(__('Invalid hour'));
		}
		$options = array('conditions' => array('Hour.' . $this->Hour->primaryKey => $id));
		$this->set('hour', $this->Hour->find('first', $options));
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
			$this->Hour->create();
			if ($this->Hour->save($this->request->data)) {
				$this->Session->setFlash(__('The hour has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hour could not be saved. Please, try again.'));
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

		if (!$this->Hour->exists($id)) {
			throw new NotFoundException(__('Invalid hour'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Hour->save($this->request->data)) {
				$this->Session->setFlash(__('The hour has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hour could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Hour.' . $this->Hour->primaryKey => $id));
			$this->request->data = $this->Hour->find('first', $options);
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
		
		$this->Hour->id = $id;
		if (!$this->Hour->exists()) {
			throw new NotFoundException(__('Invalid hour'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Hour->delete()) {
			$this->Session->setFlash(__('The hour has been deleted.'));
		} else {
			$this->Session->setFlash(__('The hour could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
