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



function getAllDestination(){
   /* @var $connection PDO */
    global $connection;

    $query = "SELECT *
            FROM pays;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

