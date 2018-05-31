<?php

require_once 'fonctions/functions.php';
require_once 'model/entity/sejour_entity.php';
require_once 'model/entity/pays_entity.php';
require_once 'model/database.php';

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])){
    header("Location: 404.php");
} 
$id = $_GET["id"];

$sejour = getOneSejour($id);
$list_depart = getAllDepart($id);
$list_activite = getAllActivite($id);
$list_photo = getAllPhotos($id);

getHeader("Voyage");
?>
<article class="voyage">
    <section class="infos-voyage">
        <a href="sejour.php?id=<?php echo $sejour["id"]; ?>"><img src="./uploads/<?php echo $sejour["photo_accueil"] ?>" alt="feuilles">
            <header>
                <p class="picto-voyage">voyage</p>
                <h3><?php echo $sejour["nom"] ?></h3>
                <h4>À partir de <?php echo $sejour["prix"] ?> €</h4>
                <p class="picto-niveau">                
                    <?php if (is_numeric($sejour["difficulte"])): ?>
                        <?php for ($i = 0; $i < 5; $i++) : ?>
                            <?php if ($sejour["difficulte"] > $i): ?>
                                <i class="picto1"></i>
                            <?php else : ?>
                                <i class="picto0"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    <?php endif ?>
                </p>
            </header>
        </a>
    </section>
</article>
<h2>Catégorie : <?php echo $sejour["category"]; ?></h2>
<h2>Pays : <?php echo $sejour["pays"]; ?></h2>
<h2>Durée : <?php echo $sejour["duree"]; ?> jours</h2>
<h2><?php echo $sejour["places_restantes"]; ?> / <?php echo $sejour["places_totale"]; ?> places restantes</h2>
<h2>Prochains départs :
    <?php foreach ($list_depart as $depart) : ?>
        <p><?php echo $depart["depart"]; ?></p>
    <?php endforeach; ?>
</h2>
<h1>Activités :
<?php foreach ($list_activite as $activite) : ?>
    <p><?php echo $activite["nom"]; ?> : <?php echo $activite["prix"]; ?> €</p>
<?php endforeach; ?>
</h1>
<p><?php echo $sejour["description"]; ?></p>
<?php foreach ($list_photo as $photo) : ?>
<img src="./uploads/<?php echo $photo["nom_fichier"] ?>" alt="<?php echo $photo["alt"] ?>">
<?php endforeach; ?>   


<?php getFooter(); ?>
