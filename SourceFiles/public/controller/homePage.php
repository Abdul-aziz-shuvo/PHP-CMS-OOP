<?php 


class HomeController extends Controller{
    public function defaultAction(){

        $variables = [
            'title' => 'Home Page',
            'details' => 'This is home page'
        ];
        $template = new Template('default');
        $template->view('static-page',$variables);
        
    }

   
}