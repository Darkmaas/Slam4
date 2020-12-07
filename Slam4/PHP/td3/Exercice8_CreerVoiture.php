<!DOCTYPE html>
<html>
    <Head>
        <meta charset="utf-8">
        <title>créer voiture</title>
    </Head>
    
    <Body>
        
        <?php
        require_once 'C:\EasyPHP-Devserver-17\eds-www\Slam4\PHP\td3\Voiture.php';
            if(isset($_POST['marque']) && isset($_POST['immatriculation']) && isset($_POST['couleur'])){
                $marque = $_POST['marque'];
                $immatriculation = $_POST['immatriculation'];
                $couleur = $_POST['couleur'];
                
                $voiture = new voiture($marque,$couleur,$immatriculation);
                $voiture->afficher();
                $voiture->save();
            }
    
        ?>
    </Body>
</html>