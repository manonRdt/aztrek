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
function getDestinations(){
    require_once 'include/destinations_inc.php';
}

function getAllProjects(int $limit = 999){
   /* @var $connection PDO */
    global $connection;

    $query = "SELECT *
            FROM sejours
            INNER JOIN depart ON depart.sejours_id = sejours.id
            GROUP BY date_depart DESC
            LIMIT :limit;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}
