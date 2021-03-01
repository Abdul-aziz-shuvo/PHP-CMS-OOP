<?php 

class ContactController extends Controller
{
    public function runBeforeAction(){
        if($_SESSION['has_submitted_form'] ?? 0 == 1){
            $variables = [
                'title' => 'you already contacted us',
                'details' => 'we will back too you soon'
            ];
            $template = new Template('default');
            $template->view('static-page',$variables);
            return false;
          }
        return true;
    }

    public function defaultAction(){
        $variables = [
            'title' => 'Home Page',
            'details' => 'This is home page'
        ];
        $template = new Template('default');
        $template->view('/contact/contact',$variables);
        // include "view/contact/contact.html";
    }

    public function submitAction(){
        
        $_SESSION['has_submitted_form'] = 1;

        $variables = [
            'title' => 'Thanks for contact us',
            'details' => 'we will back too you soon'
        ];
        $template = new Template('default');
        $template->view('static-page',$variables);

        // include VIEW_PATH."contact/thank-you.html";
    }   
}



