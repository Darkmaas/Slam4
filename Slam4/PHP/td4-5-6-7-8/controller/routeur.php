<?php
//recupère le fichier lib\File.php
require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td4\lib\File.php';
//récupère le fichier ControllerVoiture.php
require_once (File::build_path(["controller","ControllerVoiture.php"]));

require_once (File::build_path(["controller","ControllerUtilisateur.php"]));

require_once (File::build_path(["controller","ControllerTrajet.php"]));

$controller = 'voiture';
// verifie la preference d'un cookie , si il y en a un, attribu sa valeur au controller. 
if(isset($_COOKIE['preference'])){
    $controller = $_COOKIE['preference'];
}

if(isset($_GET["controller"])){
    $controller = htmlspecialchars($_GET["controller"]);
}
else{
    $controller = 'voiture';
}

$controller_class='Controller'.ucfirst($controller);

//en fonction de l'action selectionnée, appel la fonction correspondante dans le ControllerVoiture. 
if (isset($_GET["action"])){
    $class_methods = get_class_methods(new $controller_class); 
    $action=htmlspecialchars($_GET["action"]);
    if (class_exists($controller_class)){
        if (in_array($action, $class_methods)){
            $controller_class::$action(); // Appel de la méthode statique $action de ControllerVoiture
        }
        //Si l'action correspond à aucune fonction , renvoie sur la vue Erreur. 
        else{
            $controller = 'voiture';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(["view","view.php"]));
        }
    }
    else{
        $controller = 'voiture';
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(["view","view.php"])); 
    }
}
//si aucune action n'est selectionné, envoie sur la page action=$readall
else {
    $action='readall';
    $controller_class::$action();
}
?>
