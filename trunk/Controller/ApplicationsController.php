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
 class ApplicationsController extends AppController{
 	
	 
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
    
	 
    var $name = 'Applications';
    /**
	 * Models
	 * @var array
	 */
     public $uses = array(
                            'Application',
                            'TourPackage',
                            'Prefecture',
                            'Sponsor'
                        );
    public $helpers = array('Html','Form');
     
    /**
	 * register method
	 *
	 * @return void
	 */
     public function register($pref = null,$tour = null){
     	
		$this->set( 'select1', $this->Prefecture->find( 'list', array( 
    'fields' => array( 'id', 'name')
		)));
		
		$spid = $this->TourPackage->find('list', array(
	'fields' => 'TourPackage.sponsor_id',
    'conditions' => array('TourPackage.id' => $tour) // sponsor id  = tour 
		));
		
		$sp = $this->TourPackage->Sponsor->find('list', array(
	'fields' => 'email',
    'conditions' => array('id' => $spid[$tour]) // sponsor id  = tour 
		));
		
$tourname = $this->TourPackage->find('list', array(
        'fields' => 'TourPackage.tour_name',
    'conditions' => array('TourPackage.id' => $tour) // sponsor id  = tour
                ));

		$sponsorid =$spid[$tour];
		$toemail = $sp[$sponsorid];
$s = $tourname[$tour];		
        $this->set('flag',null);
        $this->Application->create();
		$today = date('Y-M-D');
		$is_active =  $this->TourPackage->find('count', array(
    'conditions' => array('TourPackage.id' => $tour,'TourPackage.status' => 1,'TourPackage.schedule_start <= ' => $today,'TourPackage.schedule_end >= ' => $today) ) 
                );
		 $this->set('is_active',$is_active);		
	 if($is_active !== '0'){
        if(!empty($pref) && !empty($tour)){
            if(!empty($this->request->data)){
                $this->request->data['Application']['pref'] = $pref;
                $this->request->data['Application']['tour_package_id'] = $tour;
				
$this->request->data['Application']['tourname'] = $s;
                if ($this->Application->save($this->request->data))
                {
                    $this->set('flag',true);
				
						 $vars = $this->request->data['Application'];
						 
						 //お客様送信
			 $email = new CakeEmail();
                // 送信設定
                $email->config('application')    // $contact の設定を使う
                    // 送信元
                    //->to(array("info@myactivity.jp" => 'MyActivity問い合わせ窓口'))
					->to(array($vars['email'] => 'MyActivity問い合わせ窓口'))
                    // 送信先
                    // ->to()
                    // BCC, お問い合わせした人にもコピーを送りたい時とか
                    // テンプレート変数設定
                    ->viewVars($vars)
                    // 使用するテンプレートの設定, 本文の方 contact, レイアウト contact
                    ->template('application', 'application')
                    // メール件名
                    ->subject('【MyActivity】お申込・お問合せ受付完了')
                    ;
 
               
               $email->send();	
			$emailtocli =  new CakeEmail();
                // 送信設定
                $emailtocli->config('application')    // $contact の設定を使う
                    // 送信元
                    //->to(array("info@myactivity.jp" => 'MyActivity問い合わせ窓口'))
					->to(array($toemail => 'MyActivity問い合わせ窓口'))
                    // 送信先
                    // ->to()
                    // BCC, お問い合わせした人にもコピーを送りたい時とか
                    
                    // テンプレート変数設定
                    ->viewVars($vars)
                    // 使用するテンプレートの設定, 本文の方 contact, レイアウト contact
                    ->template('fapplication', 'fapplication')
                    // メール件名
                    ->subject('【MyActivity】お客様からのお申込・お問合せ')
                    ;
 
                // 送信
                // 送信したメールのヘッダーとメッセージを配列で返します
              $emailtocli->send();	
				
				$emailtofness =  new CakeEmail();
                // 送信設定
                $emailtofness->config('application')    // $contact の設定を使う
                    // 送信元
                    //->to(array("info@myactivity.jp" => 'MyActivity問い合わせ窓口'))
					->to(array('myactivity@f-ness.com' => 'MyActivity問い合わせ窓口'))
                    // 送信先
                    // ->to()
                    // BCC, お問い合わせした人にもコピーを送りたい時とか
                    // テンプレート変数設定
                    ->viewVars($vars)
                    // 使用するテンプレートの設定, 本文の方 contact, レイアウト contact
                    ->template('fapplication', 'fapplication')
                    // メール件名
                    ->subject('【MyActivity】お客様からのお申込・お問合せ')
                    ;
 
                // 送信
                // 送信したメールのヘッダーとメッセージを配列で返します
              $emailtofness->send();	
				
                
                
				
                }

				
				
				
                else{
                    $this->set('flag',false);
                }
				
		
            }
        }
     }
     }
 }
 ?>
