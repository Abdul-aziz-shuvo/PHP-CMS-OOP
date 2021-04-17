<?php
session_start();

define('ROOT_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
define('MAIN_PATH',$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'SourceFiles'.DIRECTORY_SEPARATOR);
define('MODULE_PATH',MAIN_PATH.'modules'.DIRECTORY_SEPARATOR);
define('VIEW_PATH',MAIN_PATH.'view'.DIRECTORY_SEPARATOR);


include MAIN_PATH.'src/controller.php';
include MAIN_PATH.'src/template.php';
include MODULE_PATH.'page/models/Page.php';
include MAIN_PATH.'src/DatabaseConnect.php';
include MAIN_PATH.'src/Router.php';



Database::connect('localhost','cms','root','password');
$dbc =  Database::getInstance();
$dbc =  Database::getConnection();



$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ??  'default';
 

if($action == 'submit'){
    
    $section = 'thank-you';
}
$router = new Router($dbc);
$r =  $router->findBy('pretty_url',$section);

//  var_dump($r);
//     die;
if($section == $r['pretty_url']){
    $ControllerName = ucfirst($r['modules']).'Controller';
   
    include MODULE_PATH.$r['modules']."/controllers/".$ControllerName.".php";
    // var_dump(MODULE_PATH.$r['modules']."/controllers/".$ControllerName.".php");
    // die;
    $Controller = new $ControllerName();
    $Controller->setEntity($r['entity_id']);
    $Controller->runAction($action);
}