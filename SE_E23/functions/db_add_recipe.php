<?php
    include 'db.php';
    /* trycatch - define what to try, and how to catch if try fails (send error) */
    try {
        if (isset($_POST['title'], $_POST['ingredients'], $_POST['img_path']) && !empty($_POST['title'])) {
            /* && both conditions must be true */
        $title = $_POST['title'];
        $ingredients = $_POST['ingredients'];
        $imagePath = $_POST['img_path'];
            /* assig post requests to value (fx. title = title input) */
        $sql = "INSERT INTO recipes (title, ingredients, img_path) VALUES (:title,:ingredients,:imgagePath)";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':title',$title);
        $statement->bindParam(':ingredients',$ingredients);
        $statement->bindParam(':imgagePath',$imagePath);
            /* bindParam binds together parameters title, ingreidients & image path */
        $statement->execute();
        }
    } catch (PDOException $e) {
        /* $e exception variable */
        echo 'Try: Failed' . $e->getMessage();
    }
    /* Return to addRecipe page after submission */
    header('Location: ../index.php');
exit;
?>