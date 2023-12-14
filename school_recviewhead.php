<?php
include 'dbconnect2.php'; // Connect to XAMPP

// View all records in the st alphonsus1 table
$viewQuery = "SELECT * FROM `st alphonsus1`";
$viewResult = mysqli_query($conn, $viewQuery);
?>

<!DOCTYPE html>
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
    // Display all records in a table
    echo "<table>";
    while ($row = mysqli_fetch_assoc($viewResult)) {
        foreach ($row as $key => $value) {
            echo "<tr><th>$key</th><td>" . htmlspecialchars($value) . "</td></tr>";
        }
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
