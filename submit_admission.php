<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "school_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// File upload configuration
$target_dir = "uploads/";  // Ensure this directory exists and is writable

// Function to handle file upload
function uploadFile($file, $target_dir) {
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an image or PDF
    if ($file["size"] > 5000000) {  // Limit file size to 5MB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats (PDF, JPEG, PNG, etc.)
    if ($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only PDF, JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;  // Return the file path
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
    return false;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['full_name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $reg_number = $_POST['reg_number'];
    $school_name = $_POST['school_name'];
    $udise_code = $_POST['udise_code'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $previous_class = $_POST['previous_class'];
    $marks = $_POST['marks'];
    $out_of_marks = $_POST['out_of_marks'];
    $percentage = $_POST['percentage'];
    $exam_roll_no = $_POST['exam_roll_no'];
    $religion = $_POST['religion'];
    $category = $_POST['category'];
    $class_to_admit = $_POST['class_to_admit'];

    // Handling file uploads
    $certificate_1 = uploadFile($_FILES['certificate_1'], $target_dir);
    $certificate_2 = uploadFile($_FILES['certificate_2'], $target_dir);
    $certificate_3 = uploadFile($_FILES['certificate_3'], $target_dir);
    $photo = uploadFile($_FILES['photo'], $target_dir);



    // Prepare SQL query to insert data into the database
    $sql = "INSERT INTO admissions (
        full_name, father_name, mother_name, dob, gender, reg_number, 
        school_name, udise_code, address, contact_number, email, previous_class, 
        marks, out_of_marks, percentage, exam_roll_no, religion, category, 
        class_to_admit, certificate_1, certificate_2, certificate_3, photo
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssssssssdddssssssss", 
            $full_name, $father_name, $mother_name, $dob, $gender, $reg_number, 
            $school_name, $udise_code, $address, $contact_number, $email, $previous_class, 
            $marks, $out_of_marks, $percentage, $exam_roll_no, $religion, $category, 
            $class_to_admit, $certificate_1, $certificate_2, $certificate_3, $photo
        );

        // Execute the query
        if ($stmt->execute()) {
            // Redirect after successful submission
            
			header("Location: print_form.php?admission_id=" . $stmt->insert_id);
exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>