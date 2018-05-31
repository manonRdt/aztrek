<?php

function getSejourQuery() {
    return "SELECT 
                sejour.*,
                DATE_FORMAT(MIN(depart.date_depart),'%d/%m/%Y') AS depart,
                MAX(note.commentaire) AS commentaire,
                user.id AS user,
                user.picture AS image_profil,
                difficulte.label AS difficulte,
                sejour.places_totale - SUM(reservation.nb_personnes) AS places_restantes,
                AVG(note.notation) AS grade
            FROM sejour
            LEFT JOIN depart ON depart.sejour_id = sejour.id
            LEFT JOIN reservation ON reservation.depart_id = depart.id
            LEFT JOIN note ON note.sejour_id = sejour.id
            INNER JOIN user ON note.user_id = user.id
            INNER JOIN difficulte ON difficulte.id = sejour.difficulte_id
            WHERE date_depart > NOW() ";
}

function getAllSejour(){
   /* @var $connection PDO */
    global $connection;
    
    $query =  "SELECT 
                sejour.*,
                DATE_FORMAT(MIN(depart.date_depart),'%d/%m/%Y') AS depart,
                MAX(note.commentaire) AS commentaire,
                user.id AS user,
                user.picture AS image_profil,
                difficulte.label AS difficulte,
                sejour.places_totale - SUM(reservation.nb_personnes) AS places_restantes,
                AVG(note.notation) AS grade,
                types_sejours.nom AS category
            FROM sejour
            LEFT JOIN depart ON depart.sejour_id = sejour.id
            LEFT JOIN reservation ON reservation.depart_id = depart.id
            LEFT JOIN note ON note.sejour_id = sejour.id
            LEFT JOIN types_sejours ON types_sejours.id = sejour.types_sejours_id
            INNER JOIN user ON note.user_id = user.id
            INNER JOIN difficulte ON difficulte.id = sejour.difficulte_id
            WHERE date_depart > NOW()
            GROUP BY sejour.id;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}


function getSejourByDate(int $limit = 999){
   /* @var $connection PDO */
    global $connection;
    
    $query = getSejourQuery();

    $query = $query . "GROUP BY sejour.id
                        ORDER BY date_depart
                        LIMIT :limit;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getSejourByPlace(int $limit = 999){
   /* @var $connection PDO */
    global $connection;
    $query = getSejourQuery();

    $query = $query . "GROUP BY sejour.id
            ORDER BY places_restantes
            LIMIT :limit;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getSejourByGrade(int $limit = 999){
   /* @var $connection PDO */
    global $connection;
    
    $query = getSejourQuery();

    $query = $query . "GROUP BY sejour.id
            ORDER BY grade DESC
            LIMIT :limit;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}



function getOneSejour(int $id){
   /* @var $connection PDO */
    
    global $connection;
    
    $query =  "SELECT 
                sejour.*,
                DATE_FORMAT(depart.date_depart,'%d/%m/%Y') AS depart,
                MAX(note.commentaire) AS commentaire,
                user.id AS user,
                user.picture AS image_profil,
                difficulte.label AS difficulte,
                sejour.places_totale - SUM(reservation.nb_personnes) AS places_restantes,
                AVG(note.notation) AS grade,
                types_sejours.nom AS category,
                pays.nom AS pays
            FROM sejour
            LEFT JOIN depart ON depart.sejour_id = sejour.id
            LEFT JOIN reservation ON reservation.depart_id = depart.id
            LEFT JOIN note ON note.sejour_id = sejour.id
            LEFT JOIN types_sejours ON types_sejours.id = sejour.types_sejours_id
            LEFT JOIN pays ON pays.id = sejour.pays_id
            INNER JOIN user ON note.user_id = user.id
            INNER JOIN difficulte ON difficulte.id = sejour.difficulte_id
            WHERE sejour.id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function getAllDepart(int $id){
   /* @var $connection PDO */
    
    global $connection;
    
    $query =  "SELECT 
sejour.id,
DATE_FORMAT(depart.date_depart,'%d/%m/%Y') AS depart
FROM sejour
INNER JOIN depart ON depart.sejour_id = sejour.id
WHERE sejour.id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllActivite(int $id){
   /* @var $connection PDO */
    
    global $connection;
    
    $query =  "SELECT 
sejour.id,
activite.*
FROM sejour
INNER JOIN activite ON activite.sejour_id = sejour.id
WHERE sejour.id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllPays(){
   /* @var $connection PDO */
    
    global $connection;
    
    $query =  "SELECT 
                *
            FROM pays;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllPhotos(int $id){
   /* @var $connection PDO */
    
    global $connection;
    
    $query =  "SELECT 
sejour.id,
sejour_photos.*
FROM sejour_photos
INNER JOIN sejour ON sejour_photos.sejour_id = sejour.id
WHERE sejour.id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}

//ADMIN
function insertSejour(string $nom, int $duree, int $prix, int $places_totale, int $pays_id, int $difficulte_id, string $photo_accueil, int $types_sejours_id, string $description) {
        /* @var $connection PDO */
    global $connection;

    $query = "INSERT INTO sejour (nom, duree, prix, places_totale, pays_id, difficulte_id, photo_accueil, types_sejours_id, description)
                VALUES (:nom, :duree, :prix, :places_totale, :pays_id, :difficulte_id, :photo_accueil, :types_sejours_id, :description);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":duree", $duree);
    $stmt->bindParam(":prix", $prix);
    $stmt->bindParam(":places_totale", $places_totale);
    $stmt->bindParam(":pays_id", $pays_id);
    $stmt->bindParam(":difficulte_id", $difficulte_id);
    $stmt->bindParam(":photo_accueil", $photo_accueil);
    $stmt->bindParam(":types_sejours_id", $types_sejours_id);
    $stmt->bindParam(":description", $description);
    $stmt->execute();
}
function updateSejour(int $id, string $nom, int $duree, int $prix, int $places_totale, int $pays_id, int $difficulte_id, string $photo_accueil, int $types_sejours_id, string $description) {
        /* @var $connection PDO */
    global $connection;

    $query = "UPDATE sejour 
                SET nom = :nom, 
                    duree = :duree, 
                    prix = :prix, 
                    places_totales = :places_totale,
                    pays_id = :pays_id,
                    difficulte_id = :difficulte_id, 
                    photo_accueil = :photo_accueil, 
                    types_sejours_id = :types_sejours.id, 
                    description = :description
                WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":duree", $duree);
    $stmt->bindParam(":prix", $prix);
    $stmt->bindParam(":places_totale", $places_totale);
    $stmt->bindParam(":pays_id", $pays_id);
    $stmt->bindParam(":difficulte_id", $difficulte_id);
    $stmt->bindParam(":photo_accueil", $photo_accueil);
    $stmt->bindParam(":types_sejours_id", $types_sejours_id);
    $stmt->bindParam(":description", $description);
    $stmt->execute();
}
