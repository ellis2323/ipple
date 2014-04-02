<?php
App::uses('AppController', 'Controller');



/**
 * Params Controller
 *
 * @property Param $Param
 * @property PaginatorComponent $Paginator
 */
class ParamsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');




	public function price_bacs(){

		if($this->request->is('ajax')){

			$this->layout = false;

			$nb_bac = $this->request->data['Order']['nb_bacs'];

			// On récupère les paramètres dans la bdd
			$price_bac = $this->Param->findByKey('price_bac_monthly');
			$price_bac = $price_bac['Param']['value'];


			$nb_bac_min = $this->Param->findByKey('nb_bac_min');
			$nb_bac_min = $nb_bac_min['Param']['value'];

			$nb_bac_max = $this->Param->findByKey('nb_bac_max');
			$nb_bac_max = $nb_bac_max['Param']['value'];


			// On vérifie que le prix correspond bien au minimum de bac
			
			// si le nombre de bac esti nférieur
			if($nb_bac < $nb_bac_min ) {
				$price = $nb_bac_min*$price_bac;
			}
			// si le nombre de bac est supérieur
			elseif($nb_bac > $nb_bac_max ) {
				$price = $nb_bac_max*$price_bac;
			}
			// sinon on retourne le
			else {
				$price = $nb_bac*$price_bac;
			}

			$price = json_encode($price);

			$this->set(compact('price'));
	


		}


	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Param->recursive = 0;
		$this->set('params', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Param->exists($id)) {
			throw new NotFoundException(__('Invalid param'));
		}
		$options = array('conditions' => array('Param.' . $this->Param->primaryKey => $id));
		$this->set('param', $this->Param->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Param->create();
			if ($this->Param->save($this->request->data)) {
				$this->Session->setFlash(__('The param has been saved.'), 'alert', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The param could not be saved. Please, try again.'), 'alert', array('class' => 'danger'));
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
		if (!$this->Param->exists($id)) {
			throw new NotFoundException(__('Invalid param'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Param->save($this->request->data)) {
				$this->Session->setFlash(__('The param has been saved.'), 'alert', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The param could not be saved. Please, try again.'), 'alert', array('class' => 'danger'));
			}
		} else {
			$options = array('conditions' => array('Param.' . $this->Param->primaryKey => $id));
			$this->request->data = $this->Param->find('first', $options);
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
		$this->Param->id = $id;
		if (!$this->Param->exists()) {
			throw new NotFoundException(__('Invalid param'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Param->delete()) {
			$this->Session->setFlash(__('The param has been deleted.'), 'alert', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('The param could not be deleted. Please, try again.'), 'alert', array('class' => 'danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
