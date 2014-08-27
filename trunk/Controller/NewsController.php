<?php
/**
 * Static content controller.
 *
 * This file will render views from views/News/
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
class NewsController extends AppController{
    var $name = 'News';
	 public  function beforeFilter(){
	if(env('HTTPS')){ 
	      $this->_unforceSSL();
	           }}
	   public function _unforceSSL() {
	        $this->redirect('http://' . env('SERVER_NAME') . $this->here);
	    }
    /**
	 * Models
	 * @var array
	 */
     /**
	 * Themes: Front
	 * @layout tour.ctp
	 */
    public $layout = 'tour';
    
    public $uses = array('News');
    
    public function detail($id = null)
    {
    	$tod = date('Y-m-d H:i:s');
        $news = $this->News->find('first', array(
                'conditions' => array(
                        'News.id' => $id,
                        'News.status' => 1,
                                           	'News.schedule_start <=' => $tod,
											'News.schedule_end   >=' => $tod
                    )));
        if(!empty($news)) 
        {
            $this->set('news',$news);
        }
    }
}
?>