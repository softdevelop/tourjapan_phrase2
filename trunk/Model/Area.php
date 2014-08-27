<?php
App::uses('AppModel', 'Model');
/**
 * Area Model
 *
 * @property Prefecture $Prefecture
 * @property TourPackage $TourPackage
 */
class Area extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'order' => array(
			'numeric' => array(
				'rule'       => array('numeric'),
				'message'    => 'Your custom message here',
				'allowEmpty' => false,
				'required'   => true,
				'last'       => false, // Stop validation after this rule
			),
		),
		'name' => array(
            'rule1' => array(
				'rule'     => 'notEmpty',
				'required' => true,
				'message'  => 'Name is not empty'
            ),
            'rule2' => array(
				'rule'    => 'isUnique',
				'message' => 'Name of area must be unique'
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
		'Prefecture' => array(
			'className'  => 'Prefecture',
			'foreignKey' => 'prefecture_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
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
			'foreignKey'   => 'area_id',
			'dependent'    => false,
			'conditions'   => '',
			'fields'       => '',
			'order'        => '',
			'limit'        => '',
			'offset'       => '',
			'exclusive'    => '',
			'finderQuery'  => '',
			'counterQuery' => ''
		)
	);

}
