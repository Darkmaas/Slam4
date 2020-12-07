<?php
//récupère les informations model\Model.php
require_once (File::build_path(["model","Model.php"]));

//classe ModelTrajet 
//Les commentaires sont identique a ce de la classe modelVoiture. 
class ModelTrajet extends Model1{
    private $id;
    private $depart;
    private $arrive;
    private $dated;
    private $nbplaces;
    private $prix;
    private $conducteur_login;
    
    protected static $object ="trajet";
    protected static $primary="id";
    
    public function getId(){
        return $this->id;
    }
    
    public function getDepart(){
        return $this->depart;
    }

    public function getArrive(){
        return $this->arrive;
    }
    
    public function getDated(){
        return $this->dated;
    }
    
    public function getNbplaces(){
        return $this->nbplaces;
    }
    
    public function getPrix(){
        return $this->prix;
    }
    
    public function getConducteur(){
        return $this->conducteur_login;
    }
    
    public function setId($id2){
        $this->id = $id2;
    }
    
    public function setDepart ($depart2){
        $this->depart = $depart2;
    }
    
    public function setArrive($arrive2){
        $this->arrive = $arrive2;
    }
    
    public function setDated($dated2){
        $this->dated = $dated2;
    }
    
    public function setNbplaces($Nbplaces2){
        $this->nbplaces = $Nbplaces2;
    }
    
    public function setPrix($prix2){
        $this->prix = $prix2;
    }
    
    public function setConducteur($conducteur2){
        $this->conducteur_login = $conducteur2;
    }
    
    // un constructeur
    public function __construct($id=NULL,$d=NULL,$a=NULL,$dat=NULL,$n=NULL,$p=NULL,$c=NULL){
        if (!is_null($id) && !is_null($d) && !is_null($a) && !is_null($dat) && !is_null($n) && !is_null($p) && !is_null($c)) {
        $this->id= $id;
        $this->depart= $d;
        $this->arrive= $a;
        $this->dated= $dat;
        $this->nbplaces= $n;
        $this->prix= $p;
        $this->conducteur_login= $c;
        }
    }
    
    //affichage toute les Utilisateurs
    static function getAllTrajets(){
        $req = Model1::$pdo->query('SELECT * From trajet');
        $req->setFetchMode(PDO::FETCH_CLASS,"ModelTrajet");
        $tab_trajets=$req->fetchall();
        return $tab_trajets;
    }
    
    public function afficher(){
        echo "<p> L'id ".$this->id." depart ".$this->depart." et arrive ".$this->arrive." le ".$this->dated.". Le nombres de place disponibles est de ".$this->nbplaces.". Au prix de " .$this->prix." euros. Le conducteur est ".$this->conducteur_login."</p>";
    }
    
    public static function save($data){
        $sql="INSERT INTO trajet(id,depart,arrive,dated,nbplaces,prix,conducteur_login) VALUES (:id,:depart,:arrive,:dated,:nbplaces,:prix,:conducteur_login)";
        $req_prep = model1::$pdo->prepare($sql);
        $id = $data['id'];
        $values = array("id"=>$data['id'],
                        "depart"=>$data['depart'],
                        "arrive"=>$data['arrive'],
                        "dated"=>$data['dated'],
                        "nbplaces"=>$data['nbplaces'],
                        "prix"=>$data['prix'],
                     "conducteur_login"=>$data['conducteur_login']);
        $req_prep->execute($values);
        $msg= "Le trajet , $id , a été créer";
        return $msg;
    }
    
    public static function update($data){
        $sql="UPDATE trajet SET id= :id, depart = :depart, arrive= :arrive, dated = :dated, nbplaces = :nbplaces, prix = :prix,
        conducteur_login = :conducteur_login WHERE id = :id ";
        $req_prep = model1::$pdo->prepare($sql);
        $values = array("id"=>$data['id'],
                        "depart"=>$data['depart'],
                        "arrive"=>$data['arrive'],
                        "dated"=>$data['dated'],
                        "nbplaces"=>$data['nbplaces'],
                        "prix"=>$data['prix'],
                        "conducteur_login"=>$data['conducteur_login']);
        $id = $data['id'];
        $req_prep->execute($values);
        $msg="Le trajet , $id, a été modifiée";
        return $msg;
    }
    
}
?>