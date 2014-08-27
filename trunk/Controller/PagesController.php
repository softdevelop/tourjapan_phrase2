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
class PagesController extends AppController {
    public  function beforeFilter(){
	if(env('HTTPS')){ 
	      $this->_unforceSSL();
	           }}
	   public function _unforceSSL() {
	        $this->redirect('http://' . env('SERVER_NAME') . $this->here);
	    }


	public $helpers = array(
			'Function'
		);
/**
 * models is used
 * @var array
 */
	public $uses = array(
			'TourPackage',
			'Featured',
			'Area',
            'News'
		);
		
	

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
	}

	public function index()
	{
		
		$joins = array(
		array(
				'table' => 'featured',
				'alias' => 'Featured',
				'conditions' => array('Featured.tour_package_id = TourPackage.id')));
		$featureds = $this->TourPackage->find('list', array(
				'joins' => $joins, 
				'conditions' => array(
						'Featured.is_visibility' => 1,
						'TourPackage.status' => 1
					),
				'fields' => array('Featured.id', 'Featured.tour_package_id'),
				'limit' => 6,
				'order' => array(
						'Featured.order' => 'asc'
					)
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
		

		$toursFeatured = $this->TourPackage->find('all', array(
				'conditions' => array('TourPackage.id' => $featureds),
				'contain' => array('Area', 'Prefecture')
			));
		$this->set('toursFeatured', $toursFeatured);
		$tod = date('Y-m-d H:i:s');
        $topnews = $this->News->find('all',array(
                                        'conditions'=>array(
                                            'News.status'=> 1,
                                           	'News.schedule_start <=' => $tod,
											'News.schedule_end   >=' => $tod
                                        ),
                                        'limit'=>5,
                                        'order'=>array(
                                            'News.id'=>'asc'
                                        )
                                    ));
        $this->set('topnews',$topnews);
	}

}
