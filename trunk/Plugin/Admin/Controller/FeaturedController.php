<?php
App::uses('AppController', 'Controller');
/**
 * Featured Controller
 *
 * @property TourPackage $TourPackage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FeaturedController extends AdminAppController {

/**
 * Components
 * @var array
 */
 
 
 //ssl用設定
		

	
	public $components = array(
			'Paginator', 'Session','Security'
		);
		
	
    public  function beforeFilter(){

        //SSLを強制するアクションを設定
       		$this->Security->validatePost = false;
            $this->Security->blackHoleCallback = 'forceSSL';
            $this->Security->requireSecure();
           }
    public function forceSSL() {
        $this->redirect('https://' . env('SERVER_NAME') . $this->here);
    }

/**
 * Models
 * @var array
 */
	public $uses = array(
			'TourPackage',
			'Prefecture',
			'Area',
			'Featured'
		);
/**
 * Pagination settings
 * @var array
 */
	public $paginate = array(
			'limit' => 10,
			'order' => array(
					'Featured.order' => 'asc',
					
				)
		);	
/**
 * index method
 *
 * @return void
 */
	public function index() {



				$this->paginate = array_merge($this->paginate, array(
						'conditions' => array('TourPackage.status' => "1",'Featured.is_visibility' => '1')
					));
		
		
		$this->Paginator->settings = $this->paginate;
		$this->Featured->recursive = 2;
		$this->set('featureds', $this->Paginator->paginate('Featured'));
		$this->set('areas', $this->Area->find('list'));
		$this->set('prefectures', $this->Prefecture->find('list'));
		
	}

	public function add()
	{
		if ($this->request->is('post'))
		{
			$this->Featured->create();
			if ($this->Featured->save($this->request->data)) {
				$this->Session->setFlash('The featured has been saved.', 'default', array('class' =>'alert alert-success'), 'success');
			} else {
				$this->Session->setFlash('The featured could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
				unset($_SESSION['idImgArr']);
			}
			$this->redirect(array('action' => 'index'));
		}
		$this->TourPackage->recursive = -1;
		$this->Featured->recursive = -1;
		$featured = $this->Featured->find('list', array(
				'fields' => array('Featured.tour_package_id')
			));
		$this->set('tourPackages', $this->TourPackage->find('list', array(
				'fields' => array('TourPackage.tour_name'),
				'conditions' => array(
						'NOT' => array(
								'TourPackage.id' => $featured
							),
						'TourPackage.status' => 1
					)
			)));
	}

	public function edit($id = null)
	{
		$this->Featured->id = $id;
		if (!$this->Featured->exists($id)) {
			throw new NotFoundException(__('Invalid featured'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Featured->save($this->request->data)) {
				$this->Session->setFlash('The featured has been saved.', 'default', array('class' =>'alert alert-success'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The featured could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
			}
		} else {
			$options = array('conditions' => array('Featured.' . $this->Featured->primaryKey => $id));
			$this->request->data = $this->Featured->find('first', $options);
			$this->set('tour_id', $this->request->data['Featured']['tour_package_id']);
			$this->TourPackage->recursive = -1;
			$this->Featured->recursive = -1;
			$featured = $this->Featured->find('list', array(
					'fields' => array('Featured.tour_package_id')
				));

			$this->set('tourPackages', $this->TourPackage->find('list', array(
					'fields' => array('TourPackage.tour_name')
				)));
		}
	}

	public function delete($id = null)
	{
		$this->Featured->id = $id;
		if (!$this->Featured->exists()) {
			throw new NotFoundException(__('Invalid featured'));
		}
		if ($this->Featured->delete()) {
			$this->Session->setFlash('The featured has been deleted.', 'default', array('class' =>'alert alert-success'), 'success');
		} else {
			$this->Session->setFlash('The featured could not be deleted. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
