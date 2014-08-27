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
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class LoginController extends AdminAppController 
{
	
	//ssl用設定
		    public $components = array('Security','Cookie');

    public  function beforeFilter(){

        //SSLを強制するアクションを設定
       		$this->Security->validatePost = false;
            $this->Security->blackHoleCallback = 'forceSSL';
            $this->Security->requireSecure();
			$this->response->header('Access-Control-Allow-Origin', '*');
	
      
    

           }
    public function forceSSL() {
        $this->redirect('https://' . env('SERVER_NAME') . $this->here);
    }
	
	/**
	 * This controller does not use a model
	 * @var array
	 */
	public $uses = array(
			'User'
		);
public function index()
	{
		$this->layout = 'login';
		$user = AuthComponent::user();
		if($user['role'])
		{
			$this->redirect('/admin/tourpackages');
		}
		else
		{
			if ($this->request->is('post')) 
			{
				if ($this->Auth->login()) 
				{
					return $this->redirect("/admin/tourpackages");
				} 
				else 
				{
					$this->Session->setFlash(__('Username or password is incorrect'));
				}
			} 
		}
	}

}
