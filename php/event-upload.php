<?php

require ('connecting.php');

$tittel = mysqli_real_escape_string($link, $_REQUEST['tittel']);
$beskrivelse = mysqli_real_escape_string($link, $_REQUEST['beskrivelse']);

require('image-upload.php');

$sql = "INSERT INTO event(tittel, beskrivelse, bilde) VALUES ('$tittel', '$beskrivelse', '$bilde')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
    header('location: http//localhost:8888/studentreg.html');
    die();