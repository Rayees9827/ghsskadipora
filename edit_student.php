<?php
include 'db_connect.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];

    $sql = "UPDATE students SET name='$name', class='$class', gender='$gender', contact='$contact' WHERE id=$id";
    $conn->query($sql);
    header("Location: students.php");
    exit();
}

$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();
?>

<h2>Edit Student</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
    Class: <input type="text" name="class" value="<?= $row['class'] ?>"><br>
    Gender: <input type="text" name="gender" value="<?= $row['gender'] ?>"><br>
    Contact: <input type="text" name="contact" value="<?= $row['contact'] ?>"><br>
    <input type="submit" value="Update">
</form>
