<?php
session_start();

define('ROOT_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);
define('VIEW_PATH',ROOT_PATH.'view'.DIRECTORY_SEPARATOR);


include ROOT_PATH.'src/controller.php';
include ROOT_PATH.'src/template.php';
include ROOT_PATH.'model/Page.php';
include ROOT_PATH.'src/DatabaseConnect.php';

var_dump($_GET);
Database::connect('localhost','cms','root','');

$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ??  'default';
 


if($section == 'about-us'){
    include ROOT_PATH."controller/aboutPage.php";
    $aboutController = new AboutController();
    $aboutController->runAction($action);
}else if($section == 'contact-us'){
    include ROOT_PATH."controller/contactPage.php";
    $contactController = new ContactController();
    $contactController->runAction($action);
}else{
    include ROOT_PATH."controller/homePage.php";
    $homeController = new HomeController();
    $homeController->runAction($action);
}