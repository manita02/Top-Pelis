<?php

$conn = new mysqli("localhost", "root", "", "bd_topPelis");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
?>