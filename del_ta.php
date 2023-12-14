<?php
include 'dbconnect2.php'; // Connect to XAMPP

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get TA ID from the form
    $taID = $_POST['ta_id'];

    // Validate and sanitize input
    $taID = mysqli_real_escape_string($conn, $taID);

    // Perform deletion
    $deleteQuery = "DELETE FROM `teaching assistants` WHERE `TA ID` = '$taID'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Check the number of affected rows
        $affectedRows = mysqli_affected_rows($conn);

        if ($affectedRows > 0) {
            echo "Teaching Assistant records deleted successfully!";
        } else {
            echo "No matching record found for deletion. Please check the TA ID.";
        }
    } else {
        echo "Error deleting Teaching Assistant records: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
