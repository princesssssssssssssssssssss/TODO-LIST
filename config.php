<?php
$conn = mysqli_connect("localhost", "root", "", "TODOLISTDAILY");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";
?>
