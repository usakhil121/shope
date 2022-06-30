<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends  MY_Controller{
    public function __construct(){
        parent::__construct();
        
    }

	public function index()
		{ 
            
			 $this->data['headding']='Create Category';
			 $this->data['category']=array();
			 $this->_categoryform();
		}
    
		public function editcategory()
		{
			 $id=$this->uri->segment(3);
			 $this->data['headding']='Edit Category';
			 $this->data['category']=$this->Common_model->getrow('shope_categories','category_id',$id);
			 $this->_categoryform();
		}
		public function _categoryform()
		{
			$this->load->view('templates/head');
			$this->load->view('templates/navbar');
			$this->load->view('category/category',$this->data);
			$this->load->view('templates/footer');
			
		}
		
		public function insertupdate_category()
		{
			if (isset($_COOKIE['shopeadmin'])) {
			$arr['category_name']=$this->security->xss_clean($this->input->post('category_name'));
			$arr['category_type_slug']=$this->security->xss_clean($this->input->post('category_type_slug'));
			
	
	

			if($this->input->post('category_id')){
				$id=$this->input->post('category_id');
				$this->Common_model->update('shope_categories',$arr,$id,'category_id');
				$this->session->set_flashdata('successa', 'Career updated Successfully!');
			}else{
			  $this->Common_model->insert('shope_categories',$arr);
			  $this->session->set_flashdata('successa', 'Career added Successfully!');
			}
			  redirect("category");
			} else {
				redirect(base_url() . 'admin/login');
			}
		}
	
		public function delete_category()
		{
			if (isset($_COOKIE['shopeadmin'])) {
				$id=$this->uri->segment(3);
				$this->Common_model->delete('shope_categories',$id,'category_id');
				$this->session->set_flashdata('successa', 'Career deleted Successfully!');
				redirect("category");
			} else {
				redirect(base_url() . 'admin/login');
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
                            $query = $this->db->get('shope_categories');
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
                            $query = $this->db->get('shope_categories');
                            $query->num_rows();
                            if($query->num_rows() > 0)
                            {
                                echo 1;
                            }else{
                                echo 2;
                            }
                }

                public function subCategory()
                {
                    $this->data['headding']='Create Sub Category';
                    $this->data['subcategory']=array();
                    $this->_subcategoryform();
               }
               public function editsubcategory()
               {
                    $id=$this->uri->segment(3);
                    $this->data['headding']='Edit SubCategory';
                    $this->data['subcategory']=$this->Common_model->getrow('shope_sub_categories','sub_category_id',$id);
                    $this->_subcategoryform();
               }
               public function _subcategoryform()
               {
                   $this->load->view('templates/head');
                   $this->load->view('templates/navbar');
                   $this->load->view('category/subcategory',$this->data);
                   $this->load->view('templates/footer');
                   
               }
                 public function insertupdate_subcaegory()
                        {
                            if (isset($_COOKIE['shopeadmin'])) {
                            $arr['sub_category_name']=$this->security->xss_clean($this->input->post('sub_category_name'));
                            $arr['category_type']=$this->security->xss_clean($this->input->post('category_type'));
                            
                            
                            

                            if($this->input->post('sub_category_id')){
                                $id=$this->input->post('sub_category_id');
                                $this->Common_model->update('shope_sub_categories',$arr,$id,'sub_category_id');
                                $this->session->set_flashdata('successa', 'Sub category updated Successfully!');
                            }else{
                            $this->Common_model->insert('shope_sub_categories',$arr);
                            $this->session->set_flashdata('successa', 'Sub category added Successfully!');
                            }
                            redirect("category/subCategory");
                            } else {
                                redirect(base_url() . 'admin/login');
                            }
                        }
                        public function deletesubcategory()
                        {
                            if (isset($_COOKIE['shopeadmin'])) {
                                $id=$this->uri->segment(3);
                                $this->Common_model->delete('shope_sub_categories',$id,'sub_category_id');
                                $this->session->set_flashdata('successa', 'Sub deleted Successfully!');
                                redirect("category/subCategory");
                            } else {
                                redirect(base_url() . 'admin/login');
                            }
                }
                    









            }