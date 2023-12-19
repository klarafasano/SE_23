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
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // SQL query to be inserted
            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "ezlistdb";
            // Create connection
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // SQL query to be inserted
                $sql = "
                INSERT INTO recipes (title, ingredients, img_path) 
                VALUES ('Lasagna', 'Lasagna noodles (250 grams), Ground beef or Italian sausage (400 grams), Marinara sauce (500 ml), Ricotta cheese (500 grams), Mozzarella cheese shredded (250 grams), Parmesan cheese grated (100 grams), Egg (1 large), Garlic cloves minced (2), Onion finely chopped (1 medium-sized)', '/media/lasagna.jpeg'),
                ('Tomato Salad', 'Tomatoes (4 large), Red onion (1 medium-sized), Fresh basil leaves (a handful), Balsamic vinegar (2 tablespoons)', '/media/tomato_salad.jpeg'),
                ('Brændende Kærlighed', 'Potatoes (8 medium-sized), Bacon strips (8 slices), Onions (2 large), Butter (100 grams), Milk (1/2 cup)', '/media/braendende_kaerlighed.jpeg'),
                ('Frikadeller', 'Ground pork (500 grams), Onion (1 medium-sized finely chopped), Egg (1), Milk (1/4 cup), Breadcrumbs (1/2 cup)', '/media/frikadeller.jpeg');
                ";
                $conn->exec($sql);     
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

// If all of the above fails, and it can't create databse, error handling:
} catch (PDOException $exception) {
    echo "Database not connected. " . $exception->getMessage();
}