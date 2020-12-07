<?php
require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td3\Model.php';//on inclu la connexion a la BDD

require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td3\Voiture.php';//On inclue la class voiture 

require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td1\Exercice9_trajet.php';//On inclu la classe trajet

require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td1\Exercice9_utilisateur.php';// on inclu la classe utilisateur 

echo "<h1> Fonction find passager</h1>";
    $find_passager=trajet::findPassagers(1);
    foreach($find_passager as $b){
        $b->afficher();    
    }
?>