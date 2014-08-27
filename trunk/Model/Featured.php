<?php
App::uses('AppModel', 'Model');
/**
 * Featured Model
 *
 * @property Sponsor $Sponsor
 */
class Featured extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'featured';

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

	/**
	 * return order value
	 * @return  int
	 */
	public function getOrderNum()
	{
		$list = $this->find('list', array(
				'fields' => array('Featured.id', 'Featured.order')
			));
		$order = !empty($list) ? max($list) + 1 : 1;
		return $order;
	}

	public function listAll($limit = 1)
	{
		return $this->find('all', array(
				'limit' => $limit,
				'order' => array(
						'Featured.order' => 'desc'
					)
			));
	}
}
