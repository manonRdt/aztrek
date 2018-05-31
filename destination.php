<?php

require_once 'fonctions/functions.php';
require_once 'model/entity/pays_entity.php';
require_once 'model/database.php';

// Déclaration des variables
getHeader("Destination");

?>

<h2 class="titre">Toutes les destination</h2>
      <div class="display-voyage">
            <?php include 'include/destinations_inc.php'; ?>
      </div>

<?php getFooter(); ?>

