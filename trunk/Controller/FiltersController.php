<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 */
class FiltersController extends AppController {
	
	 public  function beforeFilter(){
	if(env('HTTPS')){ 
	      $this->_unforceSSL();
	           }}
	   public function _unforceSSL() {
	        $this->redirect('http://' . env('SERVER_NAME') . $this->here);
	    }

	public $components = array(
			'Paginator'
		);
	/**
	 * models which this controller use
	 * @var array
	 */
	public $uses = array(
			'TourPackage',
			'TourPackagesCategory',
			'Prefecture',
			'Area',
			'Region',
			'Category'
		);
	/**
	 * Pagination settings
	 * @var array
	 */
	public $paginate = array(
			'limit' => 10,
			'order' => array(
					'TourPackage.id' => 'asc'
				)
		);	

	/**
	 * index action
	 * @return
	 */
	
	public function index()
	{
		
		
		if (!empty($_GET['data']))
		{
			$postdata = $_GET['data'];
			$today = date('Y-m-d');
			$conditions = array('TourPackage.status' => 1,'TourPackage.schedule_start <= ' => $today,'TourPackage.schedule_end >= ' => $today);
			/*
			if (!empty($_POST['data']['schedule']))
			{
				$conditions = array_merge($conditions, array(
						'TourPackage.schedule_start <=' => $_POST['data']['schedule'],
						'TourPackage.schedule_end   >=' => $_POST['data']['schedule'],
						'TourPackage.status' => 1
					));
			}
			 **/
			
				if ($_GET['data']['cat'] !=="")
			{
				
				$t = $this->TourPackagesCategory->find('list', array(
					'fields' => array('TourPackagesCategory.tour_package_id'),	
					'conditions' => array('TourPackagesCategory.category_id' => (int) $_GET['data']['cat']),
					
				));

				
				$conditions = array_merge($conditions, array(
						'TourPackage.id' => $t
					));
			}
		
			if (($_GET['data']['area']) !== "default")
		
			{
					$conditions = array_merge($conditions, array(
						'TourPackage.area_id' => (int) $_GET['data']['area']
					));
					
			}elseif($_GET['data']['prefecture'] !== "default"){
				// 都道府県または地方で検索
					//都道府県の設定ありarea 取得
					$areas = $this->Area->find('list', array(
					'fields' => array('Area.id'),	
					'conditions' => array('Area.prefecture_id' => (int) $_GET['data']['prefecture']),
					));
					
					$conditions = array_merge($conditions, array(
						'TourPackage.area_id' => $areas
					));
					
					
				}elseif($_GET['data']['region'] !=="default"){
					
				
						//地方のみ設定あり
					$prefs = $this->Prefecture->find('list', array(
					'fields' => array('Prefecture.id'),	
					'conditions' => array('Prefecture.region_id' => (int) $_GET['data']['region']),
					));
					$areas = $this->Area->find('list', array(
					'fields' => array('Area.id'),	
					'conditions' => array('Area.prefecture_id' => $prefs),
					));					
					$conditions = array_merge($conditions, array(
						'TourPackage.area_id' => $areas
					));		
			}

		

				
				
			}
			
				//エリア名取得
		if($_GET['data']["area"] !== "default"){
			$areaname = $this->Area->find('first', array(
					'fields' => array('Area.name'),	
					'conditions' => array('Area.id' => $_GET['data']["area"]),
					));
					
			
			$postdata['areaname'] = $areaname["Area"]['name'];		
		}elseif($_GET['data']["prefecture"] !== "default"){
			$prefname = $this->Prefecture->find('first', array(
					'fields' => array('Prefecture.name'),	
					'conditions' => array('Prefecture.id' => $_GET['data']["prefecture"]),
					));
			$postdata['areaname'] = $prefname["Prefecture"]['name'];	
		}elseif($_GET['data']["region"] !== "default"){
			$regiondata = $this->Region->find('first', array(
					'fields' => array('Region.name'),	
					'conditions' => array('Region.id' => $_GET['data']["region"]),
					));
			$postdata['areaname'] = $regiondata["Region"]['name'];	
		}else{$postdata["areaname"] = '無し';}
		//ジャンル名取得
		if($_GET['data']["cat"] !== ""){
			$catname= $this->Category->find('first', array(
					'fields' => array('Category.name'),	
					'conditions' => array('Category.id' => $_GET['data']["cat"]),
					));
			$postdata['catname'] = $catname["Category"]['name'];
			$postdata['catId'] = $_GET['data']['cat'];
			
			;
			}else{
			$postdata["catname"] = "無し";
		}
		


	
			$this->TourPackage->unbindModel(array('belongsTo' => array('Area')));
			$this->TourPackage->bindModel(array(
    'hasOne' => array(
        'Area' => array(
            'foreignKey' => false,
            'conditions' => array('Area.id = TourPackage.area_id')
        ),
        'Prefecture' => array(
            'foreignKey' => false,
            'conditions' => array('Prefecture.id = Area.prefecture_id')
        )
    )
		));
				
				
				
				$this->paginate = array_merge($this->paginate, array(
						'conditions' => $conditions,'contain' => array('Area', 'Prefecture')
					));
		
		$this->Paginator->settings = $this->paginate;
		$this->set('tours', $this->Paginator->paginate('TourPackage'));
		if(isset($postdata)){
		$this->set('postdata', $postdata);
		}
		$this->render('/Featureds/index');

	}

	/**
	 * find all tours according to area
	 * @param  integer $id of specified prefecture
	 */
	public function pref($id = null)
	{
		$areas = $this->Area->find('list', array(
				'conditions' => array('Area.prefecture_id' => $id),
				'fields'     => array('Area.id', 'Area.id'),
				'order'      => array('Area.order' => 'asc')
			));

		$this->paginate = array(
			'limit' => 4,
			'order' => array(
					'TourPackage.id' => 'asc'
				),
			'conditions' => array('TourPackage.area_id' => $areas)

		);
		$addressGoogleMap = $this->Prefecture->find('first', array(
				'conditions' => array('Prefecture.id' => $id)
			));
		$this->set('address', $addressGoogleMap['Prefecture']['name']);

		$this->Paginator->settings = $this->paginate;
		$this->set('map_details', true);
		$this->set('tours', $this->Paginator->paginate('TourPackage'));
	}
	
	public function area($id = null)
	{
		$areas = $this->Area->find('first', array(
				'conditions' => array('Area.id' => $id),
//				'fields'     => array('Area.prefecture_id', 'Area.prefecture_id'),
				'order'      => array('Area.order' => 'asc')
			));

	$this->TourPackage->unbindModel(array(
    'belongsTo' => array('Area')
));
 
$this->TourPackage->bindModel(array(
    'hasOne' => array(
        'Area' => array(
            'foreignKey' => false,
            'conditions' => array('Area.id = TourPackage.area_id')
        ),
        'Prefecture' => array(
            'foreignKey' => false,
            'conditions' => array('Prefecture.id = Area.prefecture_id')
        )
    )
));

$today = date('Y-m-d');
		$this->paginate = array(
			'limit' => 10,
			'order' => array(
					'TourPackage.id' => 'asc'
				),
			'conditions' => array(
				array('TourPackage.area_id' => $id),
				array('TourPackage.status' => '1','TourPackage.schedule_start <= ' => $today,'TourPackage.schedule_end >= ' => $today)
				
				),
			'contain' => array('Area', 'Prefecture')
				

		);
		$addressGoogleMap = $this->Prefecture->find('first', array(
				'conditions' => array('Prefecture.id' => $id)
			));
		$this->set('address', $addressGoogleMap['Prefecture']['name']);
		$postdata['catname'] = "無し";
		
		$this->Paginator->settings = $this->paginate;
		$this->set('postdata', $postdata);
		$this->set('map_details', true);
		$this->set('tours', $this->Paginator->paginate('TourPackage'));
	}
}	