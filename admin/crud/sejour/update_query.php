<?php

require_once '../../../model/database.php';

// Récupérer les données du formulaire
$id = $_POST["id"];
$nom = $_POST["nom"];
$duree = $_POST["duree"];
$prix = $_POST["prix"];
$places_totale = $_POST["places_totale"];
$pays_id = $_POST["pays_id"];
$difficulte_id = $_POST["difficulte_id"];
$types_sejours_id = $_POST["types_sejours_id"];
$description = $_POST["description"];

$sejour = getOneEntity("sejour", $id);
$photo_accueil = !is_null($sejour["photo_accueil"]) ? $sejour["photo_accueil"] : ""; // Image présente avant update

// Vérifier si l'utilisateur a uploadé un fichier
if ($_FILES["photo_accueil"]["error"] == 0) {
    $photo_accueil = $_FILES["photo_accueil"]["name"];
    // Déplacer le fichier uploadé
    move_uploaded_file($_FILES["photo_accueil"]["tmp_name"], "../../../uploads/" . $photo_accueil);
}

// Insertion des données en BDD
updateSejour($id, $nom, $duree, $prix, $places_totale, $pays_id, $difficulte_id, $photo_accueil, $types_sejours_id, $description);

// Redirection vers la liste
header("Location: index.php");