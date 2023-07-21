 <!DOCTYPE html> 
<html>

<head>
    
    <title>Search for a Patient</title>
    <link rel="stylesheet" type="text/css" href="searchPatient.css">
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
        <a href="doctorspage.php">Go back</a>
    </div>
</body>

</html> 