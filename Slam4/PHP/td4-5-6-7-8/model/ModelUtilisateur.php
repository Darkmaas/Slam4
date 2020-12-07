<?php
//récupère les informations model\Model.php
require_once (File::build_path(["model","Model.php"]));

//classe ModelVoiture
class Modelutilisateur extends Model1{
    private $login;
    private $nom;
    private $prenom;
    
    protected static $object ="Utilisateur";
    protected static $primary="login";
    
    public function getLogin(){
        return $this->login;
    }
    
    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }
    
    
    public function setLogin($login2){
        $this->login = $login2;
    }
    
    public function setNom ($nom2){
        $this->nom = $nom2;
    }
    
    public function setPrenom($prenom2){
        $this->prenom = $prenom2;
    }
    
    // un constructeur
    public function __construct($l=NULL,$n=NULL,$p=NULL){
        if (!is_null($l) && !is_null($n) && !is_null($p)) {
        $this->login= $l;
        $this->nom= $n;
        $this->prenom= $p;
        }
    }
    
    //affichage toute les Utilisateurs
    static function getAllUtilisateurs(){
        $req = Model1::$pdo->query('SELECT * From utilisateur');
        $req->setFetchMode(PDO::FETCH_CLASS,"ModelUtilisateur");
        $tab_utilisateur=$req->fetchall();
        return $tab_utilisateur;
    }
    
    public function afficher(){
        echo "<p> Login ".$this->login." de nom ".$this->nom." est de prenom ".$this->prenom."</p>";
    }
    
    public static function save($data){
        $sql="INSERT INTO utilisateur(login,nom,prenom) VALUES (:login,:nom,:prenom)";
        $req_prep = model1::$pdo->prepare($sql);
        $login = $data['login'];
        $values = array("login"=>$data['login'],"nom"=>$data['nom'],"prenom"=>$data['prenom']);
        $req_prep->execute($values);
        $msg= "L'utilisateur , $login , a été créer";
        return $msg;
    }
    
    public static function update($data){
        $sql="UPDATE utilisateur SET login= :login, nom = :nom, prenom= :prenom WHERE login = :login ";
        $req_prep = model1::$pdo->prepare($sql);
        $values = array("login"=>$data['login'],"nom"=>$data['nom'],"prenom"=>$data['prenom']);
        $login = $data['login'];
        $req_prep->execute($values);
        $msg="L'utilisateur , $login, a été modifiée";
        return $msg;
    }
    
}