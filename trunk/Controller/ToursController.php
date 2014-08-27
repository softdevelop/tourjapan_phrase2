<?php
/**
 * Static content controller.
 *
 * This file will render views from views/Tours/
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
class ToursController extends AppController{
    var $name = 'Tours';
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
			'Featured'
		);
    public $components = array('Paginator');
    public $paginate;
        /**
	 * Themes: Front
	 * @layout tour.ctp
	 */
	 
	 
    public $layout = 'tour';
    
    /**
	 * deetail method
	 *
	 * @return void
	 */
    public function detail($id = null)
    {
    
	$this->set("referer", $this->request->referer());
	
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


		$today = date('Y-m-d');
        $detail = $this->TourPackage->find('first', array(
                'conditions' => array(
                        'TourPackage.id' => $id,
                        'TourPackage.status' => 1,
                        'TourPackage.schedule_start <= ' => $today, 	                       
						 'TourPackage.schedule_end >= ' => $today
                       
                    ),
                 'contain' => array('Area', 'Prefecture')
					
					));
        

        if(!empty($detail)) 
        {
            $this->set('address', $detail['Area']['name']);
            $this->set('detail',$detail);
        }
    }
	
	 public function view_data($id)
    {
    	
		$this->layout = 'default2';
    
        $view_data = $this->TourPackage->find('first', array(
                'conditions' => array(
                        'TourPackage.id' => $id
                    ),
                'fields' => 'pdfcontent'
					));
        
        header('Content-type: application/pdf');
        echo $view_data['TourPackage']['pdfcontent'];
		
    }
	
    public function index(){
        $this->redirect(array('controller'=>'Searchs','action'=>'tour'));
    }
	 public function preview()
    {
    	
	
		
		$this->set('prev', $this->request->data);
	
	$this->set("referer", $this->request->referer());
	
		
	
        

    }
}


?>