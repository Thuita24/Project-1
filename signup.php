<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .signup-form {
            display: none;
        }
    </style>
    <script>
        function showForm(userType) {
            var signupForms = document.getElementsByClassName('signup-form');
            for (var i = 0; i < signupForms.length; i++) {
                signupForms[i].style.display = 'none';
            }
            document.getElementById(userType + '-form').style.display = 'block';
        }
    </script>
</head>
<body>
    <h2>Sign Up</h2>
    <form method="POST" action="signup.php">
        <label for="usertype">Choose User Type:</label>
        <select name="usertype" id="usertype" onchange="showForm(this.value)">
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
            <option value="admin">Admin</option>
            <option value="pharmacist">Pharmacist</option>
        </select>
        <br>
        <input type="submit" value="Sign Up">
    </form>

    <!-- Patient Sign Up Form -->
    <div id="patient-form" class="signup-form">
        <h3>Patient Sign Up Form</h3>
        <form action="addPatient.php" method="POST" autocomplete="on">
            <div>
                <label for="name">Patient name: </label>
                <input type="text" id="name" name="patient_name" placeholder="Stella" />
            </div>
            <br />
            <div>
                <label for="SSN">SSN: </label>
                <input type="number" id="SSN" name="SSN" placeholder="308" />
            </div>
            <br />
            <div>
                <label for="Contact">Contact: </label>
                <input type="number" id="Contact" name="Contact" placeholder="0712345678" />
            </div>
            <br />
            <div>
                <label for="Age">Age: </label>
                <input type="number" id="Age" name="Age" placeholder="Age" />
            </div>
            <br />
            <div>
                <label for="Address">Address: </label>
                <input type="text" id="Address" name="Address" placeholder="eg. Kilimani" />
            </div>
            <br />
            <div>
                <input type="submit" name="" value="Sign up" />
                <a href="login.php"> Have an account? Login</a>
            </div>
        </form>
    </div>

    <!-- Doctor Sign Up Form -->
    <div id="doctor-form" class="signup-form">
        <h3>Doctor Sign Up Form</h3>
        <form action="addDoctor.php" method="POST" autocomplete="on">
            <div>
                <label for="SSN">SSN: </label>
                <input type="number" id="SSN" name="SSN" placeholder="308" />
            </div>
            <br />
            <div>
                <label for="Name">Doctor name: </label>
                <input type="text" id="Name" name="Doctorname" placeholder="Dr.Stella" />
            </div>
            <br />
            <div>
                <label for="Specialty">Specialty: </label>
                <input type="text" id="Specialty" name="Specialty" placeholder="" />
            </div>
            <br />
            <div>
                <label for="YOE">YOE: </label>
                <input type="number" id="YOE" name="YOE" placeholder="3" />
            </div>
            <br />
            <div>
                <input type="submit" name="" value="Sign up" />
                <a href="login.php"> Have an account? Login</a>
            </div>
        </form>
    </div>

    <!-- Admin Sign Up Form -->
    <div id="admin-form" class="signup-form">
        <h3>Admin Sign Up Form</h3>
        <form action="addAdmin.php" method="POST" autocomplete="on">
            <div>
                <label for="SSN">SSN: </label>
                <input type="number" id="SSN" name="SSN" />
            </div>
            <br />
            <div>
                <label for="admin_name">Admin name: </label>
                <input type="text" id="admin_name" name="admin_name" />
            </div>
            <br />
            <div>
                <input type="submit" name="btnsubmit" />
            </div>
        </form>
    </div>

    <!-- Pharmacist Sign Up Form -->
    <div id="pharmacist-form" class="signup-form">
        <h3>Pharmacist Sign Up Form</h3>
        <form action="addPharmacist.php" method="POST" autocomplete="on">
            <div>
                <label for="SSN">SSN:</label>
                <input type="number" id="SSN" name="SSN">
            </div>
            <br />
            <div>
                <label for="pharmacist_name">Pharmacist name:</label>
                <input type="text" id="pharmacist_name" name="pharmacist_name">
            </div>
            <br />
            <div>
                <input type="submit" name="btnsubmit" />
            </div>
        </form>
    </div>

    <script>
        var userTypeSelect = document.getElementById('usertype');
        userTypeSelect.addEventListener('change', function() {
            var selectedOption = userTypeSelect.value;
            var signupForms = document.getElementsByClassName('signup-form');
            for (var i = 0; i < signupForms.length; i++) {
                signupForms[i].style.display = 'none';
            }
            document.getElementById(selectedOption + '-form').style.display = 'block';
        });
    </script>
</body>
</html>
