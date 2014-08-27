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
class AreasController extends AppController {

	public $components = array(
			
				'Security'
			);
	
	
	public $uses = array(
			'Area',
			'Prefecture',
			'Region',
			'Sponsor'
		);
	
	public  function beforeFilter(){

        //SSLを強制するアクションを設定
       		$this->Security->validatePost = false;
			$this->Security->csrfCheck = false;
			$this->response->header('Access-Control-Allow-Origin', '*');
           }
	  
    public function forceSSL() {
        $this->redirect('https://' . env('SERVER_NAME') . $this->here);
    }
	
	/**
	 * list all region
	 * @return array
	 */
	public function getRegion()
	{
		return $this->Region->find('list', array(
				'fields' => array('Region.id', 'Region.name')
			));
	}

	/**
	 * get list prefecture according to region
	 * @return array
	 */
	public function getPref($id = null)
	{
		echo json_encode($this->Prefecture->find('list', array(
				'fields' => array('Prefecture.id', 'Prefecture.name'),
				'conditions' => array('Prefecture.region_id' => $id)
			)));
		exit();
	}

	/**
	 * get list areas according to region
	 * @return array
	 */
	public function getArea($id = null)
	{
		echo json_encode($this->Area->find('list', array(
				'fields' => array('Area.id', 'Area.name'),
				'conditions' => array('Area.prefecture_id' => $id, 'Area.is_visibility' => '1')
			)));
		exit();
	}
	
	public function getSponsor($id = null)
	{
		echo json_encode($this->Sponsor->find('list', array(
				'fields' => array('Sponsor.id', 'Sponsor.sponsor_name'),
				'conditions' => array('Sponsor.prefecture_id' => $id,'Sponsor.is_active' => '1')
			)));
		exit();
	}

}