<!DOCTYPE html>
<html>
    <Head>
        <meta charset="utf-8">
        <title>créer voiture</title>
    </Head>
    
    <Body>
        
        <?php
        //on va chercher le fichier Exercice5_voiture.php
        require('C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td1\Exercice5_Voiture.php');
        //On recupère les données du formaulaire et on créer l'objet $voiture avec ces information
            if(isset($_POST['marque']) && isset($_POST['immatriculation']) && isset($_POST['couleur'])){
                $marque = $_POST['marque'];
                $immatriculation = $_POST['immatriculation'];
                $couleur = $_POST['couleur'];
                
                $voiture = new voiture($marque,$couleur,$immatriculation);
                $voiture->afficher();
            }
    
        ?>
    </Body>
</html>