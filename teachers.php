<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Teachers Profiles</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<header>
  <h1>Govt. Girls Higher Secondary School Kadipora</h1>
  <p>Empowering Minds, Shaping Futures</p>
</header>
<nav>
  <a href="index.html">Home</a>
  <a href="about.html">About Us</a>
  <a href="academics.html">Academics</a>
  <a href="admissions.html">Admissions</a>
  <a href="content.html">e-content</a>
  <a href="admin/dashboard.php">Admin Panel</a>
</nav>
<div class="section">
<h1>Teacher Profiles</h1>
<?php
$result = $conn->query("SELECT * FROM teachers");
while ($row = $result->fetch_assoc()) {
    echo "<div style='border:1px solid #ccc; padding:10px; margin:10px;'>";
    echo "<strong>Name:</strong> " . $row['name'] . "<br>";
    echo "<strong>Subject:</strong> " . $row['subject'] . "<br>";
	echo "<strong>Designation:</strong> " . $row['designation'] . "<br>";
    echo "<strong>Contact:</strong> " . $row['contact'] . "<br>";
    echo "</div>";
	echo "<div class='action-buttons' style='margin-top:10px;'>
           
			
			<a href='edit_teacher.php?name=" . urlencode($row['name']) . "'>Edit</a>

			<a class='delete' href='delete_teacher.php?name=" . urlencode($row['name']) . "' onclick=\"return confirm('Are you sure you want to delete this teacher?')\">Delete</a>

            </div>";
}
?>
</div>
<footer class="footer">
  <p>GHSS Kadipora, Anantnag | Email: ghsskadipora12@gmail.com</p>
</footer>
</body>
</html>
