<?php
include 'db_connect.php';

// Retrieve the admission ID from the URL
$admission_id = $_GET['admission_id'];

// Fetch the admission data from the database
$sql = "SELECT * FROM admissions WHERE admission_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $admission_id);
$stmt->execute();
$result = $stmt->get_result();
$admission_data = $result->fetch_assoc();

// Close the statement
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Admission Form</title>
    <style>
        /* Add your styling here */
    </style>
</head>
<body>
    <h1>Admission Form - GHSS Kadipora, Anantnag </h1>

<div class="section">
    <h2>Student Information</h2>
    <div class="form-group">
        <label for="full_name">Full Name:</label> <?php echo $admission_data['full_name']; ?>
    </div>
    <div class="form-group">
        <label for="father_name">Father's Name:</label>
        <p><?php echo $admission_data['father_name']; ?></p>
    </div>
    <div class="form-group">
        <label for="mother_name">Mother's Name:</label>
        <p><?php echo $admission_data['mother_name']; ?></p>
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <p><?php echo $admission_data['dob']; ?></p>
    </div>
    <div class="form-group">
        <label for="gender">Gender:</label>
        <p><?php echo $admission_data['gender']; ?></p>
    </div>
    <div class="form-group">
        <label for="reg_number">Registration Number:</label>
        <p><?php echo $admission_data['reg_number']; ?></p>
    </div>
    <div class="form-group">
        <label for="school_name">School Name:</label>
        <p><?php echo $admission_data['school_name']; ?></p>
    </div>
    <div class="form-group">
        <label for="udise_code">UDISE Code:</label>
        <p><?php echo $admission_data['udise_code']; ?></p>
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <p><?php echo $admission_data['address']; ?></p>
    </div>
    <div class="form-group">
        <label for="contact_number">Contact Number:</label>
        <p><?php echo $admission_data['contact_number']; ?></p>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <p><?php echo $admission_data['email']; ?></p>
    </div>
    <div class="form-group">
        <label for="previous_class">Previous Class:</label>
        <p><?php echo $admission_data['previous_class']; ?></p>
    </div>
    <div class="form-group">
        <label for="marks">Marks Obtained:</label>
        <p><?php echo $admission_data['marks']; ?></p>
    </div>
    <div class="form-group">
        <label for="out_of_marks">Out of Marks:</label>
        <p><?php echo $admission_data['out_of_marks']; ?></p>
    </div>
    <div class="form-group">
        <label for="percentage">Percentage:</label>
        <p><?php echo $admission_data['percentage']; ?></p>
    </div>
    <div class="form-group">
        <label for="exam_roll_no">Exam Roll No:</label>
        <p><?php echo $admission_data['exam_roll_no']; ?></p>
    </div>
    <div class="form-group">
        <label for="religion">Religion:</label>
        <p><?php echo $admission_data['religion']; ?></p>
    </div>
    <div class="form-group">
        <label for="category">Category:</label>
        <p><?php echo $admission_data['category']; ?></p>
    </div>
    <div class="form-group">
        <label for="class_to_admit">Class to Admit:</label>
        <p><?php echo $admission_data['class_to_admit']; ?></p>
    </div>
</div>





    <h2>Uploaded Documents</h2>
    <p><strong>Certificate 1:</strong> <a href="<?php echo $admission_data['certificate_1']; ?>" target="_blank">View Certificate 1</a></p>
    <p><strong>Certificate 2:</strong> <a href="<?php echo $admission_data['certificate_2']; ?>" target="_blank">View Certificate 2</a></p>
    <p><strong>Certificate 3:</strong> <a href="<?php echo $admission_data['certificate_3']; ?>" target="_blank">View Certificate 3</a></p>
    <p><strong>Photograph:</strong> <a href="<?php echo $admission_data['photo']; ?>" target="_blank">View Photograph</a></p>

    <button onclick="window.print()">Print this form</button>
	
	  <!-- Exit Button -->
        <button class="exit-btn" onclick="window.location.href='index.html';">Exit</button>
    </div>

    <script>
        window.print(); // Automatically opens the print dialog when the page loads
    </script>
</body>
</html>
