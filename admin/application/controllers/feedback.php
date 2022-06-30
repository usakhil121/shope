<?php
defined("BASEPATH") OR exit('No direct script access allowed');


class Feedback extends  MY_Controller{
    public function __construct(){
        parent::__construct();
        
    }
    public function index(){
        $this->data['headding']='Create feedback';
        $this->data['category']=array();
        $this->_feedbackform();
    }
    public function _feedbackform(){
        $this->load->view('templates/head');
			$this->load->view('templates/navbar');
			$this->load->view('feedback/feedback',$this->data);
			$this->load->view('templates/footer');
    }

}

?>