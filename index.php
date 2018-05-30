<?php

require_once 'fonctions/functions.php';
require_once 'model/entity/sejour_entity.php';
require_once 'model/entity/souvenirs_entity.php';
require_once 'model/database.php';

// Déclaration des variables
$list_sejour_date = getSejourByDate(2);
$list_sejour_place = getSejourByPlace(2);
$list_sejour_grade = getSejourByGrade(1);
$list_souvenir = getAllSouvenir(5);

getHeader("Accueil");
?>

    <section id="prochains-departs" class="container">
      <h2 class="titre">Prochains départs</h2>
      <div class="display-voyage">
         <?php foreach ($list_sejour_date as $sejour) : ?>
            <?php include 'include/sejours_inc.php'; ?>
        <?php endforeach; ?>
        <article class="communaute">
          <p class="picto-communaute">communauté</p>
          <h2>Aztrek communauté</h2>
          <h4>Planifier, organiser ses voyages et explorer le monde ensemble !</h4>
          <a href="#" class="btn">Rejoignez la communauté</a>
        </article>
      </div>
    </section>

    <section id="derniere-places" class="container">
      <h2 class="titre">Dernières places</h2>
      <div class="display-voyage">
         <?php foreach ($list_sejour_place as $sejour) : ?>
            <?php include 'include/sejours_inc.php'; ?>
        <?php endforeach; ?>
        <article class="communaute">
          <p class="picto-communaute">communauté</p>
          <h2>évènements</h2>
          <h4>Venez échanger et partager autour d'un verre avec les membres de la communauté !</h4>
          <h4>Prochains rendez-vous</h4>
          <div id="date-evenement">
            <h4>27/05</h4>
            <h4>15/06</h4>
          </div>
          <a href="#" class="btn">En savoir plus</a>
        </article>
      </div>
    </section>

    <section id="coup-coeur" class="container">
      <h2 class="titre">Coups de coeur</h2>
      <div class="display-voyage">
        <?php foreach ($list_sejour_grade as $sejour) : ?>
            <?php include 'include/sejours_inc.php'; ?>
        <?php endforeach; ?>
        <article class="communaute">
          <p class="picto-communaute">communauté</p>
          <h2>Télécharger l'Appli</h2>
          <h4>Partagez vos photos et vos videos avec la communauté Aztrek.</h4>
          <h4>Chattez et rencontrez des voyageurs.</h4>
          <a href="#" class="btn">Télécharger</a>
        </article>
      </div>
    </section>

    <section id="destinations">
    <?php require_once 'include/destinations_inc.php'; ?>
      <div id="maps" class="container">
        <article id="info-maps">
          <p>Tous les endroits coups de coeur de la communauté</p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983411.449406606!2d-87.70552019360385!3d12.840029849244413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f0b58c0f7680811%3A0x8dace0c7060b2570!2sCentral+America!5e0!3m2!1sfr!2sfr!4v1524124330083"
            width="472" height="352" frameborder="0" style="border:0" allowfullscreen></iframe>
        </article>
        <article class="communaute">
          <p class="picto-communaute">communauté</p>
          <h2>Le saviez-vous</h2>
          <h4>Le plus petit volcan au monde se trouve au mexique : le Cuexcomate. </h4>
          <h4>Ce n’est pas de ses 13 mètres de hauteur que tu pourras dominer la ville avoisinante.</h4>
          <a href="#" class="btn">En savoir plus</a>
        </article>
      </div>
    </section>
    <section id="souvenirs" class="container">
      <h2>Souvenirs</h2>
      <div class="display-voyage">
        <article id="hashtag-aztrek">
          <h1># AZTREK</h1>
          <p>Découvrez les photos et vidéos postés par les membres de la communauté sur les réseaux sociaux !</p>
          <a href="#" class="btn">En savoir plus</a>
        </article>
         <?php foreach ($list_souvenir as $souvenir) : ?>
            <?php include 'include/souvenirs_inc.php'; ?>
        <?php endforeach; ?>
        <article class="communaute">
          <p class="picto-communaute">communauté</p>
          <h2>Comment bien préparer son voyage</h2>
          <h4>Les aztèques considéraient le chocolat chaud comme la boisson réservée aux dieux. Lorsque Cortes, le conquistador, débarque au Mexique, les aztèques pensent qu’il s’agit d’un dieu, et lui offre en toute normalité, un chocolat chaud. </h4>
          <div id="post-blog">
            <img src="./images/profil1.png" alt="photo de profil">
            <p>Posté par Caroline<br>le 17/04/18</p>
          </div>
          <a href="#" class="btn">En lire plus</a>
        </article>
      </div>
    </section>

<?php getFooter(); ?>
