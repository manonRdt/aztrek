<?php
require_once '../../../model/database.php';

$list_categories = getAllEntity("category");

require_once '../../layout/header.php';
?>

<h1>Nouveau projet</h1>

<form action="create_query.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="picture">Photo</label>
        <input type="file" id="picture" name="picture" accept="image/*" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Prix</label>
        <input type="number" id="price" name="price" class="form-control">
    </div>
    <div class="form-group">
        <label for="date_start">Date de début</label>
        <input type="date" id="date_start" name="date_start" class="form-control">
    </div>
    <div class="form-group">
        <label for="date_end">Date de fin</label>
        <input type="date" id="date_end" name="date_end" class="form-control">
    </div>
    <div class="form-group">
        <label for="category">Catégorie</label>
        <select id="category" name="category_id" class="form-control">
            <?php foreach ($list_categories as $category) : ?>
                <option value="<?php echo $category["id"]; ?>">
                    <?php echo $category["label"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Enregistrer</button>
</form>


<?php require_once '../../layout/footer.php'; ?>
