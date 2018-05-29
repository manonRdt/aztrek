<?php

// Sejours
function getSejourByDate(int $limit = 999){
   /* @var $connection PDO */
    global $connection;

    $query = "SELECT 
                sejour.*,
                DATE_FORMAT(MIN(depart.date_depart),'%d/%m/%Y') AS depart,
                MAX(note.commentaire) AS commentaire,
                user.id AS user,
                user.profil AS image_profil,
                difficulte.label AS difficulte,
                reservation.nb_personnes AS places_prise,
                AVG(note.notation) AS grade
            FROM sejour
            LEFT JOIN depart ON depart.sejour_id = sejour.id
            LEFT JOIN reservation ON reservation.depart_id = depart.id
            LEFT JOIN note ON note.sejour_id = sejour.id
            INNER JOIN user ON note.user_id = note.id
            INNER JOIN difficulte ON difficulte.id = sejour.difficulte_id
            WHERE date_depart > NOW()
            GROUP BY sejour.id
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

    $query = "SELECT 
                sejour.*,
                DATE_FORMAT(MIN(depart.date_depart),'%d/%m/%Y') AS depart,
                MAX(note.commentaire) AS commentaire,
                user.id AS user,
                user.profil AS image_profil,
                difficulte.label AS difficulte,
                reservation.nb_personnes AS places_prise,
                AVG(note.notation) AS grade
            FROM sejour
            LEFT JOIN depart ON depart.sejour_id = sejour.id
            LEFT JOIN reservation ON reservation.depart_id = depart.id
            LEFT JOIN note ON note.sejour_id = sejour.id
            INNER JOIN user ON note.user_id = note.id
            INNER JOIN difficulte ON difficulte.id = sejour.difficulte_id
            GROUP BY sejour.id
            ORDER BY places_totale
            LIMIT :limit;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getSejourByGrade(int $limit = 999){
   /* @var $connection PDO */
    global $connection;

    $query = "SELECT 
                sejour.*,
                DATE_FORMAT(MIN(depart.date_depart),'%d/%m/%Y') AS depart,
                MAX(note.commentaire) AS commentaire,
                user.id AS user,
                user.profil AS image_profil,
                difficulte.label AS difficulte,
                AVG(note.notation) AS grade,
                MAX(note.notation) AS maxgrade
            FROM sejour
            LEFT JOIN depart ON depart.sejour_id = sejour.id
            INNER JOIN reservation ON reservation.depart_id = depart.id
            LEFT JOIN note ON note.sejour_id = sejour.id
            INNER JOIN user ON note.user_id = note.id
            INNER JOIN difficulte ON difficulte.id = sejour.difficulte_id
            WHERE date_depart > NOW()
            GROUP BY sejour.id
            ORDER BY maxgrade DESC
            LIMIT :limit;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}

