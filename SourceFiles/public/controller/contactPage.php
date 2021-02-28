<?php 

class ContactController extends Controller
{
    public function runBeforeAction(){
        if($_SESSION['has_submitted_form'] ?? 0 == 1){
            include "view/contac/thank-you.html";
            return false;
          }
        return true;
    }

    public function defaultAction(){
       if(!$this->runBeforeAction()){
           return;
       }
        include "view/contact/contact.html";
    }

    public function submitAction(){
        if(!$this->runBeforeAction()){
            return;
        }
        $_SESSION['has_submitted_form'] = 1;
        include "view/contact/thank-you.html";
    }   
}



