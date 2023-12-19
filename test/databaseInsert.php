<?php
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
    VALUES ('Broccolisalat', '2½ dl fraiche, tsk rødvinseddike, 1½ spsk sukker, 300 g bacon i meget små tern, 800 g broccoli i meget små buketter, 1 rødløg i meget små tern (ca. 100 g),1½ dl solsikkekerner, 1½ dl rosiner', '/media/broccolisalat.jpg'), ('Frikadeller', '600 g hakket grise- og kalvekoed (ca. 6% fedt), 1 1/2 tsk fint salt, 2 finthakket eller revet zittauerloeg (ca. 150 g), 2 aeg, Friskkvaernet peber, 2 dl maelk, 40 g finvalsede havregryn (ca. 1 dl)', '/media/frikadeller.jpg');
    ";
    
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close connection
$conn = null;
?>