<?php
//recupère le fichier config\Conf.php
require_once (File::build_path(["config","Conf.php"]));
//classe Model1
 class Model1{
    //declare variable $pdo 
    public static $pdo;
     
     //initialise la connection a la BDD avec les informations récuperées dans Conf.php
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
     
     //Affiche tout les elements de la table en fonction du controller qui l'appelle
     public static function selectAll(){
        $table_name = static::$object;
        $class_name = 'Model'. $table_name;
        $req = Model1::$pdo->query('SELECT * From '.$table_name);
        $req->setFetchMode(PDO::FETCH_CLASS,$class_name);
        $tab=$req->fetchall();
        return $tab;
     }
     
     //Affiche les details d'un element de la base de données en fonction du controller qui l'apelle et de l'URL. 
     public static function select($primary_value){
        $table_name = static::$object;
        $class_name = 'Model'. $table_name;
        $primary_key = static::$primary;
     
        $sql="SELECT * FROM " . $table_name . " WHERE  ". $primary_key . "=:nom_tag LIMIT 1";
         
        $req_prep=Model1::$pdo->prepare($sql);
        $values = array(
        "nom_tag"=>$primary_value,);
        $req_prep->execute($values);
        
        $req_prep->setFetchMode(PDO::FETCH_CLASS,$class_name);
        $tab=$req_prep->fetchALL();
        
        if(empty($tab)){
            return false;
        }
        return $tab[0];
    }
     
    //Supprime un élément en fonction de la valeur dans l'url et du controller 
    public static function delete($primary_value){
        $table_name = static::$object;
        $class_name = 'Model'. $table_name;
        $primary_key = static::$primary;
        
        $sql="DELETE FROM ".$table_name." WHERE ".$primary_key."= :nom_tag";
        $req_prep=Model1::$pdo->prepare($sql);
        $values = array(
        "nom_tag"=>$primary_value,);
        $req_prep->execute($values);
        
        $req_prep->setFetchMode(PDO::FETCH_CLASS,$class_name);
        $tab=$req_prep->fetchALL();
        $msg="L'élément $primary_value a bien été supprimer";
        return $msg;
    }
    
    //Permet de modifier un element en fonction des information dans le formulaire correspondant
    public static function update($primary_key_value,$data){
        $table_name = static::$object;
        $class_name = 'Model'. $table_name;
        $primary_key = static::$primary;
        
        $sql="UPDATE".$table_name."SET";
        $values = array();
        
        foreach($data as $key => $value){
            $sql.= "".$key." = :".$key.",";
            $values[$key] = $value;
        } 
        $sql = rtrim($sql,',');
        $sql.=" WHERE ".$table_name.".".$primary_key." = :key ";
        
        $values['key'] = $primary_key_value;
        $req_prep = model1::$pdo->prepare($sql);
        $req_prep->execute($values);
        }
     
    //Permet d'insérer un element dans la base de données en fonction des element présent dans le formulaire. 
    public static function save($data){
        $table_name = static::$object;
        $primary_key = static::$primary;
        
        $sql= "INSERT INTO ".$table_name." (";
        $values = array();
        foreach($data as $key => $value){
            $sql.= "".$key.",";
            $values[$key] = $value;
        }
        
        $sql = rtrim($sql,',');
        $sql .=")  VALUES (";
        foreach($data as $key => $values){
            $sql.=":".$key.",";
        }
        $sql = rtrim($sql,',');
        $sql.=")";
        
        $req_prep = Model1::$pdo->prepare($sql);
        $req_prep->execute(array($values));
    }
  
         
 }
model1::Init();

?>