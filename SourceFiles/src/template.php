<?php 


class Template {
    private $layout;
    public function __construct($layout){
       
        $this->layout = $layout;
    }
    public function view($template,$variables){
        
        include VIEW_PATH.'layouts/'.$this->layout.'.html';
    }
}