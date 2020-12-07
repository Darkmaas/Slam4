<!DOCTYPE html>
<html>
    <Body>
        <!-- Page formaulaire pour modifier une voiture appelant l'action updated-->
        <?php if ($v->getImmatriculation() == null) : ?>
            <form method="post" 
            action="index.php/?controller=voiture&action=created"> 
        <?php else: ?>
            <form method="post" 
            action="index.php/?controller=voiture&action=updated">
        <?php endif; ?>
            <fieldset>
                <legend>
                    <?php if ($v->getImmatriculation() == null):?>
                    Création de la voiture
                    <?php else: ?>
                    Modification des données de la voiture :
                    <?php endif; ?>
                </legend>
                <p>
                    <label for="immat_id">Immatriculation</label>:
                    <?php if ($v->getImmatriculation() == null): ?>
                    <input type="text" value="" name="immat" id="immat_id" required />
                    <?php else: ?>
                    <input type="text" value="<?= $v->getImmatriculation() ?>" name="immat" id="immat_id" readonly />
                    <?php endif; ?>
                </p>
                <p>
                    <label for="marque_id">Marque</label>:
                    <input type="text" value="<?= $v->getMarque() ?>" name="marque" id="marque_id" required />
                </p>
                <p>
                    <label for="couleur_id">Couleur</label>:
                    <input type="text" value="<?= $v->getCouleur() ?>" name="couleur" id="couleur_id" required />
                </p>
                <p>
                    <input type="submit" value="Envoyer" />
                </p>
            </fieldset>
        </form>
        </form>
    </Body>
</html>