<?php
App::uses('AppController', 'Controller');
/**
 * LoginAccounts Controller
 *
 * @property LoginAccount $LoginAccount
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class LoginAccountsController extends AppController {

/**
 *  Layout
 *
 * @var string
 */
	public $layout = 'bootstrap';

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('TwitterBootstrap.BootstrapHtml', 'TwitterBootstrap.BootstrapForm', 'TwitterBootstrap.BootstrapPaginator');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->LoginAccount->recursive = 0;
		$this->set('loginAccounts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->LoginAccount->id = $id;
		if (!$this->LoginAccount->exists()) {
			throw new NotFoundException(__('Invalid %s', __('login account')));
		}
		$this->set('loginAccount', $this->LoginAccount->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LoginAccount->create();
			if ($this->LoginAccount->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('login account')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('login account')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->LoginAccount->id = $id;
		if (!$this->LoginAccount->exists()) {
			throw new NotFoundException(__('Invalid %s', __('login account')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LoginAccount->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('login account')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('login account')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->LoginAccount->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->LoginAccount->id = $id;
		if (!$this->LoginAccount->exists()) {
			throw new NotFoundException(__('Invalid %s', __('login account')));
		}
		if ($this->LoginAccount->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('login account')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('login account')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}

}
