<?php

function debug($var, bool $die = true) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    if ($die){
        die;
    }
}

function getHeader(string $title){
    require_once 'layout/header.php';
}
function getFooter(){
    require_once 'layout/footer.php';
}
function getMenu(){
    require_once 'layout/menu.php';
}

function getListActivite(){
   /* @var $connection PDO */
    
    global $connection;
    
    $query =  "SELECT 
*
FROM activite";

    $stmt = $connection->prepare($query);

    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllTypes(){
   /* @var $connection PDO */
    
    global $connection;
    
    $query =  "SELECT 
*
FROM types_sejours";

    $stmt = $connection->prepare($query);

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