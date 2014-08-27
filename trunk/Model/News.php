<?php

/**
 * Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 * Static 0: Hide, 1:Active, 2:Expired, 3:Reserved
 */

class News extends AppModel
{
	public $validate = array(
        'title' => array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => "Title is not empty"
            ),
        ),
        'content' => array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => "Content is not empty"
            ),
        ),
    );
}	