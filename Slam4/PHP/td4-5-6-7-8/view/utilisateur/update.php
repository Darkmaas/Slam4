<!DOCTYPE html>
<html>
    <Body>
        <!-- Page formaulaire pour modifier une voiture appelant l'action updated-->
        <?php if ($u->getLogin() == null) : ?>
            <form method="post" 
            action="index.php/?controller=utilisateur&action=created"> 
        <?php else: ?>
            <form method="post" 
            action="index.php/?controller=utilisateur&action=updated">
        <?php endif; ?>
            <fieldset>
                <legend>
                    <?php if ($u->getLogin() == null):?>
                    Création de l'utilisateur
                    <?php else: ?>
                    Modification des données de l'utilisateur :
                    <?php endif; ?>
                </legend>
                <p>
                    <label for="immat_id">Login</label>:
                    <?php if ($u->getLogin() == null): ?>
                    <input type="text" value="" name="login" id="login_id" required />
                    <?php else: ?>
                    <input type="text" value="<?= $u->getLogin() ?>" name="login" id="login_id" readonly />
                    <?php endif; ?>
                </p>
                <p>
                    <label for="marque_id">Nom</label>:
                    <input type="text" value="<?= $u->getNom() ?>" name="nom" id="nom_id" required />
                </p>
                <p>
                    <label for="couleur_id">Prenom</label>:
                    <input type="text" value="<?= $u->getPrenom() ?>" name="prenom" id="prenom_id" required />
                </p>
                <p>
                    <input type="submit" value="Envoyer" />
                </p>
            </fieldset>
        </form>
        </form>
    </Body>
</html>