<?php
    /* Set variable ingredients = post request sent from button */
    $ingredients = $_POST['ingredients'];

    /* Adding ingredients to shopping list */
    session_start();
    $shoppingList = $_SESSION['shoppingList'] ?? [];
        /* Is the session SL-array empty? (remember old shopping list) */
    $ingredientList = explode(',', $ingredients);
        /* Exploding ingridient text-block (seperate ingredients by ",") */
    $shoppingList = array_merge($shoppingList, $ingredientList);
        /* Merges existing list with (new) ingredient list (adding, not replacing) */
    $_SESSION['shoppingList'] = $shoppingList;
        /* "Updater" session shopping list */

    /* Redirect to previous location  */
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>