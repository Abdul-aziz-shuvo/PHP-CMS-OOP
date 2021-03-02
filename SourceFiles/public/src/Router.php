<?php 



class Router{
    
    public $module;
    public $action;
    public $entity_id;
    public $pretty_url;


    public $dbc;
    public function __construct($dbc){
        $this->dbc = $dbc;
    }

     public function findBy($url){
         

         $query = "SELECT * from routes where pretty_url = $url";
         $stmnt = $this->dbc->prepare($query);
         $stmnt->execute();
         $pageObj = $stmnt->fetch();
        
       
         $this->id = $pageObj['module'];
         $this->title= $pageObj['action'];
         $this->entity_id = $pageObj['entity_id'];
         $this->pretty_url = $pageObj['pretty_url'];


         $pageObj ['module'] =   $this->module;
         $pageObj ['action'] =   $this->action;
         $pageObj ['entity_id'] =   $this->entity_id;
         $pageObj ['pretty_url'] =   $this->pretty_url;

         return $pageObj;
     }
}