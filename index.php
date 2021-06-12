
<?php
require 'config.php';

// define variables and set to empty values

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // $pics = $_FILES["image"]['name'];
  $pics_status = false;
  if(isset($_FILES['image'])){
    // echo $_FILES['image']['tmp_name'];
    $pics = $_FILES["image"]['name'];
    $pics_status = true;

  }

  $fname = str_replace("'","\\'",test_input($_POST["fname"]));
  $lname = str_replace("'","\\'",test_input($_POST["lname"]));
  $level = str_replace("'","\\'",test_input($_POST["level"]));
  $skills = str_replace("'","\\'",test_input($_POST["skills"]));
  
  // $gender = test_input($_POST["gender"]);


  if($fname != "" && $lname != "" && $skills != "" && $pics_status == true){
    // echo "hmmmmmmmmm";
    // echo $fname;
  // $fname = test_input($_POST["fname"]);
  //     $extension  = pathinfo( $_FILES["pics"]["name"], PATHINFO_EXTENSION ); // jpg
  // $pics_stored   = $pics. "." .$extension;

  if(move_uploaded_file($_FILES['image']['tmp_name'], "pics/".basename($_FILES["image"]['name']))){
      echo "Thumbnail Suppied";
      echo "<br>";

    $req = "INSERT INTO nacos_developers (fname,lname, level,skills,pics) VALUES('$fname','$lname','$level','$skills','$pics')";
      $result = $conn->query($req);

      if($result == true){
        echo "You Have Successfully Submitted Your Data to the ------";
        // echo $msg;
      }else{
        echo "ERROR: " . $req . "<br>"  . $conn->error;
      };
  };// end of pics if
  // $msg .= "And Your Account has been Updated"."\r\n";
  }else{
    echo "Please Fill The Form Below As A Nacus Developer";
  }
}else{
  echo "Please Fill the form below";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<!DOCTYPE HTML>  
<html>
<head>
     <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/page-loading-animation.css">
   <link rel="stylesheet" href="css/styles-light.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link href="css/video-js.min.css" rel="stylesheet">
   <link href="css/videos-html.css" rel="stylesheet">
   <link rel="stylesheet" href="css/videojs-seek-buttons.css">
   <link rel="stylesheet" href="css/videojs-errors.css">
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<div class="container">
<p><a href="index-2.php">View Your Info</a></p>


<h2>GROUP 8 FORM</h2>
<p><span class="error">* required field</span></p>
<form action="index.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="fname">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required="">
  </div>
    <div class="form-group">
    <label for="lname">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required="">
  </div>
    <div class="form-group">
    <label for="level">Level</label>
    <input type="text" class="form-control" id="level" name="level" placeholder="level">
  </div>
  <div class="form-group">
    <label for="skills">Skill(s)</label>
    <textarea type="text" class="form-control" id="skills" name="skills"
    placeholder="e.g javascript, ajax,php etc"></textarea>
  </div>

  <div class="form-group">
    <label for="pics">Picture.</label>
    <input type="file" accept="image/*" class="form-control" id="pics" name="image" placeholder="profile pic." required="">
  </div>

  <div class="form-group">
    <label for="matno">Submit</label>
    <input type="submit" class="btn btn-success" >
  </div>

</form>
<?php

// echo "<h2>Your Input:</h2>";
// echo $name;
// echo "<br>";
// echo $email;
// echo "<br>";
// echo $website;
// echo "<br>";
// echo $comment;
// echo "<br>";
// echo $gender;

?>

</div>

</body>
</html>