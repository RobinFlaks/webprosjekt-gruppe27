<?php

require ('connecting.php');

//ingen bruker inputs
$fornavn = mysqli_real_escape_string($link, $_REQUEST['fornavn']);
$etternavn = mysqli_real_escape_string($link, $_REQUEST['etternavn']);
$studentNr = mysqli_real_escape_string($link, $_REQUEST['studentnr']);
$email = mysqli_real_escape_string($link, 
$_REQUEST['mail']);
$password = mysqli_real_escape_string($link, $_REQUEST['pass']);


//sjekker om det er en student som registrerer seg
if(isset($_REQUEST["student"])){

$sql = "INSERT INTO prosjetk(Studentnummer, fornavn, etternavn, StudentMail, Passord)
VALUES ('$studentNr','$fornavn','$etternavn','$email','$password')";
}


//sjekker om det er en studor som registrerer seg
if(isset($_REQUEST["studor"])){

    require ('image.upload.php');

 $sql = "INSERT INTO Studor (Studentnummer, fornavn, etternavn, StudentMail, Passord, bilde) VALUES ( '$studentNr', '$fornavn', '$etternavn', '$email', '$password', '$bilde')";     
}



if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header('Location: http://localhost:8888/studentreg.html');
die();
    