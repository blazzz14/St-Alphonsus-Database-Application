<?php
include 'dbconnect2.php'; // Connect to XAMPP

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get Teacher ID from the form
    $teacherID = $_POST['Teacher_ID'];

    // Validate and sanitize input
    $teacherID = mysqli_real_escape_string($conn, $teacherID);

    // Perform deletion
    $deleteQuery = "DELETE FROM `teachers` WHERE `Teacher ID` = '$teacherID'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Check the number of affected rows
        $affectedRows = mysqli_affected_rows($conn);

        if ($affectedRows > 0) {
            echo "Teacher records deleted successfully!";
        } else {
            echo "No matching record found for deletion. Please check the Teacher ID.";
        }
    } else {
        echo "Error deleting teacher records: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
