<?php

class Gigged_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    //returns all the images from database
    private function get_all_images()
    {
        $query = $this->db->get('images');
        $items= $query->result_array();
        return $items;
    }
    
    // saves image in the directory and upload path in database
    
    public function upload_image()
    {
        $ds = DIRECTORY_SEPARATOR;
        $storeFolder = 'images';  
 
        $allowedExts = array("gif", "jpeg", "jpg", "png","JPG");
        $extension = (explode(".", $_FILES["file"]["name"]));
        if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
        && in_array($extension[1], $allowedExts))
        {
            $tempFile = $_FILES['file']['tmp_name'];            
            $targetPath = $storeFolder . $ds; 
            $targetFile =  $targetPath. $_FILES['file']['name'];
            $this->add_image($targetFile);
            move_uploaded_file($tempFile,$targetFile);
        }
    } 
    
    
    //updates database with image path
    private function add_image($path)
    {
        $data= array(
            'path'=>$path,
        );
        
        $this->db->insert('images',$data);
    }
    
    //retrives all the images
    public function get_tags()
    {
        $items= $this->get_all_images();
        $images = array();
        
        foreach($items as $item)
        {
            $image = new Image();
            $image->set_id($item['id']);
            $image->set_path($item['path']);
            $image->set_tags($item['tags']);
            $images[]= $image;
        }
        return $images;
    }
    
    //returns image by id
    public function get_image_id()
    {
        $id= $this->uri->segment(3);
        $this->db->where('id',$id);
        $query= $this->db->get('images');
        $record= $query->row_array();
        
        $image = new Image();
        $image->set_id($record['id']);
        $image->set_path($record['path']);
        $image->set_tags($record['tags']);
        
        return $image;
    }
    
    //updates tags associated with an image
    public function set_tags()
    {
        $id= $this->input->post('id');
        $tags= $this->input->post('tags');
        $data= array(
            'tags'=>$tags,
        );
        
        $this->db->where('id',$id);
        $this->db->update('images',$data);
    }
    
    // retrives images based on supplied tags
    public function get_image_tags()
    {
        $tags = $this->input->post('tags');
        $this->db->like('tags',$tags);
        $query= $this->db->get('images');
        $images=array();
        
        if($query->num_rows()>=1)
        {
            foreach($query->result_array() as $item)
            {
                $image = new Image();
                $image->set_id($item['id']);
                $image->set_path($item['path']);
                $image->set_tags($item['tags']);
                $images[]= $image;
            }
        }
        return $images;
    }
    
    //deletes image using the image id
    public function delete_id()
    {
        $id= $this->uri->segment(3);
        $this->db->where('id',$id);
        $query= $this->db->get('images');
        $image= $query->row_array();
        unlink($image['path']);
        $this->db->where('id',$image['id']);
        $this->db->delete('images');           
    }
    
    
}