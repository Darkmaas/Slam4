<?php
require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td2\model.php';

    class utilisateur{
        private $login;
        private $nom;
        private $prenom;
        
        //constructeur 
        public function __construct($l=NULL,$n=NULL,$p=NULL){
            if (!is_null($l) && !is_null($n) && !is_null($p)) {
            $this->login = $l;
            $this->nom = $n;
            $this->prenom = $p;
            }
        }
        
        //getter
        public function getLogin(){
            return $this->login;
        }
        
        public function gteNom(){
            return $this->nom;
        }
        
        public function getPrenom(){
            return $this->prenom;
        }
        
        //setter
        public function setLogin($login2){
            $this->login = $login2;
        }
        
        public function setNom($nom2){
            $this->nom = $nom2;
        }
        
        public function setPrenom($prenom2){
            $this->prenom = $prenom2;
        }
        
        //affichage 
        public function afficher(){
            echo "<p> login: ".$this->login." nom: ".$this->nom. " prenom: ".$this->prenom."</p>";
        }
        
        static function getAllUtilisateur(){
            $req = Model::$pdo->query('SELECT * From utilisateur');
            $req->setFetchMode(PDO::FETCH_CLASS,"utilisateur");
            $tab_utilisateur=$req->fetchall();
            return $tab_utilisateur;
        }
    }