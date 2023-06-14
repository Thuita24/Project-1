<!DOCTYPE html>
<html>

<head>
  <title>Doctor form</title>
</head>

<body>
  <h1>DOCTOR FORM</h1>
  <form action="addDoctor.php" method="POST" autocomplete="on">
  <div>
      <label for="SSN">SSN: </label>
      <input type="number" id="SSN" name="SSN" placeholder="308" />
    </div>



    <div>
      <label for="Name">Doctor name: </label>
      <input type="text" id="Name" name="Doctor_name" placeholder="Dr.Stella" />
    </div>

    <br />


    

    <div>
      <label for="Specialty">Specialty: </label>
      <input type="text" id="Specialty" name="Specialty" placeholder=" " />
    </div>

    <br />

    <div>
      <label for="YOE">YOE: </label>
      <input type="number" id="YOE" name="YOE" placeholder=" 3" />
    </div>

    <br />

    

    <div>
      <input type="Submit" name="btnsubmit" />
    </div>
  </form>
</body>

</html>