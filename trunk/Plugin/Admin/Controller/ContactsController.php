<?php
/**
 * Contact Controller
 *
 * @property TourPackage $TourPackage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContactsController extends AdminAppController {
	
	
	
    
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
                            'order' => array('Contacts.id' => 'asc')
                            );  
    
/**
 * Models
 * @var array
 */ 
    public $uses = array('Contact');
/**
 * index method
 *
 * @return void
 */
    public function index(){
        $this->paginate = array(
                                'limit' => 5,
                                'order' => array('Contacts.id' => 'asc')
                                );
        $this->Paginator->settings = $this->paginate;
        $this->set('contacts',$this->Paginator->paginate('Contact'));
    }
/**
 * delete method
 *
 * @return void
 */ 
    public function delete($id = null){
        if(isset($id)){
            if($this->Contact->delete($id)){
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
            $contact = $this->Contact->find('first',array('conditions' => array('Contact.id' => $id)));
            $this->set('contact',$contact);
        }
    }
}
?>