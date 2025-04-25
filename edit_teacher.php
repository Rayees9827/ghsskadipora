<?php
/**
include 'db_connect.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $designation = $_POST['designation'];
    $contact = $_POST['contact'];

    $sql = "UPDATE teachers SET name='$name', subject='$subject', designation='$designation', contact='$contact' WHERE id=$id";
    $conn->query($sql);
    header("Location: teachers.php");
    exit();
}

$result = $conn->query("SELECT * FROM teachers WHERE id=$id");
$row = $result->fetch_assoc();
?>

<h2>Edit Teacher</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
    Subject: <input type="text" name="subject" value="<?= $row['subject'] ?>"><br>
    Designation: <input type="text" name="designation" value="<?= $row['designation'] ?>"><br>
    Contact: <input type="text" name="contact" value="<?= $row['contact'] ?>"><br>
    <input type="submit" value="Update">
</form>
**/

include 'db_connect.php';
$name = $_GET['name']; // Get the teacher's name from the URL
// Sanitize name to prevent SQL injection
$name = $conn->real_escape_string($name);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_name = $_POST['name'];
    $subject = $_POST['subject'];
    $designation = $_POST['designation'];
    $contact = $_POST['contact'];

    // Update the teacher's record where name matches
    $sql = "UPDATE teachers SET name='$new_name', subject='$subject', designation='$designation', contact='$contact' WHERE name='$name'";
    $conn->query($sql);
    header("Location: teachers.php"); // Redirect back to teacher profiles
    exit();
}

// Fetch the teacher's details based on the name
$result = $conn->query("SELECT * FROM teachers WHERE name='$name'");
$row = $result->fetch_assoc();
?>

<h2>Edit Teacher</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
    Subject: <input type="text" name="subject" value="<?= $row['subject'] ?>"><br>
    Designation: <input type="text" name="designation" value="<?= $row['designation'] ?>"><br>
    Contact: <input type="text" name="contact" value="<?= $row['contact'] ?>"><br>
    <input type="submit" value="Update">
</form>
