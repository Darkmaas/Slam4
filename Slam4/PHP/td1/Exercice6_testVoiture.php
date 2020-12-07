<!DOCTYPE html>
<html>
    <Head>
        <meta charset="utf-8">
        <title>test voiture</title>
    </Head>
    
    <Body>
        <?php
        //on appel le fichier Exercice5_voiture.php
        require('C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td1\Exercice5_Voiture.php');
        //créer $voiture1
        $voiture1 = new Voiture("Renault","bleu","254AB36");
        //affiche information $voiture1
        $voiture1->afficher();
        ?>
    </Body>
</html>