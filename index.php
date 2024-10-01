<?php

session_start();

spl_autoload_register( function($file) {
    include("$file.php");
});

use controllers\UserController;

$page = new UserController;

if(!isset($_GET["page"])) {
    $page->kezdolapView();
}
else {
    $getpage = $_GET["page"];
    $page->$getpage();
}


// unset