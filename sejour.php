<?php

require_once 'fonctions/functions.php';
require_once 'model/entity/sejour_entity.php';
require_once 'model/database.php';

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])){
    header("Location: 404.php");
} 
$id = $_GET["id"];

$sejour = getOneSejour($id);

getHeader("Voyage");
?>

<h1><?php echo $sejour["nom"]; ?></h1>
<p><?php echo $sejour["description"]; ?></p>
   


<?php getFooter(); ?>
