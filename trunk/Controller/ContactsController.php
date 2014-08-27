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
 App::uses('CakeEmail', 'Network/Email');
 
 
 
 
 class ContactsController extends AppController{
 	
	//ssl用設定
		    public $components = array('Security');

    public  function beforeFilter(){

        //SSLを強制するアクションを設定
       		$this->Security->validatePost = false;
            $this->Security->blackHoleCallback = 'forceSSL';
            $this->Security->requireSecure();
           }
    public function forceSSL() {
        $this->redirect('https://' . env('SERVER_NAME') . $this->here);
    }
	
    var $name = 'Contacts';
    /**
	 * Models
	 * @var array
	 */
    public $uses = array('Contact',);
    public $helpers = array('Html','Form');
     
    /**
	 * register method
	 *
	 * @return void
	 */
     public function index(){
        $this->set('flag_contact',null);
        $this->Contact->create();
        if(!empty($this->request->data)){
            $this->request->data['Contact']['created_date'] = date("Y-m-d");
            if ($this->Contact->save($this->request->data))
            {
                $this->set('flag_contact',true);
				 $vars = $this->request->data['Contact'];
				 $email = new CakeEmail();
                // 送信設定
                $email->config('contact') 
					->to(array('myactivity@f-ness.com' => 'MyActivity問い合わせ窓口'))
                    // テンプレート変数設定
                    ->viewVars($vars)
                    // 使用するテンプレートの設定, 本文の方 contact, レイアウト contact
                     ->template('contact', 'contact')
                    // メール件名
                    ->subject('【お問い合わせ】')
                    ;
 
               $email->send();
            }
            else{
                $this->set('flag_contact',false);
            }
			
			 $vars = $this->request->data['Contact'];

			
			
        }
     }
	 
}
?>