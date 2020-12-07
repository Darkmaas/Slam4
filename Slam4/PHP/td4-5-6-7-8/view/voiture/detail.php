<!DOCTYPE html>
<html>
    <body>
        <?php
        //affiche les informations d'une voiture en fonction de son immatriculation 
           $v->afficher();
        ?>
        <!-- lien pour modifier la voiture--> 
        <p>Modification de la voiture <a href="?action=update&immat=<?=rawurlencode($v->getImmatriculation()) ?>">(ici</a>)</p>
        <!-- lien pour supprimer la voiture --> 
        <p>Suppression de la voiture <a href="?action=delete&immat=<?=rawurlencode($v->getImmatriculation()) ?>">ici</a></p>
    </body>
</html>