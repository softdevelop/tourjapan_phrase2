<?php
App::uses('AppModel', 'Model');
/**
 * Application Model
 *
 * @property Prefecture $Prefecture
 * @property TourPackage $TourPackage
 */
class Application extends AppModel {
    var $name = 'Application';
    public $validate = array(
    	'type' => array(
			'rule' => 'boolean',
			'message' => '種別は選択してください'
		),
		'name' => array(
			'rule' => 'notEmpty',
			'message' => '氏名は必須項目です'
		),
		'email' => array(
			'rule' => 'email',
			'required' => true,
			'message' => 'メールアドレスの形式が間違っているかは空欄です'
		),
		
		'phone_number' => array(
			'rule' => array( 'custom', '/^(0\d{1,4}[\s-]?\d{1,4}[\s-]?\d{4})$/'),
        'message' => '電話番号が誤っているか空欄です',
        'allowEmpty' => false,
        
		),
		'pref' => array(
		),
		'age' => array(
		),
		'applied_date' => array(
		),
		'number_of_applicants' => array(
		),
		'content' => array(
		'rule' => 'notEmpty',
			'message' => '内容は必須項目です'
		),
		
	);
	
	public $belongsTo = array(
			'TourPackage' => array(
					'className' => 'TourPackage',
					'foreignKey' => 'tour_package_id'
				)
		);
    
}