<?php

function getAllMembers()
{
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                user.*,
                CONCAT(user.firstname, ' ', user.lastname) AS fullname
            FROM user;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}


function insertMember(string $firstname, string $lastname, string $picture)
{
    /* @var $connection PDO */
    global $connection;

    $query = "INSERT INTO user (firstname, lastname, picture,)
                VALUES (:firstname, :lastname, :picture);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":picture", $picture);
    $stmt->execute();
}

function updateMember(int $id, string $firstname, string $lastname, string $picture)
{
    /* @var $connection PDO */
    global $connection;

    $query = "UPDATE user
                SET firstname = :firstname,
                lastname = :lastname,
                picture = :picture
            WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":picture", $picture);
    $stmt->execute();
}