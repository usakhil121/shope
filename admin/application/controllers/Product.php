<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
   

	public function index()
		{
			 $this->data['headding']='Create Product';
			 $this->data['career']=array();
			 $this->_productform();
		}
		/*public function editstudent()
		{
			 $id=$this->uri->segment(3);
			 $this->data['headding']='Edit Career';
			 $this->data['career']=$this->Common_model->getrow('tbl_student','studID',$id);
			 $this->_careerform();
		} */
		public function _productform()
		{
			$this->load->view('templates/head');
			$this->load->view('templates/navbar');

			//$data['category'] = $this->Common_model->get_category()->result();
			
			$this->load->view('product/product',$this->data);
			//$this->load->view('templates/footer');
			
		}
		function get_sub_category1(){
			
            $category_id = $this->input->post('id');  //ajax id
			
           // $data = $this->common_model->get_sub_category($category_id)->result();
            echo json_encode($data);
        }

		
		

}
