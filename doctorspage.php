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

// Check if the logged-in user is a patient
$isPatient = false; // Set to true if the user is a patient

// Implement your logic here to determine if the logged-in user is a patient
// For example, you can check the user's role or database table to identify a patient

// Redirect the patient to their prescription page
if ($isPatient) {
    header('Location: prescription.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: crimson;
  }
  
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  
  h2 {
    text-align: center;
    color: #333333;
  }
  
  .actions {
    
    margin-top: 20px;
  }
  
  h3 {
    color: #333333;
  }
  
  ul {
    list-style-type: none;
    padding: 0;
  }
  
  li {
    margin-bottom: 10px;
  }
  
  a {
    color: blueviolet;
    text-decoration: underline;
  }
  
  a:hover {
    color: green;

  }

  

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
    <title>Doctor Home Page</title>
    <!-- <link rel="stylesheet" type="text/css" href="doctors.css"> -->
</head>

<body>
    <div class="container">
        <h2>Welcome, Doctor!</h2>
        <div class="username">Logged in as: <?php echo $username; ?></div>
        <a class="logout" href="?logout">Logout</a>
        <div class="actions">
            <h3>Actions:</h3>
            <ul>
                <li><a href="searchpatient.php">Search for a Patient</a></li>
                <li><a href="prescribe-drug.php">Prescribe a Drug</a></li>
            </ul>
        </div>
    </div>
</body>

</html>