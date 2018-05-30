<?php

function getAllSouvenir(int $limit = 999){
   /* @var $connection PDO */
    global $connection;

    $query = "SELECT 
	reservation_photo.*,
    reservation.user_id,
    user.picture AS image_profil
FROM reservation
LEFT JOIN reservation_photo ON reservation_photo.reservation_id = reservation.id
LEFT JOIN user ON reservation.user_id = user.id
LIMIT :limit;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}



