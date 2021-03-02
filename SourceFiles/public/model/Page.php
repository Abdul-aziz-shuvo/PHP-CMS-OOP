<?php

class Page{
    public $id;
    public $title;
    public $dbc;
    public function __construct($dbc){
        $this->dbc = $dbc;
    }

     public function findById($id){
         

         $query = "SELECT * from pages where id = $id ";
         $stmnt = $this->dbc->prepare($query);
         $stmnt->execute();
         $pageObj = $stmnt->fetch();
        
       
         $this->id = $pageObj['id'];
         $this->title= $pageObj['title'];
         $this->content = $pageObj['content'];

         $pageObj ['id'] =   $this->id;
         $pageObj ['title'] =   $this->title;
         $pageObj ['content'] =   $this->content;
         return $pageObj;
     }
}