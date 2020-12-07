<?php
require_once (File::build_path(["model","ModelUtilisateur.php"])); // chargement du modèle
class ControllerUtilisateur{
    

    public static function readAll(){
        $tab_u = ModelUtilisateur::selectAll();
        $controller = 'utilisateur';
        $view='list';
        $pagetitle = 'Liste des utilisateurs';
        require(File::build_path(["view","view.php"])); //redirige vers la vue
    }
    //-> renvoi la liste des utilisateurs
    
    public static function read(){
        $login = htmlspecialchars($_GET["login"]);
        $v = ModelUtilisateur::select($login);
        $controller = 'utilisateur';
        $view = 'detail';
        $pagetitle = "Information sur l'utilisateur";
        require (File::build_path(["view","view.php"]));
    }
    //-> Selectionne un utilisateur en fonction du login dans l'URL

    public static function delete(){
        $login = htmlspecialchars($_GET["login"]);
        $vsupp = ModelUtilisateur::delete($login);
        $tab_v = Modelutilisateur::selectAll();
        $controller = 'utilisateur';
        $view = 'delete';
        $pagetitle='Suppression utilisateur';
        require (File::build_path(["view","view.php"]));
    }
    //-> premet de supprimer un utilisateur en fonction du login dans l'url

    public static function create(){
        $u = new ModelUtilisateur(null,null,null);
        $controller = 'utilisateur';
        $view = 'update';
        $pagetitle = "Création de l'utilisateur";
        require (File::build_path(["view","view.php"]));
    }
    //-> renvoi sur la view permettant par la suite de créer un utilisateur

    public static function created(){
        $login = $_POST['login'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $values = array(
            "login" => $login,
            "nom" => $nom,
            "prenom" => $prenom,);
        $umod = ModelUtilisateur::save($values);
        $tab_u = ModelUtilisateur::selectall();
        $controller = 'utilisateur';
        $view = 'updated';
        $pagetitle = "création de l'utilisateur !";
        require (File::build_path(["view","view.php"]));
    }
    //-> récupère les informations du formulaire pour ensuite appeler la fonction pour insérer un nouveau utilisateur dans la base de données

    public static function update(){
        $login = htmlspecialchars($_GET["login"]);
        $controller = 'utilisateur';
        $view = 'update';
        $pagetitle = 'modification utilisateur';
        $u = ModelUtilisateur::select($login);
        require (File::build_path(["view","view.php"]));
    }
    //-> renvoi sur la view permettant par la suite de modifier un utilisateur

    public static function updated(){
        $login = $_POST['login'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $values = array(
            "login" => $login,
            "nom" => $nom,
            "prenom" => $prenom);
        $umod = ModelUtilisateur::update($values);
        $tab_u = ModelUtilisateur::selectall();
        $controller ='utilisateur';
        $view = 'updated';
        $pagetitle='modification utilisateur';
        require(File::build_path(["view","view.php"]));
    }
    //-> récupère les informations du formulaire pour ensuite appeler la fonction pour modifier l'utilisateur selectionner dans la base de données 
}   