<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Retrieve form data
$selectedClassName = $_GET['class_name'];
$selectedTeacherId = $_GET['teacher_id'];
$selectedTaId = $_GET['ta_id'];

// View student information based on the selected criteria
$viewQuery = "SELECT `Student ID` FROM class WHERE 
              `Class name` = '$selectedClassName' OR 
              `Teacher ID` = '$selectedTeacherId' OR 
              `TA ID` = '$selectedTaId'";

$viewResult = mysqli_query($conn, $viewQuery);

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

if ($viewResult) {
    // Display student information in a table
    echo "<table>";
    echo "<tr><th>Student ID</th></tr>";

    while ($row = mysqli_fetch_assoc($viewResult)) {
        echo "<tr><td>" . htmlspecialchars($row['Student ID']) . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "Error viewing student information: " . mysqli_error($conn);
}

echo "</body></html>";
?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
