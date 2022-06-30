<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

	public function index()
		  {
			   $this->data['headding']='Create Page';
			   $this->data['page']=array();
			   $this->_pageform();
		  }
		  public function editpage()
		  {
			   $id=$this->uri->segment(3);
			   $this->data['headding']='Edit Page';
			   $this->data['page']=$this->Common_model->getrow('shope_pages','pageId',$id);
			   $this->_pageform();
		  }
		  public function _pageform()
		  {
			  $this->load->view('templates/head');
			  $this->load->view('templates/navbar');
			  $this->load->view('page/cpage',$this->data);
			  //$this->load->view('templates/footer');
			  
		  }
		  
		  public function insertupdate_page()
		  {
			  if (isset($_COOKIE['shopeadmin'])) {
			  $arr['pageName']=$this->security->xss_clean($this->input->post('pageName'));
			  $arr['pageTitle']=$this->security->xss_clean($this->input->post('pageTitle'));
			  $arr['slug']=$this->security->xss_clean($this->input->post('slug'));
			  $arr['pageContent']=$this->security->xss_clean($this->input->post('pageContent'));
  
			  if($this->input->post('pageId')){
				  $id=$this->input->post('pageId');
				  $this->Common_model->update('shope_pages',$arr,$id,'pageId');
				  $this->session->set_flashdata('successa', 'Page updated Successfully!');
			  }else{
				$this->Common_model->insert('shope_pages',$arr);
				$this->session->set_flashdata('successa', 'Page added Successfully!');
			  }
				redirect("pages");
			  } else {
				  redirect(base_url() . 'users/login');
			  }
		  }
	  
		  public function delete_page()
		  {
			  if (isset($_COOKIE['shopeadmin'])) {
				  $id=$this->uri->segment(3);
				  $this->Common_model->delete('shope_pages',$id,'pageId');
				  $this->session->set_flashdata('successa', 'Page deleted Successfully!');
				  redirect("pages");
			  } else {
				  redirect(base_url() . 'users/login');
			  }
		  }

	public function check_slug()
	{
		$name=$this->input->post('val');
		$seo=strtolower($name);
        $seo=str_replace(" ","-",$seo);
		$seo=preg_replace('/[^A-Za-z0-9\-]/','', $seo);
		$vale=$this->input->post('vale');
		$this->db->where('slug',$seo);
		if($vale !=""){
			$this->db->where('pageId !=',$vale);
		}
                $query = $this->db->get('shope_pages');
                $query->num_rows();
                if($query->num_rows() > 0)
                {
                    echo $seo.uniqid();
                }else{
					echo $seo;
				}
	}

	public function check_slug1()
	{
		$val=$this->input->post('val');
		$vale=$this->input->post('vale');
		$this->db->where('slug',$val);
		if($vale !=""){
			$this->db->where('pageId !=',$vale);
		}
                $query = $this->db->get('shope_pages');
                $query->num_rows();
                if($query->num_rows() > 0)
                {
                    echo 1;
                }else{
					echo 2;
				}
	}

}
