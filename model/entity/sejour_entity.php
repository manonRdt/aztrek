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
            WHERE sejour.id = :id;
            GROUP BY sejour.id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}
