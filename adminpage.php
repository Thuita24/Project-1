<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php'); // Redirect to the login page if not logged in
    exit;
}

// Retrieve the logged-in user's username
$username = $_SESSION['username'];

// Logout logic
if (isset($_GET['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header('Location: login.php');
    exit;
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Admin Page</title>
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
    <h1>Welcome to the admin page</h1>
    <div class="username">Logged in as: <?php echo $username; ?></div>
    <a class="logout" href="?logout">Logout</a>
    <!-- Rest of your HTML code -->
    


    <?php
    require_once("connect.php");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to display records
    function displayRecords($tableName, $conn)
    {
        $sql = "SELECT * FROM $tableName";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                echo "<h2>$tableName Table</h2>";
                echo "<table>";
                echo "<tr><th>SSN</th>";

                if ($tableName === "patient") {
                    echo "<th>Patient Name</th>";
                    echo "<th>Contact</th>";
                    echo "<th>Age</th>";
                    echo "<th>Address</th>";
                } elseif ($tableName === "admin") {
                    echo "<th>admin_name</th>";
                } elseif ($tableName === "doctor") {
                    echo "<th>Doctor Name</th>";
                    echo "<th>Specialty</th>";
                    echo "<th>Years of Experience</th>";
                }

                echo "<th>Actions</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['SSN'] . "</td>";

                    if ($tableName === "patient") {
                        echo "<td>" . $row['Patientname'] . "</td>";
                        //echo "<td>" . $row['SSN'] . "</td>";
                        echo "<td>" . $row['Contact'] . "</td>";
                        echo "<td>" . $row['Age'] . "</td>";
                        echo "<td>" . $row['Address'] . "</td>";
                    } elseif ($tableName === "admin") {
                        //echo "<td>" . $row['SSN'] . "</td>";
                        echo "<td>" . $row['admin_name'] . "</td>";
                    } elseif ($tableName === "doctor") {
                        echo "<td>" . $row['Doctorname'] . "</td>";
                        //echo "<td>" . $row['SSN'] . "</td>";
                        echo "<td>" . $row['Specialty'] . "</td>";
                        echo "<td>" . $row['YOE'] . "</td>";
                    }

                    echo "<td>";
                    echo "<a href='edit.php?table=$tableName&id=" . $row['SSN'] . "'>Edit</a> | ";
                    echo "<a href='delete.php?table=$tableName&id=" . $row['SSN'] . "'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<h2>No records found in $tableName table.</h2>";
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Display patient records
    displayRecords("patient", $conn);
    echo "<br>";

    // Display admin records
    displayRecords("admin", $conn);
    echo "<br>";

    // Display doctor records
    displayRecords("doctor", $conn);

    $conn->close();
    ?>

    <h2>Add New Record</h2>
    <form method="POST" action="add.php">
        <label for="table">Select Table:</label>
        <select name="table" id="table">
            <option value="patient">Patient</option>
            <option value="admin">Admin</option>
            <option value="doctor">Doctor</option>
        </select>
        <br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="ssn">SSN:</label>
        <input type="text" name="ssn" id="ssn" required>
        <br>
        <label for="contact">Contact:</label>
        <input type="text" name="contact" id="contact">
        <br>
        <label for="age">Age:</label>
        <input type="text" name="age" id="age">
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address">
        <br>
        <input type="submit" value="Add">
    </form>
</body>

</html>