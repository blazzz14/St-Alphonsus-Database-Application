<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
    // Get data from the form
    $pairId = mysqli_real_escape_string($conn, $_POST['Pair_ID']);
    $parent1Id = mysqli_real_escape_string($conn, $_POST['Parent1_ID']);
    $parent2Id = mysqli_real_escape_string($conn, $_POST['Parent2_ID']);
    $studentId = mysqli_real_escape_string($conn, $_POST['Student_ID']);

    // Validate and sanitize input
    if (empty($pairId) || empty($parent1Id) || empty($parent2Id) || empty($studentId)) {
        echo "All fields are required.";
    } else {
        // Insert new pair ID into the parent pairs table
        $insertQuery = "INSERT INTO `parent pairs`(`Pair ID`, `Parent 1 ID`, `Parent 2 ID`, `Student ID`)
                        VALUES ('$pairId', '$parent1Id', '$parent2Id', '$studentId')";
        
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            echo "Insert successful!";            
        } else {
            echo "Error inserting pair ID: " . mysqli_error($conn);
        }
    }
}
?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>

