<?php
require_once '../../../model/database.php';

$id = $_GET["id"];
$sejour = getOneEntity("sejour", $id);

require_once '../../layout/header.php';
?>

<h1>Modifier projet</h1>

<form action="update_query.php" method="post" enctype="multipart/form-data">
<div class="form-group">
        <label for="nom">Titre</label>
        <input type="text" id="nom" name="nom" value="<?php echo $sejour["nom"]; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="duree">Durée</label>
        <input type="number" id="duree" name="duree" value="<?php echo $sejour["duree"]; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="number" id="prix" name="prix" value="<?php echo $sejour["prix"]; ?>" class="form-control">
    </div>    
    <div class="form-group">
        <label for="places_totale">Places totales</label>
        <input type="number" id="places_totale" name="places_totale" value="<?php echo $sejour["places_totale"]; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="difficulte_id">Difficulté</label>
        <input type="number" id="difficulte_id" name="difficulte_id" value="<?php echo $sejour["difficulte_id"]; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="photo_accueil">Photo</label>
        <input type="file" id="photo_accueil" name="photo_accueil" accept="image/*" class="form-control">
        <?php if (!empty($sejour["photo_accueil"])) : ?>
            <img src="../../../uploads/<?php echo $sejour["photo_accueil"]; ?>" class="img-thumbnail">
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="types_sejours_id">Catégorie</label>
        <select id="types_sejours_id" name="types_sejours_id" value="<?php echo $sejour["types_sejours_id"]; ?>" class="form-control">
            <?php foreach ($list_types as $types_sejours_id) : ?>
                <option value="<?php echo $types_sejours_id["id"]; ?>">
                    <?php echo $types_sejours_id["nom"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" id="description" name="description" value="<?php echo $sejour["description"]; ?>" class="form-control">
    </div>
    <input type="hidden" name="id" value="<?php echo $sejour["id"]; ?>">
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Enregistrer</button>
</form>


<?php require_once '../../layout/footer.php'; ?>

