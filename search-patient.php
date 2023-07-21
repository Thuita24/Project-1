<!DOCTYPE html>
<html>

<head>
    <title>Search for a Patient</title>
    <link rel="stylesheet" type="text/css" href="searchPatient.css">
    <style>
    table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}
</style>
</head>


<body>
    <div class="container">
        <h2>Search for a Patient</h2>
        <form method="POST" action="search-patient.php">
            <label for="Patientname">Patient Name:</label>
            <input type="text" name="Patientname" id="Patientname" required>
            <br>
            <input type="submit" value="Search">
        </form>


<?php
require_once("connect.php");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Patientname'])) { // Check if the key exists in $_POST
        $patientName = $_POST['Patientname'];

        // Perform patient search based on the provided name
        // Modify this section with your own logic to search for patients in the database
        $sql = "SELECT * FROM patient WHERE Patientname LIKE '%$patientName%'";
        $result = $conn->query($sql);

        if ($result === false) {
            echo "Error executing search query: " . $conn->error;
        } else {
            if ($result->num_rows > 0) {
                echo "<h2>Search Results</h2>";
                echo "<table>";
                echo "<tr><th>Patient Name</th><th>SSN</th><th>Contact</th><th>Age</th><th>Address</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Patientname'] . "</td>";
                    echo "<td>" . $row['SSN'] . "</td>";
                    echo "<td>" . $row['Contact'] . "</td>";
                    echo "<td>" . $row['Age'] . "</td>";
                    echo "<td>" . $row['Address'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<h2>No records found for the provided name.</h2>";
            }
        }
    } else {
        echo "<h2>No name provided.</h2>";
    }
}

echo "<a href='home.html'>Go back</a>";
$conn->close();
?>
