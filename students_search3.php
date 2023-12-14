<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    // Get data from the form
    $studentId = $_POST['student_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $teacherId = $_POST['teacher_id'];
    $taId = $_POST['ta_id'];
    $className = $_POST['class_name'];
    $parentId = $_POST['parent_id'];

    // Validate and sanitize input
    $studentId = mysqli_real_escape_string($conn, $studentId);
    $firstName = mysqli_real_escape_string($conn, $firstName);
    $lastName = mysqli_real_escape_string($conn, $lastName);
    $teacherId = mysqli_real_escape_string($conn, $teacherId);
    $taId = mysqli_real_escape_string($conn, $taId);
    $className = mysqli_real_escape_string($conn, $className);
    $parentId = mysqli_real_escape_string($conn, $parentId);

    // Construct the SQL query based on the provided search criteria
    $sql = "SELECT * FROM students WHERE 1";

    if (!empty($studentId)) {
        $sql .= " AND `Student ID` = '$studentId'";
    }

    if (!empty($firstName)) {
        $sql .= " AND `First Name` = '$firstName'";
    }

    if (!empty($lastName)) {
        $sql .= " AND `Last Name` = '$lastName'";
    }

    if (!empty($teacherId)) {
        $sql .= " AND `Teacher ID` = '$teacherId'";
    }

    if (!empty($taId)) {
        $sql .= " AND `TA ID` = '$taId'";
    }

    if (!empty($className)) {
        $sql .= " AND `Class name` = '$className'";
    }

    if (!empty($parentId)) {
        $sql .= " AND `Parent Pair ID` = '$parentId'";
    }

    // Execute the query and fetch results
    $result = mysqli_query($conn, $sql);

    // Display the results or handle as needed
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
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

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<table>";
                echo "<tr><th>Student ID</th><td>" . htmlspecialchars($row['Student ID']) . "</td></tr>";
                echo "<tr><th>First Name</th><td>" . htmlspecialchars($row['First Name']) . "</td></tr>";
                echo "<tr><th>Last Name</th><td>" . htmlspecialchars($row['Last Name']) . "</td></tr>";
                echo "<tr><th>Teacher ID</th><td>" . htmlspecialchars($row['Teacher ID']) . "</td></tr>";
                echo "<tr><th>TA ID</th><td>" . htmlspecialchars($row['TA ID']) . "</td></tr>";
                echo "<tr><th>Class Name</th><td>" . htmlspecialchars($row['Class name']) . "</td></tr>";
                echo "<tr><th>Parent Pair ID</th><td>" . htmlspecialchars($row['Parent Pair ID']) . "</td></tr>";
                echo "</table>";
            }

            echo "</body></html>";
        } else {
            echo "No records found.";
        }
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
}
?>
<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
