<?php 


class HomeController extends Controller{
    
    public function defaultAction(){
    
        $template = new Template('default');

        $dbc = Database::getConnection();
        $page = new Page($dbc);

        $pageObj =  $page->findById(1);
        $variables = $pageObj;
        

        $template->view('static-page',$variables);
        
    }

   
}