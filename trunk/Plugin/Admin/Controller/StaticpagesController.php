<?php
/**
 * Staticpages Controller
 *
 * @property TourPackage $TourPackage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
 class StaticpagesController extends AdminAppController {
 	

/**
 * Components
 * @var array
 */
    public $components = array('Paginator','Session','Security');
    public $helpers = array('Ck');

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
 * Models
 * @var array
 */
    public $uses = array('Staticpage');
    
 /**
 * Pagination settings
 * @var array
 */
 
    public $paginate = array(
                            'limit' => 5,
                            'order' => array('Staticpage.id' => 'asc')
                            );
/**
 * index method
 *
 * @return void
 */
    public function index(){
        if(!empty($_POST['data']['status'])){
            $status = $_POST['data']['status'];
            $this->paginate = array(
                                    'limit' => 5,
                                    'order' => array('Staticpage.id' => 'asc'),
                                    'conditions' => array('Staticpage.status' => $status)
                                    );
        }
        else{
            $this->paginate = array(
                                    'limit' => 5,
                                    'order' => array('Staticpage.id' => 'asc')
                                    );
        }
        $this->Paginator->settings = $this->paginate;
        $this->set('staticpage',$this->Paginator->paginate('Staticpage'));
    }
/**
 * add method
 *
 * @return void
 */
    public function add(){
        $flag = null;
        if(!empty($this->request->data)){
            $this->request->data['Staticpage']['created_date'] = date("Y-m-d");
            if($this->Staticpage->save($this->request->data)){
                $this->redirect(array('action'=>'index'));
            }
            else{
                $flag = false;
            }
        }
    }
/**
 * edit method
 *
 * @return void
 */    
    public function edit($id = null){
        $flag = null;
        if(isset($id)){
            if(!empty($this->request->data)){
                $this->Staticpage->id = $id;
                $this->request->data['Staticpage']['modified_date'] = date("Y-m-d");
                if($this->Staticpage->save($this->request->data)){
                    $this->redirect(array('action'=>'index'));
                }
                else{
                    $flag = false;
                }
            }
            else{
                $options = array('conditions' => array('Staticpage.id'=> $id));
			     $this->request->data = $this->Staticpage->find('first', $options);
            }
        }
    }
/**
 * delete method
 *
 * @return void
 */ 
    public function delete($id = null){
        if(isset($id)){
            if($this->Staticpage->delete($id)){
                $this->redirect(array('action'=>'index'));
            }
            else{
                $flag = false;
            }
        }
    }
}
?>