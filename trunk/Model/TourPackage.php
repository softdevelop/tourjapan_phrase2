<?php
App::uses('AppModel', 'Model');
/**
 * TourPackage Model
 *
 * @property Sponsor $Sponsor
 * @property Area $Area
 * @property Category $Category
 * @property Application $Application
 * status : 0 : hide, 1: open, 2: reserved, 3: close
 */
class TourPackage extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'sponsor_id' => array(
			'rule' => array('comparison', '>=', 1),
			'message' => '主催者を選択してください'
		),
		'area_id' => array(
			'rule' => array('comparison', '>=', 1),
			'message' => 'エリアを指定してください'
		),
		'tour_name' => array(
			'rule' => 'notEmpty',
			'message' => 'ツアーネームが入ってません'
		),
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'サブタイトルが入っておりません'
		),
		'short_description' => array(
			'rule' => 'notEmpty',
			'message' => '詳細が入っておりません'
		),
	
		'fee_adult' => array(
			'rule' => 'notEmpty',
			'message' => '大人料金が入っておりません'
		),

		'includings' => array(
			'rule' => 'notEmpty',
			'message' => '含まれるものが入っておりません'
		),
		'meeting_place' => array(
			'rule' => 'notEmpty',
			'message' => '集合場所が入っておりません'
		),
		'estimate_time' => array(
			'rule' => 'notEmpty',
			'message' => '所要時間が入っておりません'
		)

	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	public $hasOne = array(
			'Featured' => array(
					'className'  => 'Featured',
					'foreignKey' => 'tour_package_id',
					'dependent'  => true,
					'order'		=> 'Featured.order ASC'
				)	
		);
	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Sponsor' => array(
			'className'  => 'Sponsor',
			'foreignKey' => 'sponsor_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		),
		'Area' => array(
			'className'  => 'Area',
			'foreignKey' => 'area_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		)
		
		
	);

	/**
	 * hasAndBelongsToMany
	 * @var array
	 */
	public $hasAndBelongsToMany = array(
        'Category' =>
            array(
				'className'             => 'Category',
				'joinTable'             => 'tour_packages_categories',
				'foreignKey'            => 'tour_package_id',
				'associationForeignKey' => 'category_id',
				'unique'                => true,
				'conditions'            => '',
				'fields'                => '',
				'order'                 => '',
				'limit'                 => '',
				'offset'                => '',
				'finderQuery'           => '',
				'with'                  => 'TourPackagesCategory'
            )
    );

    /**
     * HasMany relation
     * @var  array
     */
    
    public $hasMany = array(
    		'Application' => array(
    				'className' => 'Application',
    				'foreignKey' => 'tour_package_id'
    			),
    		'Image' => 
    			array(
					'className'  => 'Image',
					'foreignKey' => 'tour_id',
    			)
			
				
    	);
   
	
	
		
}
