<?php
include 'dbconnect2.php'; // Connect to XAMPP

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get Parent ID from the form
    $parentID = $_POST['Guardian_ID'];

    // Validate and sanitize input
    $parentID = mysqli_real_escape_string($conn, $parentID);

    // Perform deletion
    $deleteQuery = "DELETE FROM `parents` WHERE `Guardian ID` = '$parentID'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Check the number of affected rows
        $affectedRows = mysqli_affected_rows($conn);

        if ($affectedRows > 0) {
            echo "Parent records deleted successfully!";
        } else {
            echo "No matching record found for deletion. Please check the Parent ID.";
        }
    } else {
        echo "Error deleting parent records: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
