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
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class CategoriesController extends AppController {


	 public  function beforeFilter(){
	if(env('HTTPS')){ 
	      $this->_unforceSSL();
	           }}
	   public function _unforceSSL() {
	        $this->redirect('http://' . env('SERVER_NAME') . $this->here);
	    }
	/**
	 * components which this controller will use
	 * @var array
	 */
	public $components = array(
			'Paginator',
			'Session'
		);
	/**
	 * models which this controller will use
	 * @var array
	 */
	public $uses = array(
			'Category',
			'TourPackagesCategory',
			'TourPackage'
		);

	/**
	 * paginate
	 * @var array
	 */
	public $paginate = array(
			'limit' => 10,
			'order' => array(
					'TourPackage.id' => 'asc'
				)
		);	


	public function listAll()
	{
		return $this->Category->find('list', array(
				'fields' => array('Category.id', 'Category.name'),
				'conditions' => array('Category.is_visibility' => '1')
			));
	}

	public function filter()
	{
		
		
		
		$today = date('Y-m-d');
		$conditions = array('TourPackage.status' => 1,'TourPackage.schedule_start <= ' => $today,'TourPackage.schedule_end >= ' => $today);
		
	
		
		if (!empty($_GET['catId'])) 
		{
			$ids = !empty($_GET['catId']) ? $_GET['catId'] : array();	
			
			
			}
			$tours = $this->TourPackagesCategory->find('list', array(
				'fields' => array('TourPackagesCategory.tour_package_id'),	
				'conditions' => array('TourPackagesCategory.category_id' => $ids),
				'group' => array('TourPackagesCategory.tour_package_id'),
			));
			
	
			
			if(isset($tours)){
			$conditions = array_merge($conditions, array(
						'TourPackage.id' => $tours
					));		
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
		

		$postdata['areaname'] = "無し";
		if(isset($_GET['catId'])){
		$cat_name = $this->Category->find('list', array(
				'conditions' => array('Category.id' => $_GET['catId'])
			));
		$catname = implode( '・', $cat_name );
		$postdata['catname'] = $catname;
		$postdata['catId'] = $_GET['catId'];
		}else{
		$postdata['catname'] = "無し";
		}
		
		$this->set('postdata', $postdata);
		$this->set('tours', $this->Paginator->paginate('TourPackage'));
		$this->render('/Featureds/index');
	}
}

