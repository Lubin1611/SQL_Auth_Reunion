<?php
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


    $login_valide = (isset($_POST['username'])? $_POST['username']: NULL);

    $pwd = (isset($_POST['password'])? $_POST['password']: NULL);

$pwd = sha1($pwd);

$req = "SELECT * FROM `user` WHERE '$login_valide' = username and '$pwd' = password";

$sql = $conn -> query($req);

$row = $sql->fetch_assoc();

    $login_valide = $row['username'];
    $pwd = $row['password'];


    if (isset($_POST['username']) and isset($_POST['password'])) {

        if ($login_valide == $_POST['username'] && $pwd == sha1($_POST['password'])) {

            session_start();

            $_SESSION['login'] = $_POST['username'];
            $_SESSION['pwd'] = $_POST['password'];


            header('Location:read.php');

        }

        if ($_POST['username'] != $login_valide and $_POST['password'] != $pwd) {


            echo "Pas capable d'ecrire son login !";
    }

    }


$pass = sha1("password");

    echo $pass;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

<form action="login.php" method="post">
    <div>
        <label for="username">Identifiant</label>
        <input type="text" name="username">
    </div>
    <div>
        <label for="password">Mot de passe </label>
        <input type="password" name="password">
    </div>
    <div>
        <button type="submit" name="button">Se connecter</button>
    </div>
</form>
</body>
</html>
