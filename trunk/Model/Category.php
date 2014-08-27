<?php

/**
 * Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

class Category extends AppModel
{
	public $validate = array(
        'name' => array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'required' => true,
            ),
            'rule2' => array(
                'rule' => 'isUnique',
                'message' => 'Name of category must be unique'
            )
        ),
        'order' => array(
            'alphaNumeric' => array(
                'rule'     => 'alphaNumeric',
                'required' => true,
                'allowEmpty' => false,
                'message'  => 'Letters and numbers only'
            ),
        ),
    );

/**
 * hasAndBelongsToMany
 * @var array
 */
    public $hasAndBelongsToMany = array(
        'TourPackage' =>
            array(
                'className' => 'TourPackage',
                'joinTable' => 'tour_packages_categories',
                'foreignKey' => 'category_id',
                'associationForeignKey' => 'tour_package_id',
                'unique' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'finderQuery' => '',
                'with' => 'TourPackagesCategory'
            )
    );

}