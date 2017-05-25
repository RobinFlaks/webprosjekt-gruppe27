<?php

// Attempt MySQL server connection. Assuming you are running MySQL
$link = mysqli_connect("localhost", "root", "root", "prosjekt");
 
// sjekker forbindelsen
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//ingen bruker inputs
$fornavn = mysqli_real_escape_string($link, $_REQUEST['fornavn']);
$etternavn = mysqli_real_escape_string($link, $_REQUEST['etternavn']);
$studentNr = mysqli_real_escape_string($link, $_REQUEST['studentnr']);
$email = mysqli_real_escape_string($link, 
$_REQUEST['mail']);
$password = mysqli_real_escape_string($link, $_REQUEST['pass']);



if(isset($_REQUEST["student"])){

$sql = "INSERT INTO prosjetk(Studentnummer, fornavn, etternavn, StudentMail, Passord)
VALUES ('$studentNr','$fornavn','$etternavn','$email','$password')";
}



if(isset($_REQUEST["studor"])){

    $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["bilde"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image 
if(isset($_POST["studor"])) {
    $check = getimagesize($_FILES["bilde"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["bilde"]["size"] > 500000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["bilde"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["bilde"]["name"]). " has been uploaded.";
        $bilde = basename( $_FILES["bilde"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} 

 $sql = "INSERT INTO Studor (Studentnummer, fornavn, etternavn, StudentMail, Passord, bilde) VALUES ( '$studentNr', '$fornavn', '$etternavn', '$email', '$password', '$bilde')";     
}



if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header('Location: http://localhost:8888/studentreg.html');
die();
    