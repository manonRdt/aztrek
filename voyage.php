<?php

require_once 'fonctions/functions.php';
require_once 'model/entity/sejour_entity.php';
require_once 'model/database.php';

// Déclaration des variables
$list_sejour = getAllSejour();
getHeader("Voyage");

?>

<h2 class="titre">Tous les voyages</h2>
      <div class="display-voyage">
         <?php foreach ($list_sejour as $sejour) : ?>
            <?php include 'include/sejours_inc.php'; ?>
        <?php endforeach; ?>
      </div>

<?php getFooter(); ?>