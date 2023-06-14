<html>
  <head>
    <title>Drugs Form</title>
  </head>

  <body>
    <h1>DRUGS FORM</h1>
    <form action="addDrugs.php" method="POST" autocomplete="on">
      <div>
        <label for="name">trade_name: </label>
        <input type="text" id="trade_name" name="trade_name" />
      </div>

      <br />

      <div>
        <label for="dosage">Dosage: </label>
        <input type="text" id="dosage" name="dosage" />
      </div>

      <br />

      <div>
        <label for="price">price: </label>
        <input type="number" id="price" name="price" />
      </div>

      <br />

      <div>
        <label for="expiry_date">expiry_date: </label>
        <input type="date" id="expiry_date" name="expiry_date" />
      </div>

      <br />

      <div>
        <label for="formula">formula: </label>
        <input type="varchar" id="formula" name="formula" />
      </div>

      <br />

      <div>
        <input type="Submit" name="btnsubmit" />
      </div>
    </form>
  </body>
</html>