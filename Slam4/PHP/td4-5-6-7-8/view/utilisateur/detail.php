<!DOCTYPE html>
<html>
    <body>
        <?php
        //affiche les informations d'une voiture en fonction de son immatriculation 
           $v->afficher();
        ?>
        
        <!-- lien pour modifier l'utilisateur--> 
        <p>Modification de l'utilisateur <a href="?controller=utilisateur&action=update&login=<?=rawurlencode($v->getLogin()) ?>">(ici</a>)</p>
        <!-- lien pour supprimer l'utilisateur --> 
        <p>Suppression de l'utilisateur <a href="?controller=utilisateur&action=delete&login=<?=rawurlencode($v->getLogin()) ?>">ici</a></p>
    </body>
</html>