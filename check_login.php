<?php
//Check if credentials are valid

if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {

    echo 'Votre login est '.$_SESSION['login'].' et votre mot de passe est '.$_SESSION['pwd'].'.';

    echo '<a href="logout.php">Déconnection</a>';
}