<?php

require_once 'fonctions/functions.php';
require_once 'model/database.php';

// Déclaration des variables
$list_voyage = getAllTypes();

getHeader("Destination");

?>

<h2 class="titre">Types de voyages</h2>

  <ul>
    <?php foreach ($list_voyage as $voyage) : ?>      
    <li>     
        <a href="#"><p>
            <?php echo $voyage["nom"] ?>
        </p></a>
    </li>
    <?php endforeach; ?>
  </ul>

        
    

<?php getFooter(); ?>