<?php
/*Program: St Alphonsus database, PHP
*Description: Allows for manipulation of records in the database
*/
include 'dbconnect2.php'; //Connect to XAMPP server
?>

<html>
    <head>
        <title>St Alphonsus Database</title>
        <!--Set the viewport so the page adjusts according to the device-->
        <meta name = "viewport" content= "width=device-width, initial-scale=1">
        <link rel = "stylesheet" href="dbstyle.css">
    </head>
    <body>

        <h1>St Alphonsus Database</h1>

        <nav>
            <ul>
                <li><a href="school_rec.html">View St Alphonsus records</a></li>
                <li><a href="classname.html">Classes</a></li>
                <li><a href="contractors.html">External Contractors</a></li>
                <li><a href="parents.html">Parents/Guardians</a></li>
                <li><a href="pairs_parents.html">Pairs Parents/Guardians</a></li>
                <li><a href="students.html">Students</a></li>
                <li><a href="teachers.html">Teachers</a></li>
                <li><a href="teach_assist.html">Teaching Assistants</a></li>  
                <li><a href="database_metrics3.php">Metrics for DBMS</a></li>  <!--PHP file not HTML just like this one-->            
            </ul>
        </nav>

        <h2>Return to Website Home</h2>
        <a href="StAlphonsusSch.html">Logout</a>

    </body>
</html>
    
