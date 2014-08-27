<?php
App::uses('AppModel', 'Model');
/**
 * Region Model
 *
 * @property Prefecture $Prefecture
 * @property TourPackage $TourPackage
 */
class Region extends AppModel {

	public $hasMany = array(
			'Prefecture' => array(
					'className'    => 'Prefecture',
					'foreignKey'   => 'region_id',
					'dependent'    => false,				
				)
		);
}