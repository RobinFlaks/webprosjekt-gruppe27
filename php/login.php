<?php

require ('connecting.php');

$studentNr = mysqli_real_escape_string($link, $_REQUEST['studentnr']);
$password = mysqli_real_escape_string($link, $_REQUEST['pass']);

$sql = "SELECT Studentnummer, Passord FROM studor WHERE Studentnummer = '$studentNr' AND Passord = '$password'";
$res = mysqli_query($link, $sql);
if (mysqli_num_rows($res) == 1) {
    
    header('Location: http://localhost:8888/studentreg.html');
} else {
    echo "(fk!)";
}