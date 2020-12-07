<?php
require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td3\Conf.php';
 class model1{
    public static $pdo;
     
     public static function Init(){
         $hostname= Conf::getHostname();
         $database_name= Conf::getDatabase();
         $login= Conf::getLogin();
         $password= Conf::getPassword();
         try{
             self::$pdo =new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
         } catch(PDOExecption $e){
             if(Conf::getDebug()){
                 echo $e->getMessage();
             } else   
             {
                 echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
             }
             die();
         }
     }
 }
model1::Init();

?>