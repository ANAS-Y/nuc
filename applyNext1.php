<?php
session_start();
             $_SESSION["msg"]="";

   function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
}
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $newpID= rand(1,1000000);
       $SN = rand(10,99);
       $faculty =  input_check($_POST["faculty"]);
       $department = input_check($_POST["department"]);
       $programme =input_check($_POST["programme"]);
       $status= input_check($_POST["status"]);
       $establishDate = input_check($_POST["pdate"]);
       $Fname = input_check($_POST["vcFname"]);
       $Lname = input_check($_POST["vcLname"]);
       $Oname = input_check($_POST["vcOname"]);
       $email = input_check($_POST["email"]);
       $phone = input_check($_POST["phone"]);
       $Qualification = input_check($_POST["Qualification"]);
       $accreditationID =  $_SESSION["accreditationID"];
       $password = sha1($phone.$SN);
       $sword =$phone.$SN;     
include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM programme_apply WHERE accreditationID = '$accreditationID' AND programme ='$programme'";
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of request" . mysqli_error($db_link));    
}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
    $_SESSION["msg"]= "ACCREDITATION REQUEST FOR  ".$programme."  ALREADY EXIST";
    header('location:apply.php');
}
else{
  
$sql = "INSERT INTO `programme_apply`(`accreditationID`, `pID`, `faculty`, `department`,
 `programme`, `dateEstablished`, `status`,`hodID`)
 VALUES ('$accreditationID','$newpID','$faculty','$department','$programme','$establishDate','$status','$sword')";

if (!mysqli_query($db_link,$sql)){ die("Faild  to insert programme details" . mysqli_error($db_link));}

 $sql= "INSERT INTO `hods_account`(`accreditationID`, `surname`, `otherName`, `firstName`, 
 `telephone`, `qualification`, `email`, `password`,`hodID`)
  VALUES ('$accreditationID','$Lname','$Oname','$Fname','$phone','$Qualification','$email','$password','$sword')";
 if(!mysqli_query($db_link,$sql)){die("Faild  to insert HOD information" . mysqli_error($db_link));}
 
/* Closing connection */
mysqli_close($db_link);
$_SESSION["msg"]= "PROGRAMME DETAILS SAVED SUCESSFULLY,YOU CAN ADD ANOTHER PROGRAMME";
header('location:apply.php');
 
             }
}
?> 
