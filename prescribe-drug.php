<!DOCTYPE html>
<head>
    <!-- ... other code ... -->
    <link rel="stylesheet" type="text/css" href="prescribe-drug.css">
</head>
</html>

<?php
require_once("connect.php");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the list of patients from the database
$sql = "SELECT * FROM patient";
$result = $conn->query($sql);

// Check if any patients exist in the database
if ($result->num_rows > 0) {
    // Display the prescription form
    echo "<h2>Prescribe Drug</h2>";
    echo "<form method='POST' action='process-prescription.php'>";
    echo "<label for='patient'>Patient:</label>";
    echo "<select name='patient' id='patient' required>";
    echo "<option value=''>Select a patient</option>";

    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['SSN'] . "'>" . $row['Patientname'] .  "</option>";
    }

    echo "</select>";
    //echo "<br>";
    //echo "<label for='SSN'>SSN:</label>";
    //echo "<input type='number' name='SSN' id='SSN' required>";

    echo "<br>";
    echo "<label for='drug'>Drug:</label>";
    echo "<input type='text' name='drug' id='drug' required>";
    echo "<br>";
    echo "<label for='dosage'>Dosage:</label>";
    echo "<input type='text' name='dosage' id='dosage' required>";
    echo "<br>";
   // echo "<label for='price'>Price:</label>";
//;echo "<input type='text' name='price' id='price' value='0.00' required>";


    //echo "<br>";
    echo "<input type='submit' value='Prescribe'>";
    echo "</form>";
} else {
    echo "<h2>No patients found in the database.</h2>";
}

echo "<a href='home.html'>Go back</a>";

$conn->close();
?>
