<?php
App::uses('AppModel', 'Model');
/**
 * Doc Model
 *
 * @property Sponsor $Sponsor
 */
class Doc extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'docs';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'TourPackage' => array(
			'className' => 'TourPackage',
			'foreignKey' => 'tour_package_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
