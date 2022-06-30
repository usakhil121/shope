<?php 
class MY_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (empty($_COOKIE['shopeadmin'])) {

            
        
            
            echo '<script>alert("login first")</script>';
            
            
            
            
            $this->load->view('login/login');
          }

}
}

?>