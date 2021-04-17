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

            $dbc = Database::getConnection();
            $page = new Page($dbc);
    
            $pageObj =  $page->findBy('id',5);
            $variables = $pageObj;
            
            $template->view('static-page',$variables);
            return false;
          }
        return true;
    }

    public function defaultAction(){
       
        $template = new Template('default');

        $dbc = Database::getConnection();
        $page = new Page($dbc);

        $pageObj =  $page->findBy('id',$this->entity_id);
        $variables = $pageObj;
        

        
        $template->view('contact/views/contact',$variables);
        // include "view/contact/contact.html";
    }

    public function submitAction(){
       
        $_SESSION['has_submitted_form'] = 1;

        // $variables = [
        //     'title' => 'Thanks for contact us',
        //     'details' => 'we will back too you soon'
        // ];
        $template = new Template('default');

        $dbc = Database::getConnection();
        $page = new Page($dbc);
      
        $pageObj =  $page->findBy('id',$this->entity_id);
        $variables = $pageObj;

        $template->view('static-page',$variables);

        // include VIEW_PATH."contact/thank-you.html";
    }   
}



