<?php
class LoginCtrl extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Login();
        
    }

    public function index(){

        if ($_POST) {

            $this->loginUser($_POST); 
            $this->data['err'];
            $this->data['msg'];
            
         }
    }
    
    public function loginUser($safePOST){
       
        $safePOST = array_map('trim', filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));
        $this->data['err'] =  $this->model->loginUser($safePOST);
        $this->data['msg'] =  $this->model->msg();
        if(Auth::loggedIn()){
                header('Location:'.BASE_URL);
                exit();
            }
    }

    public function logoutUser(){
        
            $this->model->logoutUser();
            header('Location:'.BASE_URL);
            exit();
    }
    public function register(){
        
        
    }
}

?>