<?php
//App::uses('AppController', 'Controller');
/**
 * TourPackages Controller
 *
 * @property TourPackage $TourPackage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */

class TourpackagesController extends AdminAppController {
	
	//ssl用設定
		  


	public $id;
/**
 * Components
 * @var array
 */
	public $components = array(
			'Paginator', 'Session','Security'
		);



    public  function beforeFilter(){

        //SSLを強制するアクションを設定
       		$this->Security->validatePost = false;
            $this->Security->blackHoleCallback = 'forceSSL';
            $this->Security->requireSecure();
			
   $this->Security->csrfCheck = false;
			
			
        $this->response->header('Access-Control-Allow-Origin','*');
        $this->response->header('Access-Control-Allow-Methods','*');
        $this->response->header('Access-Control-Allow-Headers','X-Requested-With');
        $this->response->header('Access-Control-Allow-Headers','Content-Type, x-xsrf-token');

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
			'Category',
			'TourPackagesCategory',
			'Image',
			'Featured',
			'Sponsor'
		);
/**
 * Pagination settings
 * @var array
 */
	public $paginate = array(
			'limit' => 20,
			'order' => array(
					'TourPackage.id' => 'asc'
				)
		);	
/**
 * index method
 *
 * @return void
 */
	public function index($id = null) {
		if (isset($id))
		{
			$this->paginate = array(
				'limit' => 20,
				'order' => array(
						'TourPackage.id' => 'asc',
					),
				'conditions' => array('TourPackage.sponsor_id' => $id)
			);	
		}

		if (!empty($_GET['data']))
		{
			$conditions = array();
			if (!empty($_GET['data']['tour_name']))
			{
				
				$keyword = $_GET['data']['tour_name'];
				$conditions = array_merge($conditions, array(
						
								'TourPackage.tour_name LIKE' => '%'.$keyword.'%'
							
					));
			}
			if (!empty($_GET['data']['tour_id']))
			{
				
				$conditions = array_merge($conditions, array(
						
								'TourPackage.id' => $_GET['data']['tour_id']
							
					));
			}
			
			if (!empty($_GET['data']['sponsor_id']))
			{
				
				$conditions = array_merge($conditions, array(
							
										'TourPackage.sponsor_id' => $_GET['data']['sponsor_id']
									
								));
			}
			
			if (!empty($_GET['data']['sponsor_name']))
			{
			
				$keyword2 = $_GET['data']['sponsor_name'];
				
				$conditions = array_merge($conditions, array(
								
										'Sponsor.sponsor_name LIKE' => '%'.$keyword2.'%'
									
								));
				
				
			}
			if (!empty($_GET['status']))
			{
			
			$status=$_GET['status'];
			$this->set('st',$status);
				$today = date('Y-m-d');
		if($status=="hidden"){
			$this->set('st','hidden');
				$conditions = array_merge($conditions, array(
								'TourPackage.status' => 0
						));
	}elseif($status=="publish"){
			$today = date('Y-m-d');		
		$conditions = array_merge($conditions, array(
								'TourPackage.status' => "1",
								'TourPackage.schedule_start <=' =>  $today,
								'TourPackage.schedule_end >=' =>  $today
								
						));
			}elseif($status=="reserved"){
						$today = date('Y-m-d');
					$conditions = array_merge($conditions, array(
								'TourPackage.status' => "1",
								'TourPackage.schedule_start >=' => $today
						));
}elseif($status=="finished"){						
						$today = date('Y-m-d');
					$conditions = array_merge($conditions, array(
								'TourPackage.status' => "1",
								'TourPackage.schedule_end <=' => $today
						));
}
					
			
					
			}

			if (!empty($_GET['data']['prefecture_id']))
			{
				
				$areas = $this->Area->find('list', array(
						'fields' => array('Area.id', 'Area.id'),
						'conditions' => array('Area.prefecture_id' => $_GET['data']['prefecture_id'])
					));
				
					$conditions = array_merge($conditions, array(
							
								'TourPackage.area_id' => $areas
						));
				
			}
			
			if (!empty($conditions))
				$this->set('cond',$conditions);
				$this->paginate = array_merge($this->paginate, array(
						'conditions' => $conditions
					));
		}
		
		$this->Paginator->settings = $this->paginate;
		$this->TourPackage->recursive = 1;
		$this->set('id', $id);
		$this->set('tourPackages', $this->Paginator->paginate('TourPackage'));
		$this->set('categories', $this->Category->find('list'));
		$this->set('areas', $this->Area->find('list'));
		$this->set('prefectures', $this->Prefecture->find('list'));

		if (!isset($id))
			$this->render('index2');
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TourPackage->exists($id)) {
			throw new NotFoundException(__('Invalid tour package'));
		}
		$options = array('conditions' => array('TourPackage.' . $this->TourPackage->primaryKey => $id));
		$this->set('tourPackage', $this->TourPackage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
	$this->Session->delete('idT');
	
		
		$flag = false;
		
		if (!$this->request->is('post') && isset($_SESSION['idImgArr'])){
			
			unset($_SESSION['idImgArr']);
		}
		
			if (!isset($_SESSION['idImgArr']) || empty($_SESSION['idImgArr']))
		{
				
			$_SESSION['idImgArr'] = array();
		}	
		
		if(isset($_SESSION["csrfTokens"])){
		unset($_SESSION["csrfTokens"]);
		}
		
		
		
		
		if ($this->request->is('post')) {
			
		if(isset($this->request->data['submit'])){
					
		
			$sponsorid = $this->request->data['TourPackage']['sponsor_id'];
			$sponsorinfo = $this->TourPackage->Sponsor->find('list', array(
				'fields' => array('Sponsor.email'),
				'conditions' => array('Sponsor.id'=>$this->request->data['TourPackage']['sponsor_id'])
			));
			
						
			
			if($this->request->data['TourPackage']['pdf']['name']){
			$doc = $this->request->data['TourPackage']['pdf'];
			$this->request->data['TourPackage']['pdfname']=$this->request->data['TourPackage']['pdf']['name'];
			$this->request->data['TourPackage']['pdfcontent']=file_get_contents($this->request->data['TourPackage']['pdf']['tmp_name']);
			}
			
			$this->TourPackage->create(); 
			$this->TourPackage->set($this->request->data);
			 if ($this->TourPackage->validates()) {
			 	
			 if($sponsorinfo[$sponsorid]=="" && $this->request->data['TourPackage']['application_url']==""){
				$err = "主催者情報にメールアドレスの登録がない場合は申し込みURLは必須となります。";
				$this->set('err',$err);
				}
			 elseif ($this->TourPackage->save($this->request->data,false)) {
			
				$this->Session->setFlash('登録完了しました', 'default', array('class' =>'alert alert-success'), 'success');
				$flag = true;
			}else{
				$this->Session->setFlash('The tour package could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
				$_SESSION['idImgArr'] = array();
			}
			
					
			// Update tour_id field in the images table
			if (!empty($_SESSION['idImgArr']) && $this->TourPackage->id)
			{
				foreach ($_SESSION['idImgArr'] as $key => $value) 
				{
					$data = array('id' => $value, 'tour_id' => $this->TourPackage->id);
					$this->Image->save($data);
				}
				unset($_SESSION['idImgArr']);
				
			$this->Image->deleteAll(array('Image.tour_id' => null));
				
			}

			// save categories of tours
			if (!empty($_POST['data']['category']) && $this->TourPackage->id)
			{
				$data = array();
				foreach ($_POST['data']['category'] as $key => $value) {
					$data[] =  array(
							'TourPackagesCategory' => array(
									'tour_package_id' => $this->TourPackage->id,
									'category_id'     => $value
								)
						);
				}
				$this->TourPackagesCategory->saveMany($data);
				
			}

			// save featured tour
			if (($_POST['data']['TourPackage']['is_featured'] == 1) && $this->TourPackage->id)
			{

				$data = array(
						'order'           => $this->Featured->getOrderNum(),
						'is_visibility'   => 1,
						'tour_package_id' => $this->TourPackage->id
					);
				$this->Featured->save($data);
			}
			if ($flag){
				return $this->redirect(array('action' => 'index'));
			}
			}
		}else{
		
	
		
		$sponsor = $this->TourPackage->Sponsor->find('first',array(
		'conditions' => array('Sponsor.id'=> $_POST['data']['TourPackage']['sponsor_id']))
		);
		$cat = $this->Category->find('list',array(
		'conditions' => array('Category.id'=> $_POST['data']['category']))
		);
		$area = $this->TourPackage->Area->find('list',array(
		'conditions' => array('Area.id'=> $_POST['data']['TourPackage']['area_id']))
		);
		
		if(isset($_SESSION['idImgArr'])){
		$images = $this->Image->find('list',array(
		'conditions' => array('Image.id'=> $_SESSION['idImgArr'])
		));
			
		}
		$this->set("referer", $this->request->referer());
		$this->set('detail',$_POST['data']);
		$this->set('sponsor',$sponsor);
		$this->set('cat',$cat);
		$this->set('images',$images);
		$this->set('area',$area);
		$this->layout='preview';
		
				}
		
		}


	
		
	
		$this->set('prefectures', $this->Prefecture->find('list'));
		$sponsors = $this->TourPackage->Sponsor->find('list', array(
				'fields' => array('Sponsor.id', 'Sponsor.sponsor_name'),
				'conditions' => array('Sponsor.is_active'=>'1')
				
			));
			
		
		$areas = $this->TourPackage->Area->find('list',
		array(
				'conditions' => array('Area.is_visibility'=>'1')
		
		));
		$categories = $this->TourPackage->Category->find('list',
		array(
				'conditions' => array('Category.is_visibility'=>'1')
		
		));
		$this->set(compact('sponsors', 'areas', 'categories'));
		
		
				
		
		
		}
		
	
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		// set id value here to pass to upload function :)
		$this->Session->write('idT', $id);


		if(isset($_SESSION["csrfTokens"])){
		unset($_SESSION["csrfTokens"]);
		}
		
		
					if (!isset($_SESSION['idImgArr']) || empty($_SESSION['idImgArr']))
		{
			$_SESSION['idImgArr'] = array();
		}	
		
	
					
		$this->TourPackage->id = $id;
		if (!$this->TourPackage->exists($id)) {
			throw new NotFoundException(__('Invalid tour package'));
		}
		
		$sponsorid = $this->TourPackage->find('list',array(
		'fields' => array('TourPackage.sponsor_id'),
				'conditions' => array('id'=>$id)
		));
		
		$sponsor=$sponsorid[$id];
		
		
		$arid = $this->TourPackage->find('list',array(
		'fields' => array('TourPackage.area_id'),
				'conditions' => array('id'=>$id)
		
		));
		
		$areaid=$arid[$id];
		
		$this->set('sponsorid',$sponsor);
		$this->set('areaid',$areaid);
						
		if ($this->request->is(array('post', 'put'))) {
			if(isset($this->request->data['submit'])){
			$sponsorid = $this->request->data['TourPackage']['sponsor_id'];
			$sponsorinfo = $this->TourPackage->Sponsor->find('list', array(
				'fields' => array('Sponsor.email'),
				'conditions' => array('Sponsor.id'=>$this->request->data['TourPackage']['sponsor_id'])
			));
			
			if($this->request->data['TourPackage']['pdf']['name']){
			$doc = $this->request->data['TourPackage']['pdf'];
			
			$this->request->data['TourPackage']['pdfname']=$this->request->data['TourPackage']['pdf']['name'];
			$this->request->data['TourPackage']['pdfcontent']=file_get_contents($doc['tmp_name']);
			}
			if($this->request->data['TourPackage']['delpdf'] == '1'){
			$this->request->data['TourPackage']['pdfname'] = null;
			$this->request->data['TourPackage']['pdfcontent'] = null;

			}
		
			$this->TourPackage->set($this->request->data);
			 if ($this->TourPackage->validates()) {
			 	
			 if($sponsorinfo[$sponsorid]=="" && $this->request->data['TourPackage']['application_url']==""){
				$err = "主催者情報にメールアドレスの登録がない場合は申し込みURLは必須となります。";
				$this->set('err',$err);
				}
			 elseif ($this->TourPackage->save($this->request->data,false)) {
			
				$this->Session->setFlash('更新しました', 'default', array('class' =>'alert alert-success'), 'success');
				$flag = true;
			}else{
				$this->Session->setFlash('The tour package could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
				$_SESSION['idImgArr'] = array();
			}

			// Update tour_id field in the images table
			if (!empty($_SESSION['idImgArr']) && $this->TourPackage->id)
			{
				// remove all images were existing
				
				$this->Image->deleteAll(array('Image.tour_id' => $this->TourPackage->id,'Image.name' => null));

				// save new images
				foreach ($_SESSION['idImgArr'] as $key => $value) 
				{
					$data = array('id' => $value, 'tour_id' => $this->TourPackage->id);
					$this->Image->save($data);
				}
				unset($_SESSION['idImgArr']);
				$this->Image->deleteAll(array('Image.tour_id' => null));
			}

			// save categories of tours
			if (!empty($_POST['data']['TourPackage']['category']) && $this->TourPackage->id)
			{
				$data = array();
				$this->TourPackagesCategory->deleteAll(array('TourPackagesCategory.tour_package_id' => $this->TourPackage->id));
				foreach ($_POST['data']['TourPackage']['category'] as $key => $value) {

					$data[] =  array(
							'TourPackagesCategory' => array(
									'tour_package_id' => $this->TourPackage->id,
									'category_id'     => $value
								)
						);
				}
				$this->TourPackagesCategory->saveMany($data);
				
			}
			
		



			// delete featured tour
			if (($_POST['data']['TourPackage']['is_featured'] == 0) && $this->TourPackage->id)
			{
				$this->Featured->deleteAll(array('Featured.tour_package_id' => $this->TourPackage->id)
					);
			}
			else if (($_POST['data']['TourPackage']['is_featured'] == 1) && $this->TourPackage->id)
			{
				$exists = $this->Featured->find('list', array(
							'conditions' => array(
								'Featured.tour_package_id' => $this->TourPackage->id
						)));
				
				if (empty($exists ))
				{
					$data = array(
								'order'           => $this->Featured->getOrderNum(),
								'is_visibility'   => 1,
								'tour_package_id' => $this->TourPackage->id
							);
						$this->Featured->save($data);
				}
			}
			//return $this->redirect(array('action' => 'index'));
			
			}//validate

		}
if(isset($this->request->data['preview'])){
		
		
		
		$sponsor = $this->TourPackage->Sponsor->find('first',array(
		'conditions' => array('Sponsor.id'=> $_POST['data']['TourPackage']['sponsor_id']))
		);
		$cat = $this->Category->find('list',array(
		'conditions' => array('Category.id'=> $_POST['data']['TourPackage']['category']))
		);
		
		$area = $this->TourPackage->Area->find('first',array(
		
		'conditions' => array('Area.id'=> $_POST['data']['TourPackage']['area_id']))
		);
		
		
		
		 $detail = $this->TourPackage->find('first', array(
                'conditions' => array(
                        'TourPackage.id' => $id
                      
                       
                    )
               ));
			   
		
		$pref = $this->Prefecture->find('list',array(
		'conditions' => array('Prefecture.id'=> $area['Area']['prefecture_id']))
		);
		
		$prefname = $pref[$area['Area']['prefecture_id']];
		
		if(isset($_SESSION['idImgArr'])){
		$images = $this->Image->find('list',array(
		'conditions' => array('Image.id'=> $_SESSION['idImgArr'])
		));
		
		
			
		}
		$this->set('aid',$aid);
		$this->set('prefname',$prefname);
		$this->set("referer", $this->request->referer());
		$this->set('details',$detail);
		$this->set('detail',$_POST['data']);
		$this->set('sponsor',$sponsor);
		$this->set('cat',$cat);
		$this->set('images',$images);
		$this->set('area',$area);
		$this->layout='preview';
		
				}}
 else {
			$options = array('conditions' => array('TourPackage.' . $this->TourPackage->primaryKey => $id));
			$this->request->data = $this->TourPackage->find('first', $options);
		}
		
		$this->set('prefectures', $this->Prefecture->find('list'));
		$selcats = $this->TourPackage->TourPackagesCategory->find('list', array(
                'conditions' => array('TourPackagesCategory.tour_package_id' => $this->TourPackage->id),
				'fields' => array('TourPackagesCategory.category_id')
				));
		
		$sponsors = $this->TourPackage->Sponsor->find('list', array(
				'fields' => array('Sponsor.id', 'Sponsor.sponsor_name'),
				'conditions' => array('Sponsor.is_active'=>'1')
			));
			
		$featured = $this->Featured->find('count', array(
				'conditions' => array('Featured.tour_package_id' => $this->TourPackage->id)
			));	
			
		
		$areas = $this->TourPackage->Area->find('list',
		array(
				'conditions' => array('Area.is_visibility'=>'1')
		
		));
		$categories = $this->TourPackage->Category->find('list',
		array(
				'conditions' => array('Category.is_visibility'=>'1')
		
		));
		$this->set(compact('sponsors', 'areas', 'categories','selcats','featured'));
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TourPackage->id = $id;
		if (!$this->TourPackage->exists()) {
			throw new NotFoundException(__('Invalid tour package'));
		}
		if ($this->TourPackage->delete()) {
			$this->Session->setFlash('The tour package has been deleted.', 'default', array('class' =>'alert alert-success'), 'success');
		} else {
			$this->Session->setFlash('The tour package could not be deleted. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	/**
	 * upload method
	 * @return void
	 */
	public function upload()
	{
		
			
		
		
		$id = $this->Session->read('idT');
		if ($this->Session->check('idT'))
			$imgOfTour = $this->Image->find('list', array(
					'conditions' => array('Image.tour_id' => $this->Session->read('idT'))
				));
		else
			$imgOfTour = array();

		$imgOfTour = array_values($imgOfTour);

		$this->layout = false;
		require (dirname(__FILE__) . DS . 'Utils' . DS . 'UploadHandler.php');

		//$upload_handler = new UploadHandler($this->Image);
		
		
		
		$upload_handler = new UploadHandler($this->Image, $imgOfTour, $id);
	}
	
	
	
	
	

}


