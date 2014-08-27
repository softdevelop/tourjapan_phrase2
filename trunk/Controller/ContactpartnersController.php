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
 class ContactpartnersController extends AppController{
 	
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
	
    var $name = 'Contactpartners';
    /**
	 * Models
	 * @var array
	 */
    public $uses = array('Contactpartner',);
    public $helpers = array('Html','Form');
     
    /**
	 * register method
	 *
	 * @return void
	 */
     public function index(){
        $this->set('flag_contact',null);
        $this->Contactpartner->create();
        if(!empty($this->request->data)){
            $this->request->data['Contactpartner']['created_date'] = date("Y-m-d");
            if ($this->Contactpartner->save($this->request->data))
            {
                $this->set('flag_contact',true);
				 $vars = $this->request->data['Contactpartner'];
			 $email = new CakeEmail();
                // 送信設定
                $email->config('contactpartner')    // $contact の設定を使う
                    ->to(array('myactivity@f-ness.com' => 'MyActivity問い合わせ窓口'))
					//->to(array("info@myactivity.jp" => 'MyActivity問い合わせ窓口'))
                    // 送信先
                    // ->to()
                    // BCC, お問い合わせした人にもコピーを送りたい時とか
                    // ->bcc($this->request->data['Contact']['email'])
                    // テンプレート変数設定
                    ->viewVars($vars)
                    // 使用するテンプレートの設定, 本文の方 contact, レイアウト contact
                    ->template('contactpartner', 'contactpartner')
                    // メール件名
                    ->subject('【掲載希望】')
                    ;
 
                // 送信
                // 送信したメールのヘッダーとメッセージを配列で返します
               $email->send();
            }
            else{
                $this->set('flag_contact',false);
            }
		
		
			
			
			
        }
     }
	
}
?>