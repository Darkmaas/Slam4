<?php
require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td2\model.php';
class voiture{
    private $marque;
    private $couleur;
    private $immatriculation;
    
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
        echo "<p> voiture ".$this->Immatriculation." de marque ".$this->marque." (couleur ".$this->couleur.")</p>";
    }
    //affichage toutes les voitures
    static function getAllVoitures(){
        $req = Model::$pdo->query('SELECT * From voiture');
        $req->setFetchMode(PDO::FETCH_CLASS,"voiture");
        $tab_voit=$req->fetchall();
        return $tab_voit;
    }
    //affiche une voiture en fonction de l'immatriculation selectionnée
    public static function getVoitureByImmat($immat){
        $sql="SELECT * FROM voiture WHERE immatriculation=:nom_tag";
        $req_prep=Model::$pdo->prepare($sql);
        $values = array(
        "nom_tag"=>$immat,);
        $req_prep->execute($values);
        
        $req_prep->setFetchMode(PDO::FETCH_CLASS,'voiture');
        $tab_voit=$req_prep->fetchALL();
        
        if(empty($tab_voit))
            return false;
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
        return $this->immatriculation;
    }
    
    //setter immatriculation
    public function setImmatriculation($immatriculation2){
        if (strlen($immatriculation2)>8){
            echo "l'immatriculation entrée est trop grande !";
        }
        else {
            $this->couleur= $immatriculation2;
        }
    } 
}
?>