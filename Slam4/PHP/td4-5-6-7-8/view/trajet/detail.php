<!DOCTYPE html>
<html>
    <body>
        <?php
        //affiche les informations d'une voiture en fonction de son immatriculation 
           $v->afficher();
        ?>
        
        <!-- lien pour modifier l'utilisateur--> 
        <p>Modification du trajet <a href="?controller=trajet&action=update&id=<?=rawurlencode($v->getId()) ?>">(ici</a>)</p>
        <!-- lien pour supprimer l'utilisateur --> 
        <p>Suppression du trajet <a href="?controller=trajet&action=delete&id=<?=rawurlencode($v->getId()) ?>">(ici</a>)</p>
    </body>
</html>