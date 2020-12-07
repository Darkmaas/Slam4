<?php
require_once (File::build_path(["model","ModelVoiture.php"])); // chargement du modèle
class ControllerVoiture{

    //Affiche la liste des voitures présents dans la BDD
    public static function readAll(){
        $tab_v = ModelVoiture::selectAll();
        $controller = 'voiture';
        $view='list';
        $pagetitle = 'Liste des voitures';
        require(File::build_path(["view","view.php"])); //redirige vers la vue
    }

    //Affiche les information de la voiture selectionnée en fonction de sont immatriculation
    public static function read(){
        $immat = htmlspecialchars($_GET["immat"]);
        $v = ModelVoiture::select($immat);
        $controller = 'voiture';
        $view = 'detail';
        $pagetitle = 'Information sur la voiture';
        require (File::build_path(["view","view.php"]));
    }
    
    //Amene sur la vue pour créer une voiture
    public static function create(){
        $v = new ModelVoiture(null,null,null);
        $controller = 'voiture';
        $view = 'update';
        $pagetitle = 'Création de la voiture';
        require (File::build_path(["view","view.php"]));
    }

    //recupère les informations du formulaire, créer l'objet voiture correspondant, l'insere dans la BDD et affiche les informations de chaque voiture dans la BBD 
    public static function created(){
        $immat = $_POST['immat'];
        $marque = $_POST['marque'];
        $couleur = $_POST['couleur'];
        $values = array(
            "immatriculation" => $immat,
            "marque" => $marque,
            "couleur" => $couleur);
        $vmod = ModelVoiture::save($values);
        $tab_v = ModelVoiture::getAllVoitures();
            $controller = 'voiture';
            $view = 'updated';
            $pagetitle = 'création de la voiture !';
            require (File::build_path(["view","view.php"]));
    } 
    

    //Supprime une voiture de la BDD en fonction de l'immatriculation selectionnées
    public static function delete(){
        $immat = htmlspecialchars($_GET["immat"]);
        $vsupp = ModelVoiture::delete($immat);
        $tab_v = ModelVoiture::selectAll();
        $controller = 'voiture';
        $view = 'delete';
        $pagetitle='Supression voiture';
        require (File::build_path(["view","view.php"]));
    }

    //Modifie les informations d'une voiture en fonction de l'immatriculation selectionnées et des valeur entrée par l'utilisateur 
    public static function update(){
        $immat = htmlspecialchars($_GET["immat"]);
        $controller = 'voiture';
        $view = 'update';
        $pagetitle = 'modification voiture';
        $v = ModelVoiture::getVoitureByImmat($immat);
        require (File::build_path(["view","view.php"]));
    }

    public static function updated(){
        $immat = $_POST['immat'];
        $marque = $_POST['marque'];
        $couleur = $_POST['couleur'];
        $values = array(
            "immatriculation" => $immat,
            "marque" => $marque,
            "couleur" => $couleur);
    
        $vmod = ModelVoiture::update($values);
        $tab_v = ModelVoiture::getAllVoitures();
        $controller ='voiture';
        $view = 'updated';
        $pagetitle='modification voiture';
        require(File::build_path(["view","view.php"]));
    }
    //-> récupère les informations du formulaire pour ensuite appeler la fonction pour modifier la voiture selectionner dans la base de données 
}
?>
