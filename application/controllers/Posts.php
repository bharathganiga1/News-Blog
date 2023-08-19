<?php 
    class Posts extends CI_Controller{
        public function index()
        {
            $data['title'] = 'Latest comments';

            $data['posts'] = $this->Post_model->get_posts();
            //print_r($data['posts']);
            $this->load->view('header');
            $this->load->view('posts/index', $data);
            $this->load->view('footer');
        }

        public function view($slug = NULL)
        {
            $data['post'] = $this->Post_model->get_posts($slug);
            //print_r($data['post']);
            $post_id = $data['post']['id'];
            $data['comments'] = $this->Comment_Model->get_comments($post_id);
            if(empty($data['post']))
            {
                show_404();
            }
            $data['title'] = $data['post']['title'];
            $this->load->view('header');
            $this->load->view('posts/view', $data);
            $this->load->view('footer');
        }

        public function create()
        {
            if(!$this->session->userdata('logged_in'))
            {
                redirect('users/login');
            }
            $data['title'] = 'Create Post'; 
            
            $data['categories'] = $this->Post_model->get_categories();

            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('body','Body','required');
            
            if($this->form_validation->run() === FALSE){
                
                $this->load->view('header');
                //print_r('asdfghj');
                $this->load->view('posts/create', $data);
                $this->load->view('footer');  
            }else{
                //upload images configuration setting
                $config['upload_path'] = './images/post-images';
                $config['allowed_types'] = 'png|gif|jpg';
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload',$config);
                //checking if image uploaded or Not
                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image ='noimage.jpg';
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];
                }

                $this->Post_model->create_post($post_image);
                $this->session->set_flashdata('Post_created','Your Post has been created');
                redirect('posts');
            }
            
        }

        public function delete($id)
        {
            if(!$this->session->userdata('logged_in'))
            {
                redirect('users/login');
            }
            $this->Post_model->delete_post($id);
            $this->session->set_flashdata('Post_deleted','Your Post has been deleted');
            redirect('posts');
        }

        public function edit($slug)
        {
            if(!$this->session->userdata('logged_in'))
            {
                redirect('users/login');
            }
            $data['post'] = $this->Post_model->get_posts($slug);
            //check user
            if($this->session->userdata('user_id')!=$this->Post_Model->get_posts($slug)['user_id']){
                redirect('posts');
            }

            $data['categories'] = $this->Post_model->get_categories();

            if(empty($data['post']))
            {
                show_404();
            }
            $data['title'] = 'Edit Post';

            $this->load->view('header');
            $this->load->view('posts/edit', $data);
            $this->load->view('footer');
        }
        public function update()
        {
            if(!$this->session->userdata('logged_in'))
            {
                redirect('users/login');
            }
            $this->Post_model->update_post();
            $this->session->set_flashdata('Post_updated','Your Post has been updated');
            redirect('/posts');
        }
    }