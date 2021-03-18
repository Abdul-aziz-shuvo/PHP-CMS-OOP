<?php 



class Entity {
    protected $dbc;
    protected $tablename;
    protected $fields;
    public function findBy($fieldName,$fieldValue){
        
        $query = "SELECT * from ".$this->tablename." where ".$fieldName ."=:pretty_url";
        $stmnt = $this->dbc->prepare($query);
        $stmnt->execute(['pretty_url' => $fieldValue]);
        $pageObj = $stmnt->fetch(PDO::FETCH_ASSOC);
        $result = $this->setValue($pageObj);
        return $result;
    }

    public function setValue($value){
       
        foreach($this->fields as $key => $field){
            $this->fields[$key] = $value[$key];
        }
        return $this->fields;

    } 
}