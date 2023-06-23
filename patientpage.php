<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the value of the name field
    $Name = $_POST['Name'];

    // Do something with the name variable
    echo "Name: " . $Name;
} else {
    $Name = "Noname"; // Set a default value for $Name if it's not submitted
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Logged in</title>
    <style>
        .username-container {
            position: fixed;
            top: 0;
            right: 0;
            padding: 10px;
            background-color: #f1f1f1;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="username-container">
        Name: <?php echo $Name; ?>
    </div>

    <!-- Rest of your HTML content -->
    <h1>Welcome to the patient page!</h1>
    <form action="login.php" method="POST" autocomplete="on">
</body>

</html>