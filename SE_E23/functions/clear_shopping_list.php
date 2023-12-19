<?php
session_start();

// Clear shopping list
unset($_SESSION['shoppingList']);

/* Redirect to previous location  */
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>