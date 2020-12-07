<!DOCTYPE html>
<html>
    <body>
        <?php
        //affiche la liste des voitures de la bdd et leurs immatriculation avec un lien pour modifier chaque voiture ou la supprimer 
        foreach($tab_v as $v){ ?>   
        <p> Voiture d'immatriculation <a href="?action=read&immat=<?=rawurlencode($v->getImmatriculation()) ?>"><?= htmlspecialchars($v->getImmatriculation())?></a>(supprimer la voiture <a href="?action=delete&immat=<?=rawurlencode($v->getImmatriculation()) ?>">ici</a>)
        </p>
        <?php 
        }
        ?>
    </body>
</html>
