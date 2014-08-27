<?php
App::uses('AppController', 'Controller');
/**
 * Sponsors Controller
 *
 * @property Sponsor $Sponsor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SponsorsController extends AdminAppController {
	
	


/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session','Security');

    public  function beforeFilter(){

        //SSLを強制するアクションを設定
       		$this->Security->validatePost = false;
            $this->Security->blackHoleCallback = 'forceSSL';
            $this->Security->requireSecure();
   $this->Security->csrfCheck = false;
           }
    public function forceSSL() {
        $this->redirect('https://' . env('SERVER_NAME') . $this->here);
    }
	
/**
 * paginator settings
 */
	public $paginate = array(
			'limit' => 10,
			'order' => array(
				'Sponsor.id' => 'asc'
			)
		);
/**
 * This controller use following models
 */
	public $uses = array(
			'Sponsor'
		);
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Paginator->settings = $this->paginate;
		if (!empty($_POST['data']))
		{
			$conditions = array();
			if (!empty($_POST['data']['id'])) {
			$conditions = array_merge($conditions, array('Sponsor.id' => $_POST['data']['id']));
			}
			
			
			if (!empty($_POST['data']['name'])) {
			$conditions = array_merge($conditions, array('Sponsor.sponsor_name LIKE' => '%'.$_POST['data']['name'].'%'));
			}
			if (!empty($_POST['data']['prefecture_id'])) {
		   $conditions = array_merge($conditions, array('Sponsor.prefecture_id' => $_POST['data']['prefecture_id']));
			}
		   
			$this->Paginator->settings = array(
				'conditions' => $conditions,
    			'limit' => 10,
				'order' => array(
					'Sponsor.id' => 'asc'
				)
			);
		}
		$this->Sponsor->recursive = 1;
		$this->set('sponsors', $this->Paginator->paginate('Sponsor'));
		$prefectures = $this->Sponsor->Prefecture->find('list');
		$this->set(compact('prefectures'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sponsor->exists($id)) {
			throw new NotFoundException(__('Invalid sponsor'));
		}

		$options = array('conditions' => array('Sponsor.' . $this->Sponsor->primaryKey => $id));
		$this->set('sponsor', $this->Sponsor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sponsor->create();
			if ($this->Sponsor->save($this->request->data)) {
				$this->Session->setFlash('The sponsor has been saved.', 'default', array('class' =>'alert alert-success'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The sponsor could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
			}
		}
		$users = $this->Sponsor->User->find('list');
		$prefectures = $this->Sponsor->Prefecture->find('list');
		$this->set(compact('prefectures'));
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Sponsor->id = $id;
		if (!$this->Sponsor->exists($id)) {
			throw new NotFoundException(__('Invalid sponsor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sponsor->save($this->request->data)) {
				$this->Session->setFlash('The sponsor has been saved.', 'default', array('class' =>'alert alert-success'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The sponsor could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
			}
		} else {
			$options = array('conditions' => array('Sponsor.' . $this->Sponsor->primaryKey => $id));
			$this->request->data = $this->Sponsor->find('first', $options);
		}
		$users = $this->Sponsor->User->find('list');
		$prefectures = $this->Sponsor->Prefecture->find('list');
		$this->set(compact('prefectures'));
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Sponsor->id = $id;
		if (!$this->Sponsor->exists()) {
			throw new NotFoundException(__('Invalid sponsor'));
		}

		if ($this->Sponsor->delete()) {
			$this->Session->setFlash('The sponsor has been deleted.', 'default', array('class' =>'alert alert-success'), 'success');
		} else {
			$this->Session->setFlash('The sponsor could not be deleted. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
