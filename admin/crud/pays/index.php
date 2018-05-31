<?php
require_once '../../../model/database.php';


$list_pays = getAllEntity("pays");

require_once '../../layout/header.php';
?>

<h1>Gestion des séjours</h1>

<a href="create.php" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter</a>

<hr>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Nom</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_pays as $pays) : ?>
            <tr>
                <td><?php echo $pays["nom"]; ?></td>
                <?php $picto = (!empty($pays["picto"])) ? "../../../uploads/" . $pays["picto"] : "http://via.placeholder.com/150x150"; ?>
                <td><img src="<?php echo $picto; ?>" class="img-thumbnail"></td>
                <td>
                    <a href="update.php?id=<?php echo $pays["id"]; ?>" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                    <a href="delete_query.php?id=<?php echo $pays["id"]; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once '../../layout/footer.php'; ?>