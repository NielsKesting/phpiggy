<?php

include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;

$database = new Database('mysql', [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'phpiggy'
], 'root', '');

$search = "Hats";
$query = "SELECT * FROM products WHERE name =:name";

$statement = $database->connection->query($query);
$statement->bindValue('name', $search, PDO::PARAM_STR);
$statement->execute([]);

var_dump($statement->fetchAll(PDO::FETCH_OBJ));
