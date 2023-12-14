<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $taID = $_POST['ta_id'];
    $teacherId = $_POST['teacher_id'];
    $newClassId = $_POST['class_id'];
    $newFirstName = $_POST['first_name'];
    $newLastName = $_POST['last_name'];
    $newAddress = $_POST['address'];
    $newPhoneNumber = $_POST['phone_number'];
    $newAnnualSalary = $_POST['annual_salary'];
    $newBackgroundCheck = $_POST['background_check'];

    // Validate and sanitize input
    $taID = mysqli_real_escape_string($conn, $taID);
    $teacherId = mysqli_real_escape_string($conn, $teacherId);
    $newClassId = mysqli_real_escape_string($conn, $newClassId);
    $newFirstName = mysqli_real_escape_string($conn, $newFirstName);
    $newLastName = mysqli_real_escape_string($conn, $newLastName);
    $newAddress = mysqli_real_escape_string($conn, $newAddress);
    $newPhoneNumber = mysqli_real_escape_string($conn, $newPhoneNumber);
    $newAnnualSalary = mysqli_real_escape_string($conn, $newAnnualSalary);
    $newBackgroundCheck = mysqli_real_escape_string($conn, $newBackgroundCheck);

    // Insert teaching assistant's information into the database
    $insertQuery = "INSERT INTO `teaching assistants`(`TA ID`, `Teacher ID`, `Class ID`, `First Name`, `Last Name`, `Address`, `Phone number`, `Annual salary`, `Background check`) 
                    VALUES ('$taID', '$teacherId', '$newClassId', '$newFirstName', '$newLastName', '$newAddress', '$newPhoneNumber', '$newAnnualSalary', '$newBackgroundCheck')";

    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        // Display new teaching assistant information in a table
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
        echo "<tr><th>TA ID</th><td>" . htmlspecialchars($taID) . "</td></tr>";
        echo "<tr><th>Teacher ID</th><td>" . htmlspecialchars($teacherId) . "</td></tr>";
        echo "<tr><th>Class ID</th><td>" . htmlspecialchars($newClassId) . "</td></tr>";
        echo "<tr><th>First Name</th><td>" . htmlspecialchars($newFirstName) . "</td></tr>";
        echo "<tr><th>Last Name</th><td>" . htmlspecialchars($newLastName) . "</td></tr>";
        echo "<tr><th>Address</th><td>" . htmlspecialchars($newAddress) . "</td></tr>";
        echo "<tr><th>Phone number</th><td>" . htmlspecialchars($newPhoneNumber) . "</td></tr>";
        echo "<tr><th>Annual salary</th><td>" . htmlspecialchars($newAnnualSalary) . "</td></tr>";
        echo "<tr><th>Background check</th><td>" . htmlspecialchars($newBackgroundCheck) . "</td></tr>";
        echo "</table>";

        echo "</body></html>";

        echo "Insert successful!";
    } else {
        echo "Error inserting teaching assistant information: " . mysqli_error($conn);
    }
}
?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
