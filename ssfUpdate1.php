<?php
session_start();
$accreditationID  = $_SESSION['universityID'];

   function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
}
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    
       $schoolName =  input_check($_POST["schoolName"]);
       $address = input_check($_POST["address"]);
       $telephone =input_check($_POST["telephone"]);
       $foundedDate= input_check($_POST["fdate"]);
       $proprietor = input_check($_POST["pname"]);
       $proprietorPhone1 = input_check($_POST["pTelphone1"]);
       $proprietorPhone2 = input_check($_POST["pTelphone2"]);
       $parsuantEstablishe = input_check($_POST["lawText"]);
       $vcFname = input_check($_POST["vcFname"]);
       $vcLname = input_check($_POST["vcLname"]);
       $vcOname = input_check($_POST["vcOname"]);
       $vcPhone = input_check($_POST["vcTelephone"]);
       $vcPhone2 = input_check($_POST["vcTelephone1"]);
       $vcQualification = input_check($_POST["Qualification"]);
            
include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */

  
$sql = "UPDATE `universityinfo_ssf` SET `universityName`='$schoolName', `universityAddress`='$address', 
`telephone`='$telephone', `dateFounded`='$foundedDate', `proprietorsName`='$proprietor', `proprietorsTelephone1`='$proprietorPhone1',
 `proprietorsTelephone2`='$proprietorPhone2',`parsuantEstablishe`='$parsuantEstablishe' WHERE universityID ='$accreditationID'";

if (!mysqli_query($db_link,$sql)){
    die("Faild  to update university details" . mysqli_error($db_link));    
}

 $sql= "UPDATE `vcinformation_ssf` SET `firstName`='$vcFname', `surname`='$vcLname', `otherName`='$vcOname',`telephone1`='$vcPhone',
  `telephone2`='$telephone', `qualification`='$vcQualification', `homeAddress`='$address', `securityAnswer`='$sanswer'
   WHERE `universityID`='$accreditationID'";
 if(!mysqli_query($db_link,$sql)){
     die("Faild  to insert VC information" . mysqli_error($db_link));
      }
 $_SESSION["msg"]= "Updated Sucessfully";
/* Closing connection */
mysqli_close($db_link);
header('location:vcssf2.php');

             }
?> 
