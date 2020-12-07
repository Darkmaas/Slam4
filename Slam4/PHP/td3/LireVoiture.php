<?php
    require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td3\Model.php';//on inclu la connexion a la BDD
    require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td3\Voiture.php';//On inclue la class voiture 
    require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td1\Exercice9_trajet.php';
    require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td1\Exercice9_utilisateur.php';

    $rep = model1::$pdo->query('SELECT * From voiture');//on excetute la requete SQL
    $tab_obj = $rep->fetchAll(PDO::FETCH_OBJ); //on incrémente la requete dans un tableau d'objet


    echo "<ul>";
    foreach($tab_obj as $key){//On affiche le contenu de la requete
    echo "<li><p> Voiture $key->Immatriculation de marque $key->marque et de couleur $key->couleur</p></li>";
    }
    echo "<ul>";

//Affiche avec la méthode afficher 
    
    echo"<h1>Methode afficher</h1>";
    $req = model1::$pdo->query('SELECT * From voiture');
    $req->setFetchMode(PDO::FETCH_CLASS,"voiture");
    $tab_voit=$req->fetchall();
    
    foreach($tab_voit as $u){
        $u->afficher();
    }

//Affichage avec la méthode getAllVoitures
    echo "<h1>Methode getAllVoitures</h1>";
    $tab=voiture::getAllVoitures();
    foreach($tab as $v){
        $v->afficher();
    }

    echo "<h1>Methode getAllTrajets</h1>";
    $tab=trajet::getAllTrajets();
    foreach($tab as $v){
        $v->afficher();
    }

    echo "<h1>Methode getAllutilisateur</h1>";
    $tab=utilisateur::getAllUtilisateur();
    foreach($tab as $v){
        $v->afficher();
    }

    echo "<h1>Methode getVoitureByImmat</h1>";
    $tab=voiture::getVoitureByImmat('256AB36');
    $tab->afficher();

    echo"<h1> Methode save</h1>";
    $voit1 = new voiture("Renault","Verte","296BV15");
    $voit1->save();

    echo"<h1> Fonction find passager</h1>";
    $find_passager=trajet::findPassagers(1);
    foreach($find_passager as $b){
        $b->afficher();    
    }
    
    
    
?>
    
    