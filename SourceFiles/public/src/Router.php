<?php 

include ROOT_PATH.'src/Entity.php';

class Router extends Entity {
    
    
    public function __construct($dbc){
        $this->dbc = $dbc;
        $this->tablename = 'routes';
        $this->fields = [
            'id',
            'modules',
            'action',
            'entity_id',
            'pretty_url'
        ];
    }

     
}