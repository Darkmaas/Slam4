<!DOCTYPE html>
<html>
    <body>
        <!-- Page affichant qu'une voiture a bien été insérer dans la BDD --> 
        <?php
        echo $umod;
        //affiche la liste des voitures de la bdd et leurs immatriculation
        foreach($tab_u as $v){ ?>   
        <p> L'utilisateur d'id 
            <a href="?controller=trajet&action=read&id=<?=rawurlencode($v->getId())?>"> <?=htmlspecialchars($v->getId())?>
            </a> 
            A pour depart <?= $v->getDepart() ?> et pour arrivée <?= $v->getArrive() ?>
            (supprimer le trajet <a href="?controller=trajet&action=delete&id=<?=rawurlencode($v->getId()) ?>">ici</a>)
        </p>
        <?php 
        }
        ?>
    </body>
</html>
