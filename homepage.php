<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Website Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: purple;
}
</style>
</head>
<body>



<div class="topnav">
  <a href="#">Signup</a>
  <a href="#">Login</a>
  <a href="#">Home</a>
</div>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<style>
img {
  width: 100px;
  height: 200px;
  object-fit: cover;
}
</style>
</head>
<body>



<img src="pillpal-logo.jpg"  alt="logo" width="200" height="100" class="image-style" >

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Transforming Healthcare</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #bb008b;
  
  padding: 20px;
  text-align: L;
}
</style>
</head>
<body>

<div class="left">
  <h1>Transforming Healthcare</h1>
  <p>A cutting-edge drug dispensing tool designed to streamline medication<br> administration like never before.Get Started Today and unlock the power<br> of efficient and accurate medicine management.</br></p>
</div>

</body>
</html>


<!DOCTYPE html>
<html>
<head>
<style>
.button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #4CAF50;
  color:black;
  text-decoration: none;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}

.button:hover {
  background-color: #45a049;
}
</style>
</head>
<body>

<a href="your-link-here" class="SIGN UP">SIGN UP</a>

</body>
</html>

























<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pillpal";


$conn = new mysqli($servername, $username, $password, $dbname);

/*if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);

}
echo "Connected successfully";*/
?>









