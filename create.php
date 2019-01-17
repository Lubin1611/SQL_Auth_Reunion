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
// Selectionner la base à utiliser
    $conn->select_db($dbname);
    echo "Connecté";
}

include "check_login.php";

    global $conn;

    $ajoutEl = "INSERT INTO `hiking` (`name`, `difficulty`, `distance`, `duration`, `height_difference`) VALUES (?, ?, ?, ?, ?)";


    if (isset($_POST['difficulty']) and isset($_POST['distance']) and isset($_POST['duration']) and isset($_POST['height_difference']) and isset($_POST['name'])) {

        $recup1 = $_POST['name'];
        $recup2 = $_POST['difficulty'];
        $recup3 = $_POST['distance'];
        $recup4 = $_POST['duration'];
        $recup5 = $_POST['height_difference'];

        $connection = $conn->prepare($ajoutEl);

        $connection->bind_param('ssisi',$recup1, $recup2, $recup3, $recup4, $recup5);



        $connection->execute();
        var_dump($connection);

        $connection->close();

    }


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
	<form action="create.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
