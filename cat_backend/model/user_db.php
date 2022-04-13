<?php

function select($username) {
    global $db;
    $query = 'SELECT *
              FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function newUser($username, $admin) {
    global $db;
    $query = 'INSERT
              INTO users (username, admin)
              VALUES (:username, :admin)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':admin', $admin);
    $statement->execute();
    $statement->closeCursor();
}

function editUser($username, $admin) {
    global $db;
    $query = 'UPDATE users
              SET username = :username, admin = :admin
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':admin', $admin);
    $statement->execute();
    $statement->closeCursor();
}

?>