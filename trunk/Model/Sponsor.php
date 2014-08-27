<?php
App::uses('AppModel', 'Model');
/**
 * Sponsor Model
 *
 * @property User $User
 * @property Prefecture $Prefecture
 * @property Featured $Featured
 * @property TourPackage $TourPackage
 */
class Sponsor extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(

		'sponsor_name' => array(
			'rule1' => array(
				'rule' => 'isUnique',
				'message' => 'その名前はすでに存在しております。'
			),
			'rule2' => array(
				'rule' => 'notEmpty',
				'required' => true,
				'message' => "必須項目です"
			)
		),

		'address' => array(
			'rule2' => array(
				'rule' => 'notEmpty',
				'required' => true,
				'message' => "住所は必須項目です"
			)
		),

		'email_for_admin' => array(
			'rule1' => array(
				'rule' => 'isUnique',
				'message' => 'This email is existing'
			),
			'rule2' => array(
				'rule' => 'email',
				'required' => true,
				'message' => "Email is not available"
			)
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Prefecture' => array(
			'className' => 'Prefecture',
			'foreignKey' => 'prefecture_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'TourPackage' => array(
			'className'    => 'TourPackage',
			'foreignKey'   => 'sponsor_id',
			'conditions'   => '',
			'fields'       => '',
			'order'        => '',
			'limit'        => '',
			'offset'       => '',
			'exclusive'    => '',
			'finderQuery'  => '',
			'counterQuery' => '',
			'dependent' => true,
		)
	);

}
