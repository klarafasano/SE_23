<?php
//Set variables
$servername = "localhost";
$username = "root";
$password = "root";
$db = "ezlistdb";

try {
    // Try to connect to mysql-server (mariadb) with username and password
    $connection = new PDO("mysql:host=$servername", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Make exisiting databases and makes it an array variable ($existing_databases)
    $existing_databases = $connection->query("SHOW DATABASES")->fetchAll(PDO::FETCH_COLUMN);
    // if array variable ($existing_databases) contains "ezlistdb", connect to database (ezlistdb)
    if (in_array($db, $existing_databases)) {
        $connection = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Database Found"; (uncomment to debug)
    // else, create the database
    } else {
        $connection->exec("CREATE DATABASE $db");
        // Connect to database just created
        $connection = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Create table "recipes", if the database (ezlistdb) does not exist
        $connection->exec("CREATE TABLE recipes (
            /* sql blueprint for table, 1 line = 1 column */
            recipe_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
            title varchar(255) not null,
            ingredients text not null,
            img_path varchar(255)
            /* 11: allocates max size, 255: allocates max character space */ 
        )");
    }

// If all of the above fails, and it can't create databse, error handling:
} catch (PDOException $exception) {
    echo "Database not connected. " . $exception->getMessage();
}
