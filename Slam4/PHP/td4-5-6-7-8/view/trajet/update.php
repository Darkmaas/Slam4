<!DOCTYPE html>
<html>
    <Body>
        <!-- Page formaulaire pour modifier une voiture appelant l'action updated-->
        <?php if ($u->getId() == null) : ?>
            <form method="post" 
            action="index.php/?controller=trajet&action=created"> 
        <?php else: ?>
            <form method="post" 
            action="index.php/?controller=trajet&action=updated">
        <?php endif; ?>
            <fieldset>
                <legend>
                    <?php if ($u->getId() == null):?>
                    Création du trajet
                    <?php else: ?>
                    Modification des données du trajet :
                    <?php endif; ?>
                </legend>
                
                <p>
                    <label for="immat_id">Id</label>:
                    <?php if ($u->getId() == null): ?>
                    <input type="text" value="" name="id" id="login_id" required />
                    <?php else: ?>
                    <input type="text" value="<?= $u->getId() ?>" name="id" id="login_id" readonly />
                    <?php endif; ?>
                </p>
                
                <p>
                    <label for="marque_id">Depart</label>:
                    <input type="text" value="<?= $u->getDepart() ?>" name="depart" id="nom_id" required />
                </p>
                
                <p>
                    <label for="couleur_id">Arrive</label>:
                    <input type="text" value="<?= $u->getArrive() ?>" name="arrive" id="prenom_id" required />
                </p>
                
                <p>
                    <label for="couleur_id">Date</label>:
                    <input type="text" value="<?= $u->getDated() ?>" name="dated" id="prenom_id" required />
                </p>
                
                <p>
                    <label for="couleur_id">Nombre de places disponibles</label>:
                    <input type="text" value="<?= $u->getNbplaces() ?>" name="nbplaces" id="prenom_id" required />
                </p>
                <p>
                    <label for="couleur_id">Prix</label>:
                    <input type="text" value="<?= $u->getPrix() ?>" name="prix" id="prenom_id" required />
                </p>
                <p>
                    <label for="couleur_id">Conducteur</label>:
                    <input type="text" value="<?= $u->getConducteur() ?>" name="conducteur_login" id="prenom_id" required />
                </p>
                
                <p>
                    <input type="submit" value="Envoyer" />
                </p>
            </fieldset>
        </form>
        </form>
    </Body>
</html>