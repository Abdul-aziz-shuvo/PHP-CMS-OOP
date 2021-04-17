<?php 


class controller{
    protected $entity_id;
    public function runAction($actionName){
        if(method_exists($this,'runBeforeAction')){
          $result =   $this->runBeforeAction();
          if($result == false){
              return;
          }
        }
        $actionName .= 'Action';
        if(method_exists($this,$actionName)){
            $this->$actionName();
        }else{
            include VIEW_PATH.'404.html';
        }
    }
    public function setEntity($entity_id){
        $this->entity_id = $entity_id;
    }
}