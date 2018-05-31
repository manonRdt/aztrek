<?php

require_once '../../../model/database.php';

// Récupérer les données du formulaire
$id = $_POST["id"];
$nom = $_POST["nom"];

$pays = getOneEntity("pays", $id);
$picto = !is_null($pays["picto"]) ? $pays["picto"] : ""; // Image présente avant update

// Vérifier si l'utilisateur a uploadé un fichier
if ($_FILES["picto"]["error"] == 0) {
    $picto = $_FILES["picto"]["name"];
    // Déplacer le fichier uploadé
    move_uploaded_file($_FILES["picto"]["tmp_name"], "../../../uploads/" . $picto);
}

// Insertion des données en BDD
updatePays($id, $nom, $picto);

// Redirection vers la liste
header("Location: index.php");