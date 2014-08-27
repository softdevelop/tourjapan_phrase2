<?php  
App::uses('AppController', 'Controller');
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
 class SearchsController extends AppController{
    var $name = 'Searchs';
    
	public $uses = array(
			'TourPackage',
			'TourPackagesCategory',
			'Prefecture',
			'Area',
			'Region',
			'Category'
		);
    public $components = array(
			'Paginator'
		);
		
		
    public $paginate;
    public function search(){
        if(isset($_GET['keywords'])){        
            $keyword = $_GET['keywords'];
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
                            'limit'=>10,
                            'order'=>array('TourPackage.id'=>'desc'),
                            'conditions'=>array(
                            'AND' => array(
                             array('TourPackage.status' => '1','TourPackage.schedule_start <= ' => $today,'TourPackage.schedule_end >= ' => $today)),
                            'OR' => array(
                            array('TourPackage.title LIKE'=> '%'.$keyword.'%'),
                            array('TourPackage.tour_name LIKE'=> '%'.$keyword.'%'),
                            array('TourPackage.content LIKE'=> '%'.$keyword.'%'),
                            array('TourPackage.short_description LIKE'=> '%'.$keyword.'%')
							
										)),
							'contain' => array('Area', 'Prefecture')
                          
                            );
			
            $this->Paginator->settings = $this->paginate;
            $this->set('tours', $this->Paginator->paginate('TourPackage'));
        }
    }
    public function tour(){
        $this->paginate = array(
                                'limit'=>10,
                                'order'=>array('TourPackage.id'=>'desc'),
                                'conditions'=>array('TourPackage.status' => '1')
                                
                                
                                );
        $this->Paginator->settings = $this->paginate;
        $this->set('tours',$this->Paginator->paginate('TourPackage'));
    }
 }
?>