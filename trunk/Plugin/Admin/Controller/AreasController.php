<?php
App::uses('AppController', 'Controller');
/**
 * Areas Controller
 *
 * @property Area $Area
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AreasController extends AdminAppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array(
				'Paginator', 
				'Session',
				'Security'
			);

	
	 
	 //ssl用設定
		

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
	
	public $paginate = array(
			'limit' => 20,
        	'order' => array(
            	'Area.order' => 'asc'
		));

	public $uses = array(
			'Area',
			'Prefecture'
		);
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		
		$stage="fa";
		$conditions = array();
		if (!empty($_POST['data']['p_id']))
			{
				$stage="su";
				$this->paginate = array_merge($this->paginate, array(
						'conditions' => array('Area.prefecture_id' => $_POST['data']['p_id'])
					));
			
			}
		$this->Paginator->settings = $this->paginate;
		$this->set('areas', $this->Paginator->paginate('Area'));
		$this->set('prefectures', $this->Prefecture->find('list'));
	
	}

	/**
	 * view method
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Area->exists($id)) {
			throw new NotFoundException(__('Invalid area'));
		}
		$options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
		$this->set('area', $this->Area->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Area'] = array_merge($this->request->data['Area'], array('user_id' => 1));
			if ($this->Area->save($this->request->data)) {
				$this->Session->setFlash('The area has been saved.', 'default', array('class' =>'alert alert-success'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The area could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
			}
		}
		$prefectures = $this->Area->Prefecture->find('list');
		$this->set(compact('prefectures'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this->Area->id = $id;
		if (!$this->Area->exists($id)) {
			throw new NotFoundException(__('Invalid area'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Area->save($this->request->data)) {
				$this->Session->setFlash('The area has been saved.', 'default', array('class' =>'alert alert-success'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The area could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
			}
		} else {
			$options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
			$this->request->data = $this->Area->find('first', $options);
			$this->set('prefectureId', $this->request->data['Prefecture']['id']);
		}

		$prefectures = $this->Area->Prefecture->find('list');
		$this->set(compact('prefectures'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Area->id = $id;
		if (!$this->Area->exists()) {
			throw new NotFoundException(__('Invalid area'));
		}
		if ($this->Area->delete()) {
			$this->Session->setFlash('The area has been deleted.', 'default', array('class' =>'alert alert-success'), 'success');
		} else {
			$this->Session->setFlash('The area could not be deleted. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
