<?php
App::uses('AppModel', 'Model');
/**
 * Application Model
 *
 * @property Prefecture $Prefecture
 * @property TourPackage $TourPackage
 */
class Contactpartner extends AppModel {
    var $name = 'Contactpartner';
    public $validate = array(
        'email' => array(
			'rule' => 'email',
		 'allowEmpty' => false,
			'message' => 'メールアドレスの形式が間違っているかは空欄です'
		),
		'name' => array(
		
			'rule' => 'notEmpty',
			'message' => '氏名は必須項目です'
		),
		'companyname' => array(
		
			'rule' => 'notEmpty',
			'message' => '貴社名は必須項目です'
		),
		'phone' => array(
			'rule' => array( 'custom', '/^(0\d{1,4}[\s-]?\d{1,4}[\s-]?\d{4})$/'),
        'message' => '電話番号の形式が誤っています',
        'allowEmpty' => false,
		),
		'content' => array(
		'rule' => 'notEmpty',
			'message' => '内容は必須項目です'
		)
	);   
}