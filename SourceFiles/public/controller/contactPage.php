<?php 

class ContactController extends Controller{
    public function defaultAction(){
        include "view/contact.html";
    }

    public function submitAction(){
        include "view/thank-you.html";
    }

    
}



