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
App::uses('Security', 'Utility');
class ProfileController extends AdminAppController 
{


	
	/**
	 * Components
	 * @var array
	 */
	public $components = array(
			'Session', 'Admin.Function','Security'
		);
		
		
//ssl用設定

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
			'User', 'ChangePasswordForm'
		);
	/**
	 * index method
	 *
	 * @return void
	 */
	public function password() {
		//var_dump($this->User->hash('admin123'));
		if (!empty($_POST))
		{
			if (!empty($_POST['oldpassword']) && !empty($_POST['password']) && !empty($_POST['repassword']))
			{
				$admin = $this->User->find('first', array(
			        'conditions' => array('User.id' => 1)
			    ));
				$hash_pass = Security::hash($_POST['oldpassword'], null, true);
				//$this->User->hash($_POST['oldpassword'], null, true);
				
			    if ($admin['User']['password'] === $hash_pass)
			    {
			    	if ($_POST['password'] === $_POST['repassword']) {
		    			
		    			$data = array('id' => 1, 'password' => Security::hash($_POST['password'], null, true));
						$this->User->save($data, false);
			    		$this->Session->setFlash('The password has been saved.', 'default', array('class' =>'alert alert-success'), 'success');
			    		return $this->redirect(array('action' => 'password'));
			    	}
			    	else {
			    		$this->Session->setFlash('Password and repassword do not match', 'default', array('class' =>'alert alert-danger'), 'error');
			    	}
			    }
			    else
			    {
			    	$this->Session->setFlash('Old password is not correct', 'default', array('class' =>'alert alert-danger'), 'error');
			    }
			}
			else
			{
				$this->Session->setFlash('Please fill all input below', 'default', array('class' =>'alert alert-danger'), 'error');
			}
			
		}
		
	}
}	