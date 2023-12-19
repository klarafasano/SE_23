<?php
// Connect to the database
include_once 'db.php';


// Retrieve recipe ID from the URL query parameter
$recipe_id = $_GET['id'];

// Execute SELECT query to retrieve specific recipe data
$query = "SELECT * FROM recipes WHERE recipe_id = $recipe_id";
$statement = $connection->query($query);
$recipe = $statement->fetch(PDO::FETCH_ASSOC);
?>

<html>

<head>
    <title><?php echo $recipe['title']; ?></title>
    <link rel="stylesheet" type="text/css" href="/styles/recipeCard.css">
</head>
<body>
    <h1><?php echo $recipe['title']; ?></h1>
    <img src="<?php echo $recipe['img_path']; ?>" alt="<?php echo $recipe['title']; ?>">
    <p><?php echo $recipe['ingredients']; ?></p>
</body>

</html>