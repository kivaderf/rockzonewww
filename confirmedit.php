<?php

require "Journ.php";
require "dabase/IStorage.php";
require "dabase/DBStorage.php";

$storage = new DBStorage();

if (isset($_GET['id']) && isset($_POST['editForm'])) {
    echo "ez";
    $storage->edit($_GET['id'], $_POST['title'], $_POST['body']);
    header("Location: /blog");
    exit();
} else {
    include("404.php");
}

?>