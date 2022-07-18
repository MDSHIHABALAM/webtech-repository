<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0001;}
</style>
</head>
<body>  

<?php

$nameErr = $emailErr = $genderErr = $dateofbirtherr = $bloodgrperr = "";
$name = $email = $gender = $comment = $dateofbirth = $bloodgrp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]{2,}$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["dateofbirth"])) {
    $dateofbirth = "";
  } else {
    $dateofbirth = $_POST["dateofbirth"];
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/[1-31][1-12][1958-1998]/$",$dateofbirth)) {
      $dateofbirthErr = "Invalid";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = $_POST["comment"];
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }
  if (empty($_POST["bloodgrp"])) {
    $bloodgrprr = "bloodgrp is required";
  } else {
    $bloodgrp = $_POST["bloodgrp"];
  }
}

?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Date of Birth: <input type="date" name="dateofbirth" value="<?php echo $dateofbirth;?>">
  <span class="error"><?php echo $dateofbirtherr;?></span>
  <br><br>
  Degree: 
  <input type="checkbox" id="lname" name="lname" value=""> SSC
  <input type="checkbox" id="lname" name="lname" value=""> HSC
  <input type="checkbox" id="lname" name="lname" value=""> BSc
  <input type="checkbox" id="lname" name="lname" value=""> MSc
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Blood Group: 
  <select id="Sname" name="bloodgrp"required>
  <option value="A+">A+</option>
  <option value="B+">B+</option>
  <option value="O+">O+</option>
  <option value="AB+">AB+</option>
  </select>
  <span class="error">* <?php echo $bloodgrperr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dateofbirth;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
echo "<br>";
echo $bloodgrp;

?>

</body>
</html>