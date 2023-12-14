<?php
// Debug at the start of the program
var_dump($_POST);

include 'dbconnect2.php'; // Connect to XAMPP

//Retrieve selected class information about teachers and TAs
$selectedClassName = $_GET['class_name'];

// View teacher information
$viewQuery = "SELECT * FROM class WHERE `class name` = '$selectedClassName'";
$viewResult = mysqli_query($conn, $viewQuery);
?>


<!DOCTYPE html>
<!--Use html to display table output; else no records found-->
<html>
<head>
    <style>
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
    </style>
</head>
<body>

<?php
// Check if there are rows returned
if (mysqli_num_rows($viewResult) > 0) {
    // Display class information in a table
    echo "<table>";
    while ($row = mysqli_fetch_assoc($viewResult)) {
        echo "<tr><th>Class name</th><td>" . htmlspecialchars($row['Class Name']) . "</td></tr>";
        echo "<tr><th>Teacher ID</th><td>" . htmlspecialchars($row['Teacher ID']) . "</td></tr>";
        echo "<tr><th>Teaching Assistants ID</th><td>" . htmlspecialchars($row['TA ID']) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}
?>

<hr>
<br>
<a href="stalphonsus_db.php">Return to Database main page</a>

</body>
</html>
