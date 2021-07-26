<?php
session_start();
 $pID = $_POST['pID']; 
 $hodID = $_POST['hodID'];

$universityID = $_SESSION["universityID"];
include_once("connection.php");
$sql = "DELETE FROM programme_apply WHERE pID ='$pID'";
             if (!mysqli_query($db_link,$sql)){
 echo die("Faild  to delete program" . mysqli_error($db_link));
      
}
$sql = "DELETE FROM `hods_account` WHERE hodID ='$hodID'";
             if (!mysqli_query($db_link,$sql)){
  echo die("Faild  to delet hod" . mysqli_error($db_link));    
}
  $_SESSION["msg"]= 'Program Deleted Sucessfully';
    header('location:apply.php');
?>