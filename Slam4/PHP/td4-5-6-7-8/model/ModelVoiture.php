<?php
//récupère les informations model\Model.php
require_once (File::build_path(["model","Model.php"]));
//classe ModelVoiture
class ModelVoiture extends Model1{
    //Declare les variables marque,couleur et immatriculation
    private $marque;
    private $couleur;
    private $Immatriculation;
    
    protected static $object="voiture";
    protected static $primary="Immatriculation";
    
    // un getter      
    public function getMarque(){
        return $this->marque;
    }
    // un setter 
    public function setMarque($marque2){
        $this->marque = $marque2;
    }
    // un constructeur
    public function __construct($m=NULL,$c=NULL,$i=NULL){
        if (!is_null($m) && !is_null($c) && !is_null($i)) {
        $this->marque= $m;
        $this->couleur= $c;
        $this->immatriculation= $i;
        }
    }
    
    // une methode d'affichage.
    public function afficher(){
        echo "<p> Voiture ".$this->Immatriculation." de marque ".$this->marque." (couleur ".$this->couleur.")</p>";
    }
    //affichage toute les voitures
    static function getAllVoitures(){
        $req = Model1::$pdo->query('SELECT * From voiture');
        $req->setFetchMode(PDO::FETCH_CLASS,"ModelVoiture");
        $tab_voit=$req->fetchall();
        return $tab_voit;
    }
    //affiche les informations d'une voiture en fonction de l'immatricualtion selectionnée
    public static function getVoitureByImmat($immat){
        $sql="SELECT * FROM voiture WHERE immatriculation=:nom_tag";
        $req_prep=Model1::$pdo->prepare($sql);
        $values = array(
        "nom_tag"=>$immat,);
        $req_prep->execute($values);
        
        $req_prep->setFetchMode(PDO::FETCH_CLASS,'ModelVoiture');
        $tab_voit=$req_prep->fetchALL();
        
        if(empty($tab_voit)){
            return false;
        }
        return $tab_voit[0];
    }
    
    //getter couleur
    public function getCouleur(){
        return $this->couleur;
    }
    
    //setter couleur
    public function setCouleur($couleur2){
        $this->couleur= $couleur2;
    }
    
    //getter immatriculation
    public function getImmatriculation(){
        return $this->Immatriculation;
    }
    
    //setter immatriculation
    public function setImmatriculation($immatriculation2){
        if (strlen($immatriculation2)>8){
            echo "l'immatriculation entrée est trop grande !";
        }
        else {
            $this->Immatriculation= $immatriculation2;
        }
    }
    
    //Insert dans la base de données une voiture en fonction des informations dans les variables couleur immatriculation et marque 
    
    
    public static function save($data){
        $sql="INSERT INTO voiture(immatriculation,marque,couleur) VALUES (:immat,:marque,:couleur)";
        $req_prep = model1::$pdo->prepare($sql);
        $immat = $data['immatriculation'];
        $values = array("immat"=>$data['immatriculation'],"marque"=>$data['marque'],"couleur"=>$data['couleur']);
        $req_prep->execute($values);
        $msg= "La voiture , $immat , a été créer";
        return $msg;
    }
    
    
    //Supprime la voiture selectionnée par l'immatriculation 
    public static function deleteByImmat($immat){
        $sql="DELETE FROM voiture WHERE immatriculation= :nom_tag";
        $req_prep=Model1::$pdo->prepare($sql);
        $values = array(
        "nom_tag"=>$immat,);
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS,'ModelVoiture');
        $tab_voit=$req_prep->fetchALL();
        $msg="La voiture , $immat , a été supprimée";
        return $msg;
    }
    
    //modifie la voiture en fonction du formulaire. 
    
    public static function update($data){
        $sql="UPDATE voiture SET immatriculation= :immat, marque = :marque, couleur= :couleur WHERE immatriculation = :immat ";
        $req_prep = model1::$pdo->prepare($sql);
        $values = array("immat"=>$data['immatriculation'],"marque"=>$data['marque'],"couleur"=>$data['couleur']);
        $immat = $data['immatriculation'];
        $req_prep->execute($values);
        $msg="La voiture , $immat, a été modifiée";
        return $msg;
    }
    
}
?>