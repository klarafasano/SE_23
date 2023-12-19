<!-- DO NOT TOUCH OR UNCOMMENT IN INDEX.PHP! -->

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ezlistdb";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
$sql = "TRUNCATE TABLE recipes";
if ($conn->query($sql) === TRUE) {
  echo "cleared";
} 
} catch(PDOException $e) {
  echo "error " . $e->getMessage();
}
$conn = null;
?>