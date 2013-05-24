<?php
 class Image
 {
     private $id,$path,$tags;
     
     public function __construct()
     {
         
     }
     
     public function set_id($value)
     {
         $this->id=$value;
     }
     
     public function get_id()
     {
         return $this->id;
     }
     
      public function set_path($value)
     {
         $this->path=$value;
     }
     
     public function get_path()
     {
         return $this->path;
     }
     
      public function set_tags($value)
     {
         $this->tags=$value;
     }
     
     public function get_tags()
     {
         return $this->tags;
     }
 }