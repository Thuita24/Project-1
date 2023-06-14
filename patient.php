<!DOCTYPE html>
<html>

<head>
  <title>Patient form</title>
</head>

<body>
  <h1>PATIENT FORM</h1>
  <form action="addPatients.php" method="POST" autocomplete="on">
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
      <input type="text" id="Address" name="Address" placeholder="eg.Kilimani" />
    </div>

    <br />

    <div>
      <input type="Submit" name="btnsubmit" />
    </div>
  </form>
</body>

</html>