<?php
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


}

include "check_login.php";


function tableau1() {

    global $conn;

    $tout = "SELECT * from hiking";

    $result = $conn->query($tout);

    echo '<table>';

    echo '<tr><th>id</th><th>Nom</th><th>Difficulté</th><th>distance</th><th>durée</th><th>dénivelé</th></tr>';

    while ($row = $result->fetch_assoc()) {

        $grokk = $row['id'];

        echo "<tr><td>" .

           '<a href ="delete.php?id='. $grokk . '">Supprimer</a>' . $row['id'] . '</td><td><a href ="update.php?id='. $grokk . '">'. $row['name']."</a>" . "</td><td>" . $row['difficulty'] . "</td><td>" . $row['distance'] . "</td><td>" . $row['duration'] . "</td><td>" . $row['height_difference'] . "</td></tr>";
    }
    echo '</table>';
}




?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
      <style>
          body {

              background-image: url("database/mount.jpg");

          }

      </style>
  </head>
  <body>


    <div id = "contentTab">
  <h1>Liste des randonnées</h1>
    <?php tableau1() ?>
    <br><br>
    Pour ajouter une entrée, cliquez <a href="create.php">ici.</a>

    </div>
  </body>
</html>
