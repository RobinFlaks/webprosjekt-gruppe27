<?php

// Attempt MySQL server connection. Assuming you are running MySQL
$link = mysqli_connect("localhost", "root", "root", "prosjekt");
 
// sjekker forbindelsen
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
