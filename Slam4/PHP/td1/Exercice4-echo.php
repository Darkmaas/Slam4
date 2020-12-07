<!DOCTYPE html>
<html>
    <Head>
        <meta charset="utf-8">
        <title>Exercice 4</title>
    </Head>
    
    <Body>
        <?php 
        //On créer 3 variables
        $marque="renault";
        $couleur="bleu";
        $immatriculation="256AB34";
        
        //on affiche la phrase 
        echo "<p> Voiture $immatriculation de marque $marque (couleur $couleur) </p>";
        
        //On créer le tableau voiture 
        $voiture['marque']='peugeot';
        $voiture['couleur']='rouge';
        $voiture['immatriculation']='345ED61';
        
        //vérification tableau rempli
        var_dump($voiture);
        
        //affichage avec le tableau $voiture 
        echo "<p> Voiture $voiture[immatriculation] de marque $voiture[marque] (couleur $voiture[couleur]) </p>";
        //On créer le tableau de voiture
        $voitures=array(array('marque'=>'peugeot','couleur'=>'rouge','immatriculation'=>'345ED61'),
                        array('marque'=>'renault','couleur'=>'verte','immatriculation'=>'345ED62'),
                        array('marque'=>'Audi','couleur'=>'grise','immatriculation'=>'345ED66'));
        //vérification $voitures bien rempli
        var_dump($voitures);
        
        echo "<h1> Listes des voitures </h1>";
        
        //affichage liste des voitures 
        echo "<ul>";
        foreach($voitures as $key => $values){
            echo "<li><p> Voiture $values[immatriculation] de marque $values[marque] (couleur $values[couleur])</p></li>";}
        echo "</ul>";                 
        ?>
    </Body>
</html>