<?php
session_start();
             $_SESSION["msg"]="";
$accreditationID = "NUC/ACC".date('Y')."/".date('m')."/".$SN;
$universityID =  $_SESSION["universityID"];
   function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
}
  if($_SERVER["REQUEST_METHOD"]=="POST"){
      include_once("connection.php");
$sql = "SELECT* FROM programme_apply WHERE accreditationID ='$accreditationID'";
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of programmes" . mysqli_error($db_link));    
}
$result = mysqli_query($db_link,$sql);
 $numRow =  mysqli_num_rows($result); 
 
if($numRow <=0 ){
  $_SESSION["msg"]= "Please Add atlest one Programme";
    header('location:apply.php');
    }
    else{
    
       $accreditationIDate = input_check($_POST["adate"]);
       $Fname = input_check($_POST["vcFname"]);
       $Lname = input_check($_POST["vcLname"]);
       $Oname = input_check($_POST["vcOname"]);
       $Oname = input_check($_POST["adate"]);
       $reasons = input_check($_POST["reasons"]);
       $agreed = input_check($_POST["agree"]);
       
       
       
    
      
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM accreditationrequest_apply WHERE accreditationID = '$accreditationID'";
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of request" . mysqli_error($db_link));    
}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
    $_SESSION["msg"]= " UNIVERSITY PROGRAMES ALREADY SUBMITED";
    header('location:admin.home.php');
}
else{
  
$sql = "INSERT INTO `accreditationrequest_apply`(`accreditationID`, `RequestReasons`, `prposedDate`,
 `Fname`, `Lname`, `Oname`, `status`,`universityID`)
 VALUES ('$accreditationID','$reasons','$adate','$Fname','$Lname','$Oname','submited','')";

if (!mysqli_query($db_link,$sql)){
    die("Faild  to insert submited details" . mysqli_error($db_link));    
}
/* Closing connection */
mysqli_close($db_link);
$_SESSION["msg"]= "PROGRAMES REGISTRTION COMPLETED SUCESSFULLY";
header('location:admin.home.php');
 
             }
      }       
 
}
?> 
