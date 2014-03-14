<?php
App::uses('AppController', 'Controller');

App::import('Model','City');
/**
 * Postals Controller
 *
 * @property Postal $Postal
 * @property PaginatorComponent $Paginator
 */
class PostalsController extends AppController {

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
		if ($this->request->is('post')) {
			$this->Postal->create();
			$this->request->data['Postal']['city_id'] = $this->request->data['cities'];
			if ($this->Postal->save($this->request->data)) {
				$this->Session->setFlash(__('The postal has been saved.'), 'alert', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postal could not be saved. Please, try again.'), 'alert', array('class' => 'danger'));
			}
		}

		$cities = new City();
		$cities = $cities->find('list');
		$this->set(compact('cities'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Postal->exists($id)) {
			throw new NotFoundException(__('Invalid postal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Postal']['city_id'] = $this->request->data['Postal']['cities'];
			if ($this->Postal->save($this->request->data)) {
				
				$this->Session->setFlash(__('The postal has been saved.'), 'alert', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postal could not be saved. Please, try again.'), 'alert', array('class' => 'danger'));
			}
		} else {
			$options = array('conditions' => array('Postal.' . $this->Postal->primaryKey => $id));
			$this->request->data = $this->Postal->find('first', $options);

			$cities = new City();
			$cities = $cities->find('list');
			$this->set(compact('cities'));
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
		$this->Postal->id = $id;
		if (!$this->Postal->exists()) {
			throw new NotFoundException(__('Invalid postal'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Postal->delete()) {
			$this->Session->setFlash(__('The postal has been deleted.'), 'alert', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('The postal could not be deleted. Please, try again.'), 'alert', array('class' => 'danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
