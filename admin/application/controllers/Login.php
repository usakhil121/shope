<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index()
	{
		if(isset($_COOKIE['shopeadmin'])) {
			$userid = $_COOKIE['shopeuserid'];
				redirect('product');
		} else {
			$this->load->view('login/login');
		 }
	}
    public function t1()
    {
        echo 'hai';
    }

    public function authorizein(){
		if($_POST){
			$userName = $this->input->post('userName');
			$userPassword = $this->input->post('userPassword');
			$this->form_validation->set_rules('userPassword', 'userPassword', 'trim|required');
			$this->form_validation->set_rules('userName', 'userName', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Warning!</strong><br />' . validation_errors() . '</div>');
				$this->load->view('login/login');
			} else {
				// $user = $this->Common_model->checklogin($userName, $userPassword)['userName'];
				$userdata = $this->Common_model->checkadminlogin($userName, $userPassword, 1);
				// echo $this->db->last_query();
				if (isset($userdata)){   
				if (!empty($userdata)) {
					setcookie('shopeadmin', $userdata['usersName'], time() + (86400 * 30), "/");
					setcookie('shopeusername', $userdata['usersName'], time() + (86400 * 30), "/");
					setcookie('shopeuserid', $userdata['userId'], time() + (86400 * 30), "/");
					setcookie('shopeuserlevel', $userdata['userLevel'], time() + (86400 * 30), "/");
                   // $this->Common_model->recordaccess($userdata['userId'], $this->uri->segment(1), $this->uri->segment(2), date("Y-m-d h:i:sa"));
					redirect(base_url() . 'login');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Warning!</strong><br />Wrong Username or Password</div>');
					$this->load->view('login/login');
				}
			} 
		
			
			else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Warning!</strong><br />Wrong Username or Password</div>');
				$this->load->view('login/login');
			}
			}

		}
	}
											public function authorizeout(){
												if(isset($_COOKIE['shopeadmin'])) {
												// $this->Common_model->recordaccess($_COOKIE['sprwuserid'], $this->uri->segment(1), $this->uri->segment(2), date("Y-m-d h:i:sa"));
													delete_cookie('shopeadmin');
													delete_cookie('shopeusername');
												// delete_cookie('sprwuser');
													delete_cookie('shopeuserlevel');
													redirect(base_url().'login');
												} else {
													redirect(base_url().'login');
												}
										}
   
}

