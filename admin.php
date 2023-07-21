<!DOCTYPE html>
<html>

<head>
  <title>Admin form</title>
</head>

<body>
  <h1>Admin FORM</h1>
  <form action="addAdmin.php" method="POST" autocomplete="on">
    <div>
      <label for="SSN">SSN: </label>
      <input type="number" id="SSN" name="SSN" />
    </div>

    <br />

    <div>
      <label for="admin_name">Admin name: </label>
      <input type="text" id="admin_name" name="admin_name"  />
    </div>

    <br />

    

    <div>
      <input type="Submit" name="btnsubmit" />
    </div>
  </form>
</body>

</html>