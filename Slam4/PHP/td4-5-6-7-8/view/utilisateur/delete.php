<!DOCTYPE html>
<html>
    <body>
        <?php
        //affiche la voiture qui a été suprimmer par son immatriculation
        echo $vsupp;
        //affiche la liste des voitures de la bdd et leurs immatriculation
        foreach($tab_v as $v){ ?>   
        <p> L'utilisateur de login 
            <a href="?controller=utilisateur&action=read&login=<?=rawurlencode($v->getLogin())?>"><?=htmlspecialchars($v->getLogin())?>
            </a> 
            A pour prenom <?= $v->getPrenom() ?> et pour nom <?= $v->getNom() ?>
            (supprimer l'utilisateur <a href="?action=delete&login=<?=rawurlencode($v->getLogin()) ?>">ici</a>)
        </p>
        <?php 
        }
        ?>
    </body>
</html>
