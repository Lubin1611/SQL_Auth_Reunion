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
    echo "Connecté";

}

include "check_login.php";



function pfff()
{

    global $conn;

    $id = (isset($_GET['id']) ? $_GET['id'] : null);
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    $reskk = "SELECT * FROM hiking WHERE id = '$id'";

    $result = $conn->query($reskk);

    while ($row = $result->fetch_assoc()) {

        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Ajouter une randonnée</title>
            <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
            <style>
                body {

                    background-image: url("database/mount.jpg");

                }

            </style>
        </head>
        <body>
        <a href="read.php">Liste des données</a>
        <h1>Ajouter</h1>
        <form action="update.php" method="post">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" value="<?= $row['name']; ?>">
            </div>

            <div>
                <label for="difficulty">Difficulté</label>
                <select name="difficulty">
                    <option selected="selected"><?= $row['difficulty']; ?></option>
                    <option value="très facile">Très facile</option>
                    <option value="facile">Facile</option>
                    <option value="moyen">Moyen</option>
                    <option value="difficile">Difficile</option>
                    <option value="très difficile">Très difficile</option>
                </select>
            </div>

            <div>
                <label for="distance">Distance</label>
                <input type="text" name="distance" value="<?= $row['distance']; ?>">
            </div>
            <div>
                <label for="duration">Durée</label>
                <input type="duration" name="duration" value="<?= $row['duration']; ?>">
            </div>
            <div>
                <label for="height_difference">Dénivelé</label>
                <input type="text" name="height_difference" value="<?= $row['height_difference']; ?>">
            </div>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="submit" name="button" value="Envoyer">
        </form>
        </body>
        </html>

        <?php
    }
}

pfff();

function envoiModif() {

    global $conn;
   // global $id;

    if (isset($_POST['name']) and isset($_POST['difficulty']) and isset($_POST['distance']) and isset($_POST['duration']) and isset($_POST['height_difference'])) {

        $id = $_POST['id'];
        $recupName = $_POST['name'];
        $recupDifficulty = $_POST['difficulty'];
        $recupDistance = $_POST['distance'];
        $recupDuration = $_POST['duration'];
        $recupHeight = $_POST['height_difference'];

        $lqs = "UPDATE hiking set `name` = '$recupName', `difficulty` = '$recupDifficulty', `distance` = '$recupDistance', `duration` = '$recupDuration', `height_difference` = '$recupHeight' where id = $id";

        echo $lqs;

        $conn->query($lqs);
    }
}

envoiModif();
?>


