<?php

require_once '../../../model/database.php';

// Récupérer les données du formulaire
$nom = $_POST["nom"];
$picto = "";

// Vérifier si l'utilisateur a uploadé un fichier
if ($_FILES["picto"]["error"] == 0) {
    $picto = $_FILES["picto"]["name"];
    // Déplacer le fichier uploadé
    move_uploaded_file($_FILES["picto"]["tmp_name"], "../../../uploads/" . $picto);
}

// Insertion des données en BDD
insertPays($nom, $picto);

// Redirection vers la liste
header("Location: index.php");