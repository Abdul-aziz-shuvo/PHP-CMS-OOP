<?php 


final class Database {
   private static $instance = null;
   private static $connection;
   public function getInstance(){
       if(is_null(self::$instance)){
           self::$instance = new Database();
       }
      return self::$instance;
   }
   public static function connect($host,$db,$user,$password){

        try{
            self::$connection  =  new PDO("mysql:host=$host;dbname=$db", $user, $password);
        }catch(PDOExecption $e){
            echo 'connection failed' .$e->getMessage();
            die;
        }
        
   }

   public static function getConnection(){
       return self::$connection;
   }

   private function  __construct(){}
   private function __clone(){}
   private function __wakeup(){}



}
