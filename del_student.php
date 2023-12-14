<?php
include 'dbconnect2.php'; // Connect to XAMPP

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get Student ID from the form
    $studentID = $_POST['Student_Id'];

    // Validate and sanitize input
    $studentID = mysqli_real_escape_string($conn, $studentID);

    // Perform deletion
    $deleteQuery = "DELETE FROM `students` WHERE `Student ID` = '$studentID'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Check the number of affected rows
        $affectedRows = mysqli_affected_rows($conn);

        if ($affectedRows > 0) {
            echo "Student records deleted successfully!";
        } else {
            echo "No matching record found for deletion. Please check the Student ID.";
        }
    } else {
        echo "Error deleting student records: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
