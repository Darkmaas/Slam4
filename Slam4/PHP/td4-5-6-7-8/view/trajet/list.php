<!DOCTYPE html>
<html>
    <body>
        <?php
        //affiche la liste des trajets de la bdd et leurs id avec un lien pour modifier chaque trajet ou la supprimer 
        foreach($tab_t as $v){ ?>   
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
