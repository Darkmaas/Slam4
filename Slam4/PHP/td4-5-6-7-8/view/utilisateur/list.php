<!DOCTYPE html>
<html>
    <body>
        <?php
        //affiche la liste des voitures de la bdd et leurs immatriculation avec un lien pour modifier chaque voiture ou la supprimer 
        foreach($tab_u as $v){ ?>   
        <p> L'utilisateur de login 
            <a href="?controller=utilisateur&action=read&login=<?=rawurlencode($v->getLogin())?>"><?=htmlspecialchars($v->getLogin())?>
            </a> 
            A pour prenom <?= $v->getPrenom() ?> et pour nom <?= $v->getNom() ?>
            (supprimer l'utilisateur <a href="?controller=utilisateur&action=delete&login=<?=rawurlencode($v->getLogin()) ?>">ici</a>)
        </p>
        <?php 
        }
        ?>
    </body>
</html>
