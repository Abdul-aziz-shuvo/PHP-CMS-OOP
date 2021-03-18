<?php
session_start();

define('ROOT_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);
define('VIEW_PATH',ROOT_PATH.'view'.DIRECTORY_SEPARATOR);


include ROOT_PATH.'src/controller.php';
include ROOT_PATH.'src/template.php';
include ROOT_PATH.'model/Page.php';
include ROOT_PATH.'src/DatabaseConnect.php';
include ROOT_PATH.'src/Router.php';



Database::connect('localhost','cms','user','password');
$dbc =  Database::getInstance();
$dbc =  Database::getConnection();



$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ??  'default';
 
$router = new Router($dbc);
$r =  $router->findBy('pretty_url',$section);


if($section == $r['pretty_url']){
    $ControlerName = ucfirst($r['modules']).'Controller';

    include ROOT_PATH."controller/".$r['modules']."Controller.php";
    $Controller = new $ControlerName();
    $Controller->setEntity($r['entity_id']);
    $Controller->runAction($action);
}