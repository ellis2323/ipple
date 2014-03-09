<?php
App::uses('AppController', 'Controller');
/**
 * Postals Controller
 *
 * @property Postal $Postal
 * @property PaginatorComponent $Paginator
 */
class PostalsController extends AppController {

	// Autorisation
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny();
	}


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
		
		$this->Postal->recursive = 0;
		$this->set('postals', $this->Paginator->paginate());
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

		if (!$this->Postal->exists($id)) {
			throw new NotFoundException(__('Invalid postal'));
		}
		$options = array('conditions' => array('Postal.' . $this->Postal->primaryKey => $id));
		$this->set('postal', $this->Postal->find('first', $options));
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
			$this->Postal->create();
			if ($this->Postal->save($this->request->data)) {
				$this->Session->setFlash(__('The postal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postal could not be saved. Please, try again.'));
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

		if (!$this->Postal->exists($id)) {
			throw new NotFoundException(__('Invalid postal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Postal->save($this->request->data)) {
				$this->Session->setFlash(__('The postal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postal could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Postal.' . $this->Postal->primaryKey => $id));
			$this->request->data = $this->Postal->find('first', $options);
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

		$this->Postal->id = $id;
		if (!$this->Postal->exists()) {
			throw new NotFoundException(__('Invalid postal'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Postal->delete()) {
			$this->Session->setFlash(__('The postal has been deleted.'));
		} else {
			$this->Session->setFlash(__('The postal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
