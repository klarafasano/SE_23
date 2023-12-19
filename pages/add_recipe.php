<?php
// Connect to the database
include 'header.html';
?>

<body>
    <div>
        <form method="post" action="../functions/db_add_recipe.php">
            <input class="addRecipe" type="text" id="title" name="title" placeholder="Title">
            <input class="addRecipe" type="text" id="ingredients" name="ingredients" placeholder="Ingredients">
            <input class="addRecipe" type="text" id="img_path" name="img_path" placeholder="/media/imagePath">
            <input class="submit" type="submit" value="submit">
        </form>
    </div>
</body>