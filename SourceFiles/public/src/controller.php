<?php 


class controller{
    public function runAction($actionName){
        $actionName .= 'Action';
        if(method_exists($this,$actionName)){
            $this->$actionName();
        }else{
            include 'view/404.html';
        }
    }
}