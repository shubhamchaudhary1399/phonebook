<?php

require("includes/common.php");

$contact_id = $_GET['id'];
$name = $_POST['Name'];
$name = mysqli_real_escape_string($con, $name);
$dob = $_POST['DOB'];
$dob = mysqli_real_escape_string($con, $dob);
$contact = $_POST['Mob'];
$contact = mysqli_real_escape_string($con, $contact);
$email = $_POST['Email'];
$email = mysqli_real_escape_string($con, $email);



$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[6789][0-9]{9}$/";

  if (!preg_match($regex_num, $contact)) {
    $m = "<span class='red'>Not a valid phone number</br></span>";
    header('location: addcontact.php?m1=' . $m);   
  } 
  else if (!preg_match($regex_email, $email)) {
    $m = "<span class='red'>Not a valid Email Id</br></span>";
    header('location: addcontact.php?m2=' . $m);
    
  } else {

    $query = "UPDATE contacts SET name = '" . $name . "', dob = '" . $dob . "', contact = '" . $contact . "', email = '" . $email . "' WHERE id = '$contact_id'";
    mysqli_query($con, $query) or die(mysqli_error($con));
    
    header('location: index.php');
  }
?>
