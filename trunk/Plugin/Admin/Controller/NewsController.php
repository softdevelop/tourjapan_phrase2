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

class NewsController extends AdminAppController 
{
	
	//ssl用設定
		  
	

	/**
	 * Components
	 * @var array
	 */
	public $components = array(
			'Paginator', 'Session', 'Admin.Function','Security'
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
			'News'
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
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		if (!empty($_GET['status']))
		{
			$status=$_GET['status'];
			$conditions = array();
			if (!empty($_GET['status']))
			{
						$today = date('Y-m-d');
			if($status=="hidden"){
				$conditions = array_merge($conditions, array(
								'News.status' => 0
						));
	}elseif($status=="publish"){
			$today = date('Y-m-d');		
		$conditions = array_merge($conditions, array(
								'News.status' => "1",
								'News.schedule_start <=' =>  $today,
								'News.schedule_end >=' =>  $today
								
						));
			}elseif($status=="reserved"){
						$today = date('Y-m-d');
					$conditions = array_merge($conditions, array(
								'News.status' => "1",
								'News.schedule_start >=' => $today
						));
}elseif($status=="finished"){						
						$today = date('Y-m-d');
					$conditions = array_merge($conditions, array(
								'News.status' => "1",
								'News.schedule_end <=' => $today
						));
}

				$this->set('cond', $conditions);
				$this->paginate = array_merge($this->paginate, array(
						'conditions' => $conditions
					));
			}
			
		
		}
		
		$this->Paginator->settings = $this->paginate;
		$this->News->recursive = 1;
		$this->set('news', $this->Paginator->paginate('News'));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			if (!empty($_POST['data']['News']['title']))
				$slug = $this->Function->url_slug($_POST['data']['News']['title']);

			$this->request->data = array_merge($this->request->data['News'], array(
					'slug' => empty($slug) ? '' : $slug,
					'created_date' => date("Y-m-d")
				));
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash('The news has been saved.', 'default', array('class' =>'alert alert-success'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The news could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
			}
		}
	}
	/**
	 * edit method
	 *
	 * @return void
	 */
	
	public function edit($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid area'));
		}
		$this->News->id = $id;

		if ($this->request->is(array('post', 'put')))
		{
			if (!empty($_POST['data']['News']['title']))
				$slug = $this->Function->url_slug($_POST['data']['News']['title']);

			$this->request->data = array_merge($this->request->data['News'], array(
					'slug' => empty($slug) ? '' : $slug,
					'modified_date' => date("Y-m-d")
				));

			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash('The area has been saved.', 'default', array('class' =>'alert alert-success'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The area could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
			}
		}
		else
		{
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			$this->request->data = $this->News->find('first', $options);
		}
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid area'));
		}
		if ($this->News->delete()) {
			$this->Session->setFlash('The area has been deleted.', 'default', array('class' =>'alert alert-success'), 'success');
		} else {
			$this->Session->setFlash('The area could not be deleted. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}	