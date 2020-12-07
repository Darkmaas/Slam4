<?php
//recupere les informations pour se connecter a la BDD 
    class Conf{
        static private $databases = array(
            //ou localhost sur votre machine
            'hostname' => 'localhost',
            // Vous avez une BDD nommee comme votre login
            // Sur votre machine, vous devrez creer une BDD
            'database'=>'slam4_td2',
            // C'est votre login
            // Sur votre machine, vous avez surement un compte 'root'
            'login'=>'root',
            // C'est votre mdp (INE par defaut)
            // Sur votre machine personelle, vous avez creez ce mdp a l'installation
            'password'=>''
        );
        
        //Fonctions qui retournent les information de la BDD 
        static public function getLogin() {
            //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
            return self::$databases['login'];
        }
        
        static public function getHostname(){
            return self::$databases['hostname'];
        }
        
        static public function getDatabase(){
            return self::$databases['database'];
        }
        
        static public function getPassword(){
            return self::$databases['password'];
        }
        
        static private $debug=true;
        
        static public function getDebug(){
            return self::$debug;
        }
    }
?>