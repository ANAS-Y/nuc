<?php
session_start();
include_once("connection.php");
$universityID=$_GET["accID"];
$sql = "SELECT universityName, universityID FROM universityinfo_ssf WHERE universityID ='$universityID'";
  if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of universities" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$fetch= mysqli_fetch_assoc($result);

$_SESSION["universityID"]= $universityID;
$_SESSION["universityName"]= $fetch["universityName"]; 
  ?>