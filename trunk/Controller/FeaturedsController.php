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
class FeaturedsController extends AppController {

	/**
	 * components that this controller use
	 * @var array
	 */
	public $components = array(
			'Paginator'
		);


	/**
	 * models that this controller use
	 * @var array
	 */
	public $uses = array(
			'Featured',
			'TourPackage'
		);

	/**
	 * paginate
	 * @var array
	 */
	public $paginate;
	public function index()
	{
		$featureds = $this->Featured->find('list', array(
				'conditions' => array(
						'Featured.is_visibility' => 1,
						'Featured.order >' => '005'
					),
				'fields' => array('Featured.id', 'Featured.tour_package_id'),
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
		
	$today = date('Y-m-d');
	$this->paginate =  array(
			'limit' => 10,
			'order' => array(
					'TourPackage.id' => 'asc'
				),
			'conditions' => array('TourPackage.id' => $featureds,'TourPackage.status' => 1,'TourPackage.schedule_start <= ' => $today,'TourPackage.schedule_end >= ' => $today),
			'contain' => array('Area', 'Prefecture'),
		);
		
	
		$this->Paginator->settings = $this->paginate;
		$this->set('tours', $this->Paginator->paginate('TourPackage'));
	}

	
}
