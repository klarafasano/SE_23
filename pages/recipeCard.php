<?php
$query ="SELECT * FROM recipes";
$statement = $connection->query($query);
$recipes = $statement->fetchAll(PDO::FETCH_ASSOC);
session_start();
?>

<html>
    <head>
         <link rel="stylesheet" href="styles/recipeCard.css">
    </head>

    <body>
        <!--Setting up recipes-->
        <div class="recipes">
            <h2>My Recipes</h2>

        <?php
        echo '<a href="pages/add_recipe.php"><button class="addRecipe">Add Recipe</a> </button>';
        // Review recipe data and create a recipeCard for each recipe
        foreach ($recipes as $recipe) {
            echo '<a href="functions/recipe_pages.php?id=' . $recipe['recipe_id'] . '">';
            echo '<div class="card">';
            echo '<img class="img_card" src="' . $recipe['img_path'] . '" alt="' . $recipe['title'] . '">';    
            echo '<h2>' . $recipe['title'] . '</h2></a>';

            // Add "Add to List" button to add ingredients to shopping list
            // Add form with hidden input-field to submit ingredients
            echo '<form method="post" action="/functions/add_to_shopping_list.php">';
            echo '<input type="hidden" name="ingredients" value="' . $recipe['ingredients'] . '">';
            echo '<button type="submit">Add to List</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
        </div>

<!-- SHOPPING LIST -->
        <div class="shopping_list">
            <h2>Shopping List<h2>
        <?php
            /* "??" saves values from session */
            $shoppingList = $_SESSION['shoppingList'] ?? [];
            if (!empty($shoppingList)) {
                /* Unordered List */
                echo '<ul>' ; 
                /* Sets all items in a list (array) */
                foreach ($shoppingList as $item) {
                    echo '<li>' . $item . '</li>';
                }
                echo '</ul>';
            } else {
                echo '<h3>Start adding items to your shopping list!</h3>';
            }
            /* Clear List button */
            echo '<form method="post" action="/functions/clear_shopping_list.php">';
            echo '<button class="clear_button" type="submit">Send List</button>';
            echo '</form>'
        ?>

        </div>


    </body>
</html>



