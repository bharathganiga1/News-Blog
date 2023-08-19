<?php 
    class Users extends CI_Controller{
        //user registration
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

                redirect('users/login');
            }
        }

        //user login
        public function login(){
            $data['title'] = 'Sign IN';

            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('header');
                $this->load->view('users/login',$data);
                $this->load->view('footer');
            }else{
                //getting from the login form
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));

                //get the userid from database
                $user_id = $this->User_Model->login($username,$password);

                //checking 
                if($user_id){
                    $user_data = array(
                        'user_id' => $user_id,
                        'username'=>$username,
                        'logged_in' => true

                    ); 
                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('user_loggedin','You are Now Logged in');
                    redirect('/');
                }else{
                    //set message
                    $this->session->set_flashdata('loggin_failed','Invalid Loggin Credentials!');
                    redirect('users/login');
                }
            }
        }

        public function logout(){
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('user_id');

            $this->session->set_flashdata('user_logout','You are now logged Out');
            redirect('users/login');
        }

        function check_username_exists($username)
        {
            $this->form_validation->set_message('check_username_exists','That Username already Taken!!');

            if(!$this->User_Model->check_username_exists($username))
                return false;
            else{
                return true;
            }
        }
        function check_email_exists($email)
        {
            $this->form_validation->set_message('check_email_exists','That email already in Use!!');

            if(!$this->User_Model->check_username_exists($email))
                return false;
            else{
                return true;

            }
        }

    }