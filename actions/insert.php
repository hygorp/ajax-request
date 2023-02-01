<?php

$host   = "localhost";
$user   = "hygorp";
$pass   = "Raimundo$123";
$schema = "ajax";
$conn   = mysqli_connect($host, $user, $pass) or die ('Connection Error');

$name   = $_POST["name"];
$age    = $_POST["age"];
$genre  = $_POST["genre"];
$hobbie = $_POST["hobbie"];

$sql = "INSERT INTO person (name, age, genre, hobbie) VALUES ('".$name."', '".$age."', '".$genre."', '".$hobbie."')";
mysqli_select_db($conn, $schema);
mysqli_query($conn, $sql);