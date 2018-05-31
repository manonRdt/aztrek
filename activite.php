<?php

require_once 'fonctions/functions.php';
require_once 'model/database.php';

// Déclaration des variables
$list_activite = getListActivite();

getHeader("Destination");

?>

<h2 class="titre">Toutes les activités</h2>

  <ul>
    <?php foreach ($list_activite as $activite) : ?>      
    <li>     
        <a href="#"><p>
            <?php echo $activite["nom"] ?>
        </p></a>
    </li>
    <?php endforeach; ?>
  </ul>

        
    

<?php getFooter(); ?>