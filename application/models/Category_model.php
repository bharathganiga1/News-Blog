<?php 
    class Category_Model extends CI_Model{
        public function __construct(){
            $this->load->database();
            $this->load->model('Post_Model');
        }

        public function create_category(){
            //getting data from category form
            $data = array(
                'name' => $this->input->post('name')
            );
            //inserting into database
            return $this->db->insert('category',$data);
        }

        public function get_categories(){
            $this->db->order_by('name');
            $query= $this->db->get('category');
            return $query->result_array();
        }

        public function get_category($id)
        {
            $query = $this->db->get_where('category',array('id'=>$id));
            return $query->row();
        }

        public function get_posts_by_category($category_id) {
            $this->db->select('posts.*, category.name as category_name'); // Select required columns
            $this->db->from('posts');
            $this->db->join('category', 'category.id = posts.category_id');
            $this->db->where('posts.category_id', $category_id);
            $this->db->order_by('posts.id', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
        

    }