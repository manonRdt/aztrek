<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AZTREK</title>
  <link href="https://fonts.googleapis.com/css?family=East+Sea+Dokdo|Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="./css/jquery.sidr.light.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header class="header-page">
    <?php getMenu(); ?>
    <section id="header-info" class="container">
      <h1>Explorer le monde ensemble !</h1>
      <h1>Vivez une expérience unique en rejoignant la communauté Aztrek.</h1>
        <form id="recherche" class="search-form" action="#" method="get">
          <input type="text" name="rechercher" value="" placeholder="Planifiez votre voyage">
          <button type="submit" name="submit-btn">Envoyer</button>
        </form>
    </section>
    <section id="chat">
      <div class="chat-info">
        <img src="./images/profil1.png" alt="photo de profil">
        <p>Rejoignez le chat</p>
      </div>
      <div class="chat-info">
        <form id="chat-message" class="search-form" action="#" method="get">
          <input type="text" name="rechercher" value="" placeholder="Ecrivez votre message ...">
          <button type="submit" name="submit-btn">Envoyer</button>
        </form>
      </div>
    </section>
  </header>

  <main>