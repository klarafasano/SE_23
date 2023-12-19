<head>
    <title><?php echo $recipe['title']; ?></title>
    <link rel="stylesheet" href="/styles/recipePage.css">
</head>

<?php
    include_once 'db.php';

    /* Query database to search recipes LIKE the input */
    if (isset($_GET['query'])) {
        $searchQuery = $_GET['query'];
        $query = "SELECT * FROM recipes WHERE title LIKE :searchQuery OR ingredients LIKE :searchQuery";
            /* The actual query (conditions for what to look for) */
        $statement = $connection->prepare($query);
            /* Prepare = Readies query to send (sends when execute=true) */
        $statement->execute(['searchQuery' =>'%' . $searchQuery . '%']);
        $matchingRecipes = $statement->fetchAll(PDO::FETCH_ASSOC);
            /* Makes results an associated array */
        
        /*  */
        if ($matchingRecipes) {
            foreach ($matchingRecipes as $recipe) {
                echo '<a href="recipe_pages.php?id=' . $recipe['recipe_id'] . '">';
                echo '<div class="card flex">';
                    /* recipe cards (as search results) follow same stylesheet as recipeCards + flex-format */
                echo '<h2>' . $recipe['title'] . '</h2></a>';
                echo '<img src="' . $recipe['img_path'] . '" alt="' . $recipe['title'] . '">';
                echo '<p>' . $recipe['ingredients'] . '</p>';
                    /* Insert recipe data for matchingRecipes */
                echo '</div>';
            }
        } else {

        }
    } else {

    }
?>
