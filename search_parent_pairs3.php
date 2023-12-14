<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    // Get data from the form
    $pairId = $_POST['Pair_ID'];
    $parent1Id = $_POST['Parent1_ID'];
    $parent2Id = $_POST['Parent2_ID'];
    $studentId = $_POST['Student_ID'];

    // Validate and sanitize input
    $pairId = mysqli_real_escape_string($conn, $pairId);
    $parent1Id = mysqli_real_escape_string($conn, $parent1Id);
    $parent2Id = mysqli_real_escape_string($conn, $parent2Id);
    $studentId = mysqli_real_escape_string($conn, $studentId);

    // Construct the SQL query based on the provided search criteria
    $sql = "SELECT * FROM `parent pairs` WHERE 1";

    if (!empty($pairId)) {
        $sql .= " AND `Pair ID` = '$pairId'";
    }

    if (!empty($parent1Id)) {
        $sql .= " AND `Parent 1 ID` = '$parent1Id'";
    }

    if (!empty($parent2Id)) {
        $sql .= " AND `Parent 2 ID` = '$parent2Id'";
    }

    if (!empty($studentId)) {
        $sql .= " AND `Student ID` = '$studentId'";
    }

    // Execute the query and fetch results
    $result = mysqli_query($conn, $sql);

    // Display the results in a table
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

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><th>Pair ID</th><td>" . htmlspecialchars($row['Pair ID']) . "</td></tr>";
                echo "<tr><th>Parent 1 ID</th><td>" . htmlspecialchars($row['Parent 1 ID']) . "</td></tr>";
                echo "<tr><th>Parent 2 ID</th><td>" . htmlspecialchars($row['Parent 2 ID']) . "</td></tr>";
                echo "<tr><th>Student ID</th><td>" . htmlspecialchars($row['Student ID']) . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No records found.";
        }
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }

    echo "</body></html>";
}

?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
