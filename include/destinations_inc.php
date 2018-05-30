<?php $list_pays = getAllDestination ();?>
<article id="pays" class="container">
  <h2>Destinations</h2>
  <ul> 
    <?php foreach ($list_pays as $pays) : ?>
    <li>
        <a href="#"><img class="pays-picto" src="./uploads/<?php echo $pays["picto"] ?>"
        ></a>
    </li>
    <?php endforeach; ?>
  </ul> 
  
  <ul>
    <?php foreach ($list_pays as $pays) : ?>      
    <li>     
        <a href="#"><p>
            <?php echo $pays["nom"] ?>
        </p></a>
    </li>
    <?php endforeach; ?>
  </ul>

      

 
        
        

  <p>Organisateur de voyage au Mexique, AZTREK propose des circuits hors des sentiers battus pour découvrir les régions les plus authentiques de l’Amérique centrale.</p>
</article>

