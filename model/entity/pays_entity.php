<?php

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

function insertPays(string $nom, string $picto)
{
    /* @var $connection PDO */
    global $connection;

    $query = "INSERT INTO pays (nom, picto)
                VALUES (:nom, :picto);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":picto", $picto);
    $stmt->execute();
}

function updatePays(int $id,string $nom, string $picto)
{
    /* @var $connection PDO */
    global $connection;

    $query = "UPDATE pays
              SET nom = :nom,
                picto = :picto
            WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":picto", $picto);
    $stmt->execute();
}