<?php

require_once '../../../model/database.php';

// Récupérer les données du formulaire
$nom = $_POST["nom"];
$duree = $_POST["duree"];
$prix = $_POST["prix"];
$places_totale = $_POST["places_totale"];
$difficulte_id = $_POST["difficulte_id"];
$types_sejours_id = $_POST["types_sejours_id"];
$description = $_POST["description"];

// Vérifier si l'utilisateur a uploadé un fichier
if ($_FILES["photo_accueil"]["error"] == 0) {
    $photo_accueil = $_FILES["photo_accueil"];
    // Déplacer le fichier uploadé
    move_uploaded_file($_FILES["photo_accueil"], "../../../uploads/" . $photo_accueil);
}

// Insertion des données en BDD
insertSejour($nom, $duree, $prix, $places_totale, $difficulte_id, $photo_accueil, $types_sejours_id, $description);

// Redirection vers la liste
header("Location: index.php");