<?php
require_once (File::build_path(["model","ModelTrajet.php"])); // chargement du modèle

//classe controller de trajet
class ControllerTrajet{
    
//Les differentes action de la classe trajet: 
    
    public static function readAll(){
        $tab_t = ModelTrajet::selectAll();
        $controller = 'trajet';
        $view='list';
        $pagetitle = 'Liste des trajet';
        require(File::build_path(["view","view.php"])); 
    }
    //-> renvoi la liste des trajets

    public static function read(){
        $id = htmlspecialchars($_GET["id"]);
        $v = ModelTrajet::select($id);
        $controller = 'trajet';
        $view = 'detail';
        $pagetitle = "Information sur le trajet";
        require (File::build_path(["view","view.php"]));
    }
    //-> Selectionne un trajet en fonction de L'id dans l'URL

    public static function delete(){
        $id = htmlspecialchars($_GET["id"]);
        $vsupp = ModelTrajet::delete($id);
        $tab_v = modelTrajet::selectAll();
        $controller = 'trajet';
        $view = 'delete';
        $pagetitle='Suppression trajet';
        require (File::build_path(["view","view.php"]));
    }
    //-> premet de supprimer un trajet en fonction de l'id dans l'url  

    public static function create(){
        $u = new ModelTrajet(null,null,null,null,null,null,null);
        $controller = 'trajet';
        $view = 'update';
        $pagetitle = "Création du trajet";
        require (File::build_path(["view","view.php"]));
    }
    //-> renvoi sur la view permettant par la suite de créer un trajet
    
    public static function created(){
        $id = $_POST['id'];
        $depart = $_POST['depart'];
        $arrive = $_POST['arrive'];
        $dated = $_POST['dated'];
        $nbplaces = $_POST['nbplaces'];
        $prix = $_POST['prix'];
        $conducteur_login = $_POST['conducteur_login'];

        $values = array(
            "id" => $id,
            "depart" => $depart,
            "arrive" => $arrive,
            "dated" => $dated,
            "nbplaces" => $nbplaces,
            "prix" => $prix,
            "conducteur_login" => $conducteur_login);
        
        $umod = ModelTrajet::save($values);
        $tab_u = ModelTrajet::selectall();
        $controller = 'trajet';
        $view = 'updated';
        $pagetitle = "création du trajet !";
        require (File::build_path(["view","view.php"]));
    }
    //-> récupère les informations du formulaire pour ensuite appeler la fonction pour insérer un nouveau trajet dans la base de données 
    
    public static function update(){
        $id = htmlspecialchars($_GET["id"]);
        $controller = 'trajet';
        $view = 'update';
        $pagetitle = 'modification trajet';
        $u = ModelTrajet::select($id);
        require (File::build_path(["view","view.php"]));
    }
    //-> Renvoi sur la view permettant par la suite de modifier un trajet 
    
    public static function updated(){
        $id = $_POST['id'];
        $depart = $_POST['depart'];
        $arrive = $_POST['arrive'];
        $dated = $_POST['dated'];
        $nbplaces = $_POST['nbplaces'];
        $prix = $_POST['prix'];
        $conducteur_login = $_POST['conducteur_login'];

        $values = array(
            "id" => $id,
            "depart" => $depart,
            "arrive" => $arrive,
            "dated" => $dated,
            "nbplaces" => $nbplaces,
            "prix" => $prix,
            "conducteur_login" => $conducteur_login);
        
        $umod = ModelTrajet::update($values);
        $tab_u = ModelTrajet::selectall();
        $controller ='trajet';
        $view = 'updated';
        $pagetitle='modification utilisateur';
        require(File::build_path(["view","view.php"]));
    }
    //-> //-> récupère les informations du formulaire pour ensuite appeler la fonction pour modifier le trajet selectionner dans la base de données 
}