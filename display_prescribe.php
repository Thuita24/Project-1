<!DOCTYPE html>
<html>

<head>
    <title>Pharmacist Page</title>
    <link rel="stylesheet" href="admin.css" />

    <style>
        .username {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .logout {
            position: absolute;
            top: 30px;
            right: 10px;
        }
    </style>
</head>

<body>
    <h1>Pharmacist Page</h1>

    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="search" placeholder="Search patient">
        <input type="submit" value="Search">
    </form>

    <?php
    require_once("connect.php");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if a search query is submitted
    if (isset($_GET['search'])) {
        // Retrieve the search query
        $searchQuery = $_GET['search'];

        // Retrieve the prescriptions based on the search query
        $sql = "SELECT SSN,patient_name, drug_name, dosage, date_prescribed, price FROM prescriptions WHERE patient_name LIKE '%$searchQuery%'";
        $result = $conn->query($sql);

        // Check if any prescriptions match the search query
        if ($result->num_rows > 0) {
            // Display the prescriptions table
            echo "<h2>Prescriptions Table</h2>";
            echo "<table>";
            echo "<tr><th>SSN</th><th>Patient Name</th><th>Drug Name</th><th>Dosage</th><th>Date Prescribed</th><th>Price</th><th>Action</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['SSN'] . "</td>";
                echo "<td>" . $row['patient_name'] . "</td>";
                echo "<td>" . $row['drug_name'] . "</td>";
                echo "<td>" . $row['dosage'] . "</td>";
                echo "<td>" . $row['date_prescribed'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td><a href='dispense.php?id=" . $row['patient_name'] . "'><button>Dispense</button></a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<h2>No prescriptions found for the search query.</h2>";
        }
    } else {
        // Retrieve all prescriptions from the database
        $sql = "SELECT SSN,patient_name, drug_name, dosage, date_prescribed, price FROM prescriptions";
        $result = $conn->query($sql);

        // Check if any prescriptions exist in the database
        if ($result->num_rows > 0) {
            // Display the prescriptions table
            echo "<h2>Prescriptions Table</h2>";
            echo "<table>";
            echo "<tr><th>SSN</th><th>Patient Name</th><th>Drug Name</th><th>Dosage</th><th>Date Prescribed</th><th>Price</th><th>Action</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['SSN'] . "</td>";
                echo "<td>" . $row['patient_name'] . "</td>";
                echo "<td>" . $row['drug_name'] . "</td>";
                echo "<td>" . $row['dosage'] . "</td>";
                echo "<td>" . $row['date_prescribed'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td><a href='dispense.php?id=" . $row['patient_name'] . "'><button>Dispense</button></a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<h2>No prescriptions found in the database.</h2>";
        }
    }

    $conn->close();
    ?>

    <a href='doctorspage.php'>Go back</a>
</body>

</html>
