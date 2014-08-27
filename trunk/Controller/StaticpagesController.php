<?php
/**
 * Static content controller.
 *
 * This file will render views from views/Tours/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 class StaticpagesController extends AppController{
    var $name = 'Staticpages';
    /**
	 * Models
	 * @var array
	 */
    public $uses = array('Staticpage');
    public $layout = 'tour';
    public function detail($slug = null){
        if(isset($slug)){
            $staticpage = $this->Staticpage->find('first',array(
                                                    'conditions' => array('Staticpage.slug' => $slug,'Staticpage.status'=>'1')
                                                )
                                    );
            $this->set('staticpage',$staticpage);
        }
    }
 }
?>
