<?php 
    class Categories extends CI_Controller{
        public function index(){
            $data['title'] = 'Category';

            $data['categories'] = $this->Category_Model->get_categories();
            
            $this->load->view('header');
            $this->load->view('categories/index',$data);
            $this->load->view('footer');

        }
        
        public function create(){

            $data['title'] = 'Create Category';

            $this->form_validation->set_rules('name','Name','required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('header');
                $this->load->view('categories/create',$data);
                $this->load->view('footer');
            }else{
                $this->Category_Model->create_category();
                $this->session->set_flashdata('category_created','new Category has been created');
                redirect('categories');
            }
        }

        public function posts($id){

            $data['title'] = $this->Category_Model->get_category($id)->name;

            $data['posts'] = $this->Category_Model->get_posts_by_category($id);
            
            $this->load->view('header');
            $this->load->view('posts/index',$data);
            $this->load->view('footer');
        }
    }