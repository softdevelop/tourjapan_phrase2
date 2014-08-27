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

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */

class CategoriesController extends AdminAppController
{
	/**
	 * 
	 * @var array
	 */
	 

   
	
	public $components = array(
			'Admin.Function',
			'Session',
			'Paginator','Security'
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
	 * This controller does not use a model
	 *
	 * @var array
	 */
	public $uses = array(
			'Category'
		);

	public $paginate = array(
			'limit' => 16,
        	'order' => array(
            	'Category.order' => 'asc'
		));
	/**
	 * List all categories
	 * @return 
	 */
	public function index()
	{
		$this->Paginator->settings = $this->paginate;
		$this->set('categories', $this->Paginator->paginate());
	}

	/**
	 * Create a new category
	 */
	public function add()
	{
		if ($this->request->is('post')) 
		{
			// create slug from name of category
			$slug = $this->Function->url_slug($this->request->data['Category']['name']);
			$this->request->data['Category'] = array_merge($this->request->data['Category'], array('slug' => $slug));
			
	        // If the form data can be validated and saved...
	        if ($this->Category->save($this->request->data)) 
	        {
	        	$this->Session->setFlash('The category has been saved.', 'default', array('class' =>'alert alert-success'), 'success');
	            return $this->redirect('/admin/categories');
	        }
	        else
	        {
	        	$this->Session->setFlash('The category could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
	        }
	    }
	}

	/**
	 * delete method
	 * @param  int $id 
	 * @return avoid
	 */
	public function delete($id = null)
	{
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid application'));
		}
		if ($this->Category->delete()) {
			$this->Session->setFlash('The category has been saved.', 'default', array('class' =>'alert alert-success'), 'success');
		} else {
			$this->Session->setFlash('The category could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * edit method
	 * @param  int $id
	 * @return avoid
	 */
	public function edit($id = null)
	{
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid application'));
		}

		if ($this->request->is(array('post', 'put')))
		{
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('The category has been saved.', 'default', array('class' =>'alert alert-success'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The category could not be saved. Please, try again.', 'default', array('class' =>'alert alert-danger'), 'error');
			}
		} else {
			$this->request->data = $this->Category->find('first', array(
								'conditions' => array('Category.id' => $id)
							));
		}
	}
	
}