<?php
session_start();
 $pID = $_GET['pID']; 
 $hodID = $_GET['hodID'];

$accreditationID = $_SESSION["accreditationID"];
include_once("connection.php");
$sql = "DELETE FROM programme_apply WHERE accreditationID ='$accreditationID' AND pID ='$pID'";
             if (!mysqli_query($db_link,$sql)){
 echo die("Faild  to check the existance of programmes" . mysqli_error($db_link));
      
}
$sql = "DELETE FROM `hods_account` WHERE accreditationID ='$accreditationID' AND hodID ='$hodID'";
             if (!mysqli_query($db_link,$sql)){
  echo die("Faild  to check the existance of programmes" . mysqli_error($db_link));    
}
 
?>