<?php
session_start();

define('ROOT_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);
define('VIEW_PATH',ROOT_PATH.'view'.DIRECTORY_SEPARATOR);


include ROOT_PATH.'src/controller.php';
include ROOT_PATH.'src/template.php';
include ROOT_PATH.'model/Page.php';
include ROOT_PATH.'src/DatabaseConnect.php';
include ROOT_PATH.'src/Router.php';







Database::connect('localhost','cms','root','');
$dbc =  Database::getInstance();
$dbc =  Database::getConnection();



$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ??  'default';
 
$router = new Router($dbc);
$router->findBy('pretty_url','about_us');
var_dump($router);



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