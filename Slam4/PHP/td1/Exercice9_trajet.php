<?php
require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td2\model.php';

    class trajet{
        private $id;
        private $depart;
        private $arrive;
        private $dated;
        private $nbplaces;
        private $prix;
        private $conducteur_login;
        
        //constructeur 
        public function __construct($id=NULL,$dep=NULL,$arr=NULL,$d=NULL,$nbp=NULL,$p=NULL,$cond_log=NULL){
            
            if(!is_null($id) && !is_null($dep) && !is_null($arr) && !is_null($d) && !is_null($nbp) && !is_null($p) && !is_null($cond_log)){
            $this->id = $id;
            $this->depart = $dep;
            $this->arrive = $arr;
            $this->dated = $d;
            $this->nbplaces = $nbp;
            $this->prix = $p;
            $this->conducteur_login = $cond_log;
            }
        }
        
        //getter
        public function getId(){
            return $this->id;
        }
        
        public function getDepart(){
            return $this->depart;
        }
        
        public function getArrive(){
            return $this->arrive;
        }
        
        public function getDate(){
            return $this->datee;
        }
        
        public function getNbplace(){
            return $this->nbplace;
        }
        
        public function getPrix(){
            return $this->prix;
        }
        
        public function getConducteur_login(){
            return $this->conducteur_login;
        }
        
        //setter
        public function setId($id2){
            $this->id = $id2;
        }
        
        public function setDepart($depart2){
            $this->depart = $depart2;
        }
        
        public function setArrive($arrive2){
            $this->arrive = $arrive2;
        }
        
        public function setDate($date2){
            $this->dated = $date2;
        }
        
        public function setNbplace($nbplace2){
            $this->nbplaces = $nbplace2;
        }
        
        public function setPrix($prix2){
            $this->prix = $prix2;
        }
        
        public function setConducteur_login($conducteur_login2){
            $this->conducteur_login = $conducteur_login2;
        }
        
        //affichage 
        public function afficher(){
            echo "<p> id: ".$this->id." depart: ".$this->depart. " arrive: ".$this->arrive." date: ".$this->dated. " nbplace: ".$this->nbplaces." prix: ".$this->prix. " conducteur_login: ".$this->conducteur_login."</p>";
        }
        
        static function getAllTrajets(){
        $req = Model::$pdo->query('SELECT * From trajet');
        $req->setFetchMode(PDO::FETCH_CLASS,"trajet");
        $tab_trajet=$req->fetchall();
        return $tab_trajet;
        }
        
        public static function findPassagers($id){
            $sql=('SELECT utilisateur.* 
                FROM utilisateur,trajet,passager
                WHERE passager.utilisateur_id=utilisateur.login
                and trajet.id=passager.trajet_id
                and trajet.id=:id_tag');
            $req_prep=Model::$pdo->prepare($sql);
            $values = array("id_tag"=>$id,);
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS,'utilisateur');
            $tab_uti=$req_prep->fetchALL();
            return $tab_uti;
        }
    
    }
    