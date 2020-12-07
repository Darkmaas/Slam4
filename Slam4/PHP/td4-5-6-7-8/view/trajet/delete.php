<!DOCTYPE html>
<html>
    <body>
        <?php
        //affiche le trajet qui a été suprimmer par son id
        echo $vsupp;
        //affiche la liste des voitures de la bdd et leurs immatriculation
        foreach($tab_v as $v){ ?>   
        <p> L'utilisateur d'id 
            <a href="?controller=trajet&action=read&id=<?=rawurlencode($v->getId())?>"><?=htmlspecialchars($v->getId())?>
            </a> 
            A pour depart <?= $v->getDepart() ?> et pour arrivée <?= $v->getArrive() ?>
            (supprimer le trajet <a href="?controller=trajet&action=delete&id=<?=rawurlencode($v->getId()) ?>">ici</a>)
        </p>
        <?php 
        }
        ?>
    </body>
</html>
