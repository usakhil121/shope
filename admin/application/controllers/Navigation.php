<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation extends MY_Controller {
   

	public function index()
		{
			 $this->data['headding']='Create Navigation';
			 $this->data['navigation']=array();
			 $this->_navigationform();
		}
		public function editnavigation()
		{
			 $id=$this->uri->segment(3);
			 $this->data['headding']='Edit Navigation';
			 $this->data['navigation']=$this->Common_model->getrow('shope_navigation','navId',$id);
			 $this->_navigationform();
		}
		public function _navigationform()
		{
			$this->load->view('templates/head');
			$this->load->view('templates/navbar');
			$this->load->view('navigation/navigation',$this->data);
			$this->load->view('templates/footer');
			
		}
		
		public function insertupdate_navigation()
		{
			if (isset($_COOKIE['shopeadmin'])) {
			$arr['navName']=$this->security->xss_clean($this->input->post('navName'));
			$arr['parent']=$this->security->xss_clean($this->input->post('parent'));
			$arr['link']=$this->security->xss_clean($this->input->post('link'));
            $arr['page']=$this->security->xss_clean($this->input->post('page'));
			$arr['sortOrder']=$this->security->xss_clean($this->input->post('sortOrder'));
			
			

			if($this->input->post('navId')){
				$id=$this->input->post('navId');
				$this->Common_model->update('shope_navigation',$arr,$id,'navId');
				$this->session->set_flashdata('successa', 'Navigation updated Successfully!');
			}else{
			  $this->Common_model->insert('shope_navigation',$arr);
			  $this->session->set_flashdata('successa', 'Navigation added Successfully!');
			}
			  redirect("navigation");
			} else {
				redirect(base_url() . 'admin/login');
			}
		}
	
		public function delete_navigation()
		{
			if (isset($_COOKIE['shopeadmin'])) {
				$id=$this->uri->segment(3);
				$this->Common_model->delete('shope_navigation',$id,'navId');
				$this->session->set_flashdata('successa', 'Navigation deleted Successfully!');
				redirect("navigation");
			} else {
				redirect(base_url() . 'admin/login');
			}
		}
		













		
		

}
