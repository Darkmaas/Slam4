<!DOCTYPE html>
<html>
    <body>
        <!-- Page affichant qu'une voiture a bien été insérer dans la BDD --> 
        <?php
        echo $vmod;
        //affiche la liste des voitures de la bdd et leurs immatriculation
        foreach($tab_v as $v){ ?>   
            <p> Voiture d'immatriculation <a href="?action=read&immat=<?=rawurlencode($v->getImmatriculation()) ?>"><?= htmlspecialchars($v->getImmatriculation())?></a></p>
        <?php 
        }
        ?>
    </body>
</html>
