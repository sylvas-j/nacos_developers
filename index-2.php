<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/page-loading-animation.css">
   <link rel="stylesheet" href="css/styles-light.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
   <link rel="styleshee`t" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link href="css/video-js.min.css" rel="stylesheet">
   <link href="css/videos-html.css" rel="stylesheet">
   <link rel="stylesheet" href="css/videojs-seek-buttons.css">
   <link rel="stylesheet" href="css/videojs-errors.css">
</head>

<body>
<div class="container">
  <p><a href="index.php">Enter Your Info Here</a></p>

<form action="index-2.php" method="post">
<label for="action">Select Action</label>
  <div class="form-group">
    <select class="custom-select" id="action" name="action" required>
      <option value="ok">Query Database</option>
      <option value="all_fname">Select All First Name</option>
      <option value="all_lname">Select All Last Name</option>
      <option value="all_skills">Select All Skills</option>
      <option value="all">Query The Whole Database</option>
      
    </select>
  </div>
    <div class="form-group">
    <!-- <label for="matno">Submit.</label> -->
    <input type="submit" class="btn btn-success" >
  </div>
</form>

</div>



<?php
require 'config.php';
// define variables and set to empty values

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $action = test_input($_POST["action"]);
    // $gender = test_input($_POST["gender"]);

  if($action == "all"){
    $sub_status = "SELECT * FROM nacos_developers";
    $status = $conn->query($sub_status);
    if($status == true){
      echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Level</th>
      <th scope="col">Skill(s)</th>
      <th scope="col">Pics</th>
    </tr>
  </thead>
    <tbody>';
      while($row = $status->fetch_assoc()){
        // echo $row['fname'];
echo '
    <tr>
      <td scope="row">'.$row['id'].'</th>
      <td>'.$row['fname'].'</td>
      <td>'.$row['lname'].'</td>
      <td>'.$row['level'].'</td>
      <td>'.$row['skills'].'</td>
      <td><img src="pics/'.$row['pics'].'" width=100 height=100></td>
    </tr>';
      };
echo '
  </tbody>
</table>';

    }else{
      echo "Please Fill The Form Below As A Nacus Developer";
    }
  }elseif($action == "all_fname"){
        $sub_status = "SELECT * FROM nacos_developers";
    $status = $conn->query($sub_status);
    if($status == true){
      echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
    </tr>
  </thead>
    <tbody>';
      while($row = $status->fetch_assoc()){
        // echo $row['fname'];
echo '
    <tr>
      <td scope="row">'.$row['id'].'</th>
      <td scope="row">'.$row['fname'].'</td>
    </tr>';
      };
echo '
  </tbody>
</table>';

    }else{
      echo "Please Fill The Form Below To Be Identify In Dr Igiri Class";
    }
  }elseif($action == "all_lname"){
        $sub_status = "SELECT * FROM nacos_developers";
    $status = $conn->query($sub_status);
    if($status == true){
      echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Last Name</th>
    </tr>
  </thead>
    <tbody>';
      while($row = $status->fetch_assoc()){
        // echo $row['fname'];
echo '
    <tr>
      <td scope="row">'.$row['id'].'</th>
      <td>'.$row['lname'].'</td>
    </tr>';
      };
echo '
  </tbody>
</table>';

    }else{
      echo "Please Fill The Form Below To Be Identify In Dr Igiri Class";
    }
  }elseif($action == "all_skills"){
        $sub_status = "SELECT * FROM nacos_developers";
    $status = $conn->query($sub_status);
    if($status == true){
      echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Skills</th>
    </tr>
  </thead>
    <tbody>';
      while($row = $status->fetch_assoc()){
        // echo $row['mat_no'];
echo '
    <tr>
      <td scope="row">'.$row['id'].'</th>
      <td>'.$row['skills'].'</td>
    </tr>';
      };
echo '
  </tbody>
</table>';

    }else{
      echo "Please Fill The Form Below To Be Identify In Dr Igiri Class";
    }
  }else{
  echo "Please Select Action From The Dropdown Box";
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








</body>
