<?php 

class AboutController extends Controller{
    public function defaultAction(){

       
        $template = new Template('default');
        
        $dbc =  Database::getInstance();
        $dbc =  Database::getConnection();
        $page = new Page($dbc);

        $pageObj =  $page->findBy('id',$this->entity_id);
        $variables = $pageObj;

        $template->view('static-page',$variables);
        
    }

   
}
