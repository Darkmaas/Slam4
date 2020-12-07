<!DOCTYPE html>
<html>
    <body>
        <?php
        //affiche la voiture qui a été suprimmer par son immatriculation
        echo $vsupp;
        //affiche la liste des voitures de la bdd et leurs immatriculation
        foreach($tab_v as $v){ ?>   
            <p> Voiture d'immatriculation <a href="?action=read&immat=<?=rawurlencode($v->getImmatriculation()) ?>"><?= htmlspecialchars($v->getImmatriculation())?></a></p>
        <?php 
        }
        ?>
    </body>
</html>
