<?php
App::uses('AppController', 'Controller');
/**
 * Applications Controller
 *
 * @property Area $Area
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ApplicationsController extends AdminAppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	 
	 //ssl用設

	
	public $components = array(
				'Paginator', 
				'Session',
				'Export.Export',
				'Security'
			);

	
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
			'limit' => 10,
        	'order' => array(
            	'Applications.order' => 'asc'
		));

	public $uses = array(
			'Application',
			'Prefecture'
		);

	/**
	 * index method
	 * @return
	 */
	public function index()
	{
		
		if (!empty($_POST['data']))
		{
			
			
			$conditions = array();
			if (!empty($_POST['data']['date_s']) && !empty($_POST['data']['date_e']))
			{
				
				$conditions = array_merge($conditions, array(
						'Application.created_date BETWEEN ? AND ?' => array($_POST['data']['date_s'],$_POST['data']['date_e'])
					));
			}
			if (!empty($_POST['data']['name']))
			{
			
					$conditions = array_merge($conditions, array(
							'Application.name LIKE' =>'%'.$_POST['data']['name'].'%'
														
						));
			}
			if(!empty($_POST['data']['email'])){
			
					$conditions = array_merge($conditions, array(
								
										'Application.email LIKE' => '%'.$_POST['data']['email'].'%'
									)
								
						);
			}
			
			if (!empty($conditions))
				$this->paginate = array_merge($this->paginate, array(
						'conditions' => $conditions
					));
		}
		$this->Paginator->settings = $this->paginate;
		$this->Application->recursive = 2;
		$this->set('applications', $this->Paginator->paginate('Application'));
	}

	/**
	 * get name of pref via id
	 * @param  int $id
	 * @return array or Null
	 */
	public function getNamePref($id = null)
	{
		$this->Prefecture->recursive = -1;
		if ($id)
			return $this->Prefecture->find('first', array('Prefecture.id' => $id));
		return NULL;
	}
	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Application->id = $id;
		if (!$this->Application->exists()) {
			throw new NotFoundException(__('Invalid application'));
		}
		if ($this->Application->delete()) {
			$this->Session->setFlash('The application has been deleted.', 'default', array('class' =>'alert alert-success'), 'success');
		} else {
			$this->Session->setFlash('The application could not be deleted. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * export method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	
	public function export()
	{
		$this->Prefecture->recursive = -1;
		$data = $this->Application->find('all');
    	$this->Export->exportCsv($data, time() . '_application.csv');
	}


	/**
	 * view method
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Application->exists($id)) {
			throw new NotFoundException(__('Invalid application'));
		}
		$options = array('conditions' => array('Application.' . $this->Application->primaryKey => $id));
		$this->set('application', $this->Application->find('first', $options));
	}
	

}	