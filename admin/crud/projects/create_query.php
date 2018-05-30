<?php

require_once '../../../model/database.php';

// Récupérer les données du formulaire
$nom = $_POST["nom"];
$description = $_POST["description"];
$prix = $_POST["prix"];
$depart = $_POST["depart"];
$category = $_POST["category"];

$photo_accueil = "";

// Vérifier si l'utilisateur a uploadé un fichier
if ($_FILES["photo_accueil"]["error"] == 0) {
    $photo_accueil = $_FILES["photo_accueil"];
    // Déplacer le fichier uploadé
    move_uploaded_file($_FILES["photo_accueil"], "../../../uploads/" . $photo_accueil);
}

// Insertion des données en BDD
insertProject($nom, $photo_accueil, $description, $prix, $depart, $category);

// Redirection vers la liste
header("Location: index.php");