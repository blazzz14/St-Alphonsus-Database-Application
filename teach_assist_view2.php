<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Retrieve selected teaching assistant ID
$selectedTAId = $_GET['TA_ID'];

// View teaching assistant information
$viewQuery = "SELECT * FROM `teaching assistants` WHERE `TA ID` = '$selectedTAId'";
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
    // Display teaching assistant information in a table
    echo "<table>";

    while ($row = mysqli_fetch_assoc($viewResult)) {
        echo "<tr><th>TA ID</th><td>" . htmlspecialchars($row['TA ID']) . "</td></tr>";
        echo "<tr><th>Teacher ID</th><td>" . htmlspecialchars($row['Teacher ID']) . "</td></tr>";
        echo "<tr><th>Class ID</th><td>" . htmlspecialchars($row['Class ID']) . "</td></tr>";
        echo "<tr><th>First Name</th><td>" . htmlspecialchars($row['First Name']) . "</td></tr>";
        echo "<tr><th>Last Name</th><td>" . htmlspecialchars($row['Last Name']) . "</td></tr>";
        echo "<tr><th>Address</th><td>" . htmlspecialchars($row['Address']) . "</td></tr>";
        echo "<tr><th>Phone number</th><td>" . htmlspecialchars($row['Phone number']) . "</td></tr>";
        echo "<tr><th>Annual salary</th><td>" . htmlspecialchars($row['Annual salary']) . "</td></tr>";
        echo "<tr><th>Background_check</th><td>" . htmlspecialchars($row['Background check']) . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "Error viewing teaching assistant information: " . mysqli_error($conn);
}

echo "<hr><br><a href='stalphonsus_db.php'>Return to Database main page</a></body></html>";
?>
