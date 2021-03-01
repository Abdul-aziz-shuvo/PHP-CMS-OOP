<?php 

class AboutController extends Controller{
    public function defaultAction(){

        $variables = [
            'title' => 'About us Page',
            'details' => 'This is about us page'
        ];
        $template = new Template('default');
        $template->view('static-page',$variables);
        
    }

   
}
