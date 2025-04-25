<?php
//include 'db_connect.php';
//$name = $_GET['id'];
//$conn->query("DELETE FROM teachers WHERE id=$name");
//header("Location: teachers.php");
//exit();



include 'db_connect.php';
$name = $_GET['name'];

// Sanitize to prevent SQL injection
$name = $conn->real_escape_string($name);

$conn->query("DELETE FROM teachers WHERE name='$name'");
header("Location: teachers.php");
exit();
?>