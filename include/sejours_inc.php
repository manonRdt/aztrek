<article class="voyage">
  <section class="infos-voyage">
    <a href="#"><img src="./uploads/<?php echo $sejour["photo_accueil"] ?>" alt="feuilles">
    <header>
      <p class="picto-voyage">voyage</p>
      <h3><?php echo $sejour["nom"] ?></h3>
      <h4>À partir de <?php echo $sejour["prix"] ?> €</h4>
      <p class="picto-niveau">                
          <?php if (is_numeric($sejour["difficulte"])):  ?>
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
  <section class="detail-voyage">
    <h4><?php echo $sejour["duree"] ?> jours</h4>
    <p>Départ le <?php echo $sejour["depart"] ?></p>
    <p class="size-12">Plus que <?php echo $place_restantes ?> places</p>
    <a href="#" class="btn">S'inscrire</a>
    <div class="avis">
      <img src="./uploads/<?php echo $sejour["image_profil"] ?>" alt="photo de profil">
      <p class="star"><?php if (is_numeric($sejour["grade"])):  ?>
                    <?php for ($i = 0; $i < 5; $i++) : ?>
                        <?php if ($sejour["grade"] > $i): ?>
                            <i class="star1"></i>
                        <?php else : ?>
                            <i class="star0"></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php endif ?></p>
    </div>
    <p class="size-12"><?php echo $sejour["commentaire"] ?></p>
  </section>
</article>