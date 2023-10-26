<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "bdpockets";

$db = mysqli_connect($server, $user, $password, $nama_database);

if (!$db)
    die("Hubo un error: " . mysqli_connect_error());
