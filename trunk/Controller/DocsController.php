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
class DocsController extends AppController {

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
			'Doc',
			'TourPackage'
		);

	/**
	 * paginate
	 * @var array
	 */
	public $paginate;

	public function index()
	{
		$docs = $this->Doc->find('list', array(
				'fields' => array('Doc.id', 'Doc.tour_package_id')
				
			));

		$this->paginate =  array(
			'limit' => 4,
			'order' => array(
					'TourPackage.id' => 'asc'
				),
			'conditions' => array('TourPackage.id' => $Docs)
		);
		
		$this->Paginator->settings = $this->paginate;
		$this->set('tours', $this->Paginator->paginate('TourPackage'));
	}
}
