<?php
$servername = "148.66.138.145";
$username = "dbusrShnkr23";
$password = "studDBpwWeb2!";
$dbname = "dbShnkr23stud2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>