<?php
/**
 * Contact Controller
 *
 * @property TourPackage $TourPackage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContactpartnersController extends AdminAppController {
	
	
	//ssl用設定
		  

   
    
/**
 * Components
 * @var array
 */
    public $components = array('Paginator','Security');
  
   public  function beforeFilter(){

        //SSLを強制するアクションを設定
       		$this->Security->validatePost = false;
            $this->Security->blackHoleCallback = 'forceSSL';
            $this->Security->requireSecure();
           }
    public function forceSSL() {
        $this->redirect('https://' . env('SERVER_NAME') . $this->here);
    }
	
 /**
 * Pagination settings
 * @var array
 */
 
    public $paginate = array(
                            'limit' => 5,
                            'order' => array('Contactpartners.id' => 'asc')
                            );  
    
/**
 * Models
 * @var array
 */ 
    public $uses = array('Contactpartner');
/**
 * index method
 *
 * @return void
 */
    public function index(){
        $this->paginate = array(
                                'limit' => 10,
                                'order' => array('Contactpartners.id' => 'asc')
                                );
        $this->Paginator->settings = $this->paginate;
        $this->set('contactpartners',$this->Paginator->paginate('Contactpartner'));
    }
/**
 * delete method
 *
 * @return void
 */ 
    public function delete($id = null){
        if(isset($id)){
            if($this->Contactpartner->delete($id)){
                $this->redirect(array('action'=>'index'));
            }
            else{
                $flag = false;
            }
        }
    }
 /**
 * delete method
 *
 * @return void
 */ 
 
    public function view($id = null){
        if(isset($id)){
            $contactpartner = $this->Contactpartner->find('first',array('conditions' => array('Contactpartner.id' => $id)));
            $this->set('contactpartner',$contactpartner);
        }
    }
}
?>