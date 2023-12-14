<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $teacherId = $_POST['Teacher_ID'];
    $newClassId = $_POST['Class_ID'];
    $newFirstName = $_POST['First_Name'];
    $newLastName = $_POST['Last_Name'];
    $newAddress = $_POST['Address'];
    $newPhoneNumber = $_POST['Phone_number'];
    $newAnnualSalary = $_POST['Annual_salary'];
    $newBackgroundCheck = $_POST['Background_check'];

    // Validate and sanitize input
    $teacherId = mysqli_real_escape_string($conn, $teacherId);
    $newClassId = mysqli_real_escape_string($conn, $newClassId);
    $newFirstName = mysqli_real_escape_string($conn, $newFirstName);
    $newLastName = mysqli_real_escape_string($conn, $newLastName);
    $newAddress = mysqli_real_escape_string($conn, $newAddress);
    $newPhoneNumber = mysqli_real_escape_string($conn, $newPhoneNumber);
    $newAnnualSalary = mysqli_real_escape_string($conn, $newAnnualSalary);
    $newBackgroundCheck = mysqli_real_escape_string($conn, $newBackgroundCheck);

    // Insert teacher's information into the database
    $insertQuery = "INSERT INTO teachers (`Teacher ID`, `Class ID`, `First Name`, `Last Name`, `Address`, `Phone number`, `Annual salary`, `Background check`) 
                    VALUES ('$teacherId', '$newClassId', '$newFirstName', '$newLastName', '$newAddress', '$newPhoneNumber', '$newAnnualSalary', '$newBackgroundCheck')";

    $insertResult = mysqli_query($conn, $insertQuery);

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

    if ($insertResult) {
        // Fetch the inserted teacher's information
        $selectInsertedQuery = "SELECT * FROM teachers WHERE `Teacher ID` = '$teacherId'";
        $selectInsertedResult = mysqli_query($conn, $selectInsertedQuery);

        if ($selectInsertedResult) {
            // Display the inserted teacher's information in a table
            echo "<table>";
            echo "<tr><th>Teacher ID</th><td>" . htmlspecialchars($teacherId) . "</td></tr>";
            echo "<tr><th>Class ID</th><td>" . htmlspecialchars($newClassId) . "</td></tr>";
            echo "<tr><th>First Name</th><td>" . htmlspecialchars($newFirstName) . "</td></tr>";
            echo "<tr><th>Last Name</th><td>" . htmlspecialchars($newLastName) . "</td></tr>";
            echo "<tr><th>Address</th><td>" . htmlspecialchars($newAddress) . "</td></tr>";
            echo "<tr><th>Phone number</th><td>" . htmlspecialchars($newPhoneNumber) . "</td></tr>";
            echo "<tr><th>Annual salary</th><td>" . htmlspecialchars($newAnnualSalary) . "</td></tr>";
            echo "<tr><th>Background_check</th><td>" . htmlspecialchars($newBackgroundCheck) . "</td></tr>";
            echo "</table>";
        } else {
            echo "Error fetching inserted teacher information: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting teacher information: " . mysqli_error($conn);
    }

    }
    ?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
