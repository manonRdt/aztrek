<?php
require_once '../../../model/database.php';

$list_categories = getAllEntity("category");

require_once '../../layout/header.php';
?>

<h1>Nouveau voyage</h1>

<form action="create_query.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nom">Titre</label>
        <input type="text" id="nom" name="nom" class="form-control">
    </div>
    <div class="form-group">
        <label for="photo_accueil">Photo</label>
        <input type="file" id="photo_accueil" name="photo_accueil" accept="image/*" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="number" id="prix" name="prix" class="form-control">
    </div>
    <div class="form-group">
        <label for="depart">Date de début</label>
        <input type="date" id="depart" name="depart" class="form-control">
    </div>
    <div class="form-group">
        <label for="category">Catégorie</label>
        <select id="category" name="category" class="form-control">
            <?php foreach ($list_types as $category) : ?>
                <option value="<?php echo $tcategory["id"]; ?>">
                    <?php echo $category["label"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Enregistrer</button>
</form>


<?php require_once '../../layout/footer.php'; ?>
