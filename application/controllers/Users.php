<?php 
    class Users extends CI_Controller{
        public function register(){
            $data['title'] = 'Sign UP';

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
            $this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','Confirm Password','matches[password]');

            if($this->form_validation->run() === FALSE){
                $this->load->view('header');
                $this->load->view('users/register',$data);
                $this->load->view('footer');
            }else{
                //password encryption
                $enc_password = md5($this->input->post('password'));

                $this->User_Model->register($enc_password);

                //set message
                $this->session->set_flashdata('user_registered','You are Now Registered and Now can Log in');

                redirect('posts');
            }
        }
        function check_username_exists($username)
        {
            $this->form_validation->set_message('check_username_exists','That Username already Taken!!');

            if($this->User_Model->check_username_exists($username))
                return false;
            else{
                return true;
            }
        }
        function check_email_exists($email)
        {
            $this->form_validation->set_message('check_email_exists','That email already in Use!!');

            if($this->User_Model->check_username_exists($email))
                return false;
            else{
                return true;
            }
        }

    }