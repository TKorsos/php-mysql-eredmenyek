<?php

namespace traits;

trait Utilities {
    function getViewFile($file) {
        include(__DIR__."/../views/".$file.".php");
    }

    function connectDB() {
        $hostname = "localhost";
        $username = "root";
        $password = "12345";
        $database = "eredmenyek";

        $connection = mysqli_connect($hostname, $username, $password, $database);

        return $connection;
    }
}