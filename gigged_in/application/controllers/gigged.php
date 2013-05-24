<?php
    class Gigged extends CI_Controller
    {
        public function __construct() 
        {
            parent::__construct();
            $this->load->model('gigged_model');
            $this->load->library('Image');
        }
        
        public function index()
        {
            $data['content']='g_content/add_images';
            $this->load->view('g_templates/compiled_view',$data);
        }
        
        //This function is used to upload images using jquery dropzone pluggin
        public function upload()
        {
            $this->gigged_model->upload_image();
        }
        
        //This function shows images in database in a table format to add/edit
        //tags or to delete an image from the database.
        public function tags()
        {
            $val= $this->uri->segment(3);
            
            if(!is_numeric($val))
            {
                $data['images']= $this->gigged_model->get_tags();
                $data['content']='g_content/add_tags';
            }
            else
            {
                $data['image']=$this->gigged_model->get_image_id();
                $data['content']='g_content/edit_tags_form';
            }
            $this->load->view('g_templates/compiled_view',$data);
        }
        
        //Make changes to tags associated with an image.
        public function edit_tags()
        {
            $this->gigged_model->set_tags();
            $this->tags();
        }
        
        //search database using the given keywords if none supplied retrives all
        //the images
        public function search()
        {
            $items= $this->gigged_model->get_image_tags();
            
            if(count($items)>=1)
            {
                $data['images']= $items;
                $data['content']='g_content/show_images';
            }
            else
            {
                $data['message']='No Results found try different key words.';
                $data['content']='g_content/no_results';
            }
            
            $this->load->view('g_templates/compiled_view',$data);
        }
        
        //Displays full image in a new tab
        public function full_image()
        {
            $data['image']= $this->gigged_model->get_image_id();
            $data['content']='g_content/full_image';
            $this->load->view('g_templates/compiled_view',$data);
        }
        
        //Deletes image from the database
        public function delete_image()
        {
            $this->gigged_model->delete_id();
            $data['images']= $this->gigged_model->get_tags();
            $data['content']='g_content/add_tags';
            $this->load->view('g_templates/compiled_view',$data);
        }
        
        
    }