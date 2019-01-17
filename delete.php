<?php
/**** Supprimer une randonnée ****/
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reunion_island";

$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

} else {

    $conn->select_db($dbname);
    echo "Connecté";

}


include "check_login.php";

function delete() {

    global $conn;

    $id = $_GET['id'];

    $sql = "DELETE from hiking where id = '$id'";


    $conn -> query($sql);

    header("Location:read.php");
}

delete();