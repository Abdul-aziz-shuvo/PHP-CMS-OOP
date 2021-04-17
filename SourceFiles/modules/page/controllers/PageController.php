<?php 


require_once(MODULE_PATH.'/page/models/Page.php');

class PageController extends Controller{
    public function defaultAction(){
        $template = new Template('default');
        $dbc = Database::getInstance();
        $dbc = Database::getConnection();
        $page = new Page($dbc);
        $pageObj =  $page->findBy('id',$this->entity_id);
        $variables = $pageObj;
        $template->view('page/views/static-page',$variables);
        
    }

   
}