<?php
// подключение библиотек
require "inc/lib.inc.php";
require "inc/config.inc.php";

$id = clearInt($_GET['id']);

if ($id) {
    addToBasket($id);
    header("Location: catalog.php");
    exit;
}