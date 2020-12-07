<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
        <!-- Armature principale de chaque page de notre site--> 
        <div style="border: 1px solid black;text-align:left">
            <form name="x" action="index.php/?controller=voiture&action=readAll" method="post">
                <input type="submit" value="Voiture">
            </form>
            
            <form name="x" action="index.php/?action=create" method="post">
                <input type="submit" value="Creation Voiture ">
            </form>
            
            <form name="x" action="index.php/?controller=utilisateur&action=create" method="post">
                <input type="submit" value="Creation utilisateur">
            </form>
            
            <form name="y" action="index.php/?controller=utilisateur&action=readAll" method="post">
                <input type="submit" value="Utilisateur">
            </form>
            
            <form name="y" action="index.php/?controller=trajet&action=readAll" method="post">
                <input type="submit" value="Trajet">
            </form>
            
            <form name="y" action="index.php/?controller=trajet&action=create" method="post">
                <input type="submit" value="Creation trajet ">
            </form>
        </div>
        
        
        
        <?php
        // Si $controleur='voiture' et $view='list',
        // alors $filepath="/chemin_du_site/view/voiture/list.php"
        $filepath = File::build_path(array("view",$controller,"$view.php"));
        require $filepath;
        ?>
        
        
        
        <!-- footer-->
        <p style="border: 1px solid black;text-align:right;padding-right:1em;">Site de covoiturage de Eddy</p>
    </body>
</html>