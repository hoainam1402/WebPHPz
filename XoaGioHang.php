<?php
session_start();
if (!isset($_SESSION["carts_item"]))
{
    header("Location: shopping_cart.php");
}
session_destroy();
unset($_SESSION["carts_item"]);
header("Location: shopping_cart.php");
?>