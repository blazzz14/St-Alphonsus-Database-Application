<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $StudentId = $_POST['Student_Id'];
    $newFirstName = $_POST['First_Name'];
    $newLastName = $_POST['Last_Name'];
    $newTeacherId = $_POST['Teacher_ID'];
    $newTaId = $_POST['Teaching_Assistant_ID'];
    $newClassName = $_POST['Class_name'];
    $newParentId = $_POST['Parent_ID'];

    // Validate and sanitize input
    $StudentId = mysqli_real_escape_string($conn, $StudentId);
    $newFirstName = mysqli_real_escape_string($conn, $newFirstName);
    $newLastName = mysqli_real_escape_string($conn, $newLastName);
    $newTeacherId = mysqli_real_escape_string($conn, $newTeacherId);
    $newTaId = mysqli_real_escape_string($conn, $newTaId);
    $newClassName = mysqli_real_escape_string($conn, $newClassName);
    $newParentId = mysqli_real_escape_string($conn, $newParentId);

    // Insert student information into the database
    $insertQuery = "INSERT INTO `students`(`Student ID`, `First Name`, `Last Name`, `Teacher ID`, `TA ID`, `Class name`, `Parent Pair ID`)
                    VALUES ('$StudentId','$newFirstName','$newLastName','$newTeacherId','$newTaId','$newClassName','$newParentId')";
    
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        // Display the inserted information in a table
        echo "<html><head><style>
                table {
                    font-family: Arial, sans-serif;
                    border-collapse: collapse;
                    width: 50%;
                }

                th, td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }

                th {
                    background-color: #f2f2f2;
                }
            </style></head><body>";

        echo "<table>";
        echo "<tr><th>Student ID</th><td>" . htmlspecialchars($StudentId) . "</td></tr>";
        echo "<tr><th>First Name</th><td>" . htmlspecialchars($newFirstName) . "</td></tr>";
        echo "<tr><th>Last Name</th><td>" . htmlspecialchars($newLastName) . "</td></tr>";
        echo "<tr><th>Teacher ID</th><td>" . htmlspecialchars($newTeacherId) . "</td></tr>";
        echo "<tr><th>TA ID</th><td>" . htmlspecialchars($newTaId) . "</td></tr>";
        echo "<tr><th>Class Name</th><td>" . htmlspecialchars($newClassName) . "</td></tr>";
        echo "<tr><th>Parent Pair ID</th><td>" . htmlspecialchars($newParentId) . "</td></tr>";
        echo "</table>";

        echo "Insert successful!";
    } else {
        echo "Error inserting student information: " . mysqli_error($conn);
    }

    echo "</body></html>";
}
?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
