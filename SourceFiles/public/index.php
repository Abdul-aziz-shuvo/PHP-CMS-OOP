<?php

include 'src/controller.php';

$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ??  'default';

if($section == 'about-us'){
    include "controller/aboutPage.php";
    $aboutController = new AboutController();
    $aboutController->runAction($action);
}else if($section == 'contact-us'){
    include "controller/contactPage.php";
    $contactController = new ContactController();
    $contactController->runAction($action);
}else{
    include "controller/homePage.php";
}