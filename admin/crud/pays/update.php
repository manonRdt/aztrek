<?php
require_once '../../../model/database.php';

$id = $_GET["id"];
$pays = getOneEntity("pays", $id);

require_once '../../layout/header.php';
?>

<h1>Modifier pays</h1>

<form action="update_query.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="<?php echo $pays["nom"]; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="picto">Photo</label>
        <input type="file" id="picto" name="picto" accept="image/*" class="form-control">
        <?php if (!empty($pays["picto"])) : ?>
            <img src="../../../uploads/<?php echo $pays["picto"]; ?>" class="img-thumbnail">
        <?php endif; ?>
    </div>
    <input type="hidden" name="id" value="<?php echo $pays["id"]; ?>">
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Enregistrer</button>
</form>


<?php require_once '../../layout/footer.php'; ?>
