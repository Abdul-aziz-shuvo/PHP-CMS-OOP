<?php
 

 include MAIN_PATH.'src/Entity.php';

class Page extends Entity {
    
    
    public function __construct($dbc){
        $this->dbc = $dbc;
        $this->tablename = 'pages';
        $this->fields = [
            'id' => '',
            'title' => '',
            'content' => ''
        ];
    }

}