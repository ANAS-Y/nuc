<?php
session_start();
$pID = $_POST['pID']; 
//$hodID = $_GET['hodID'];
$accDate = date('d/m/Y');
$accStatus =$_POST['accStatus'];// $_GET['accDate'];
$universityID = $_SESSION['accID'];
include_once("connection.php");
//Select from Programme apply table
$sql = "SELECT*FROM programme_apply WHERE pID ='$pID'";
 if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programme apply" . mysqli_error($db_link));}
 
if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
  
$title = $fetch["programme"]; 
$type = '';
$faculty = $fetch["faculty"];
$hodID = $fetch["hodID"];
$department = $fetch["department"];
$accreditationID = $fetch["accreditationID"];

$sql = "SELECT*FROM `panelreport_summary` WHERE accreditationID ='$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("HOD" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$sql = "UPDATE `panelreport_summary` SET accreditation_status = '$accStatus', accreditationDate = '$accDate' WHERE accreditationID ='$accreditationID'";
 if (!mysqli_query($db_link,$sql)){die("Failed to Update request status" . mysqli_error($db_link));}

$sql = "UPDATE programme_apply SET status = '$accStatus',accreditation_status = '$accStatus' WHERE pID = '$pID'";
 if (!mysqli_query($db_link,$sql)){die("Failed to Update request status" . mysqli_error($db_link));}

//select from HOD's  Account
$sql = "SELECT*FROM `hods_account` WHERE accreditationID ='$accreditationID' AND hodID ='$hodID'";
 if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programme apply" . mysqli_error($db_link));}
 
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
$email = $fetch['email'];
$hodName = $fetch["firstName"].' '.$fetch["otherName"].' '.$fetch["surname"];
$hQualification=$fetch["qualification"];
 
 //HOD EMAIL NOTIFICATION
 mail($email,'ACCREDITATION APPROVAL','Your request for '.$title.' Programme Accreditation have been Approved!
 Please kindly login to your dashboard on our Portal.');

//Queryb VC's Information
$sql2 = "SELECT * FROM `vcinformation_ssf` WHERE universityID ='$universityID'";
if (!mysqli_query($db_link,$sql2)){die("Faild  to check the university info" . mysqli_error($db_link));}
$result2 = mysqli_query($db_link,$sql2);
$fetch2 = mysqli_fetch_assoc($result2);
$vcEmail = $fetch2["email"];
 
//VC'S EMAIL NOTIFICATION
 mail($vcEmail,'ACCREDITATION APPROVAL','Your request for '.$title.' Programme Accreditation have been Approved!
   Please kindly login to your dashboard on our Portal.');
/* Closing connection */
mysqli_close($db_link); 
$_SESSION["msg"]='Program Status Updated Successfully';
header('location:request.php');
exit;
}
else{
    $_SESSION["msg"]='Panel Report Not Submited Yet!';
    header('location:request.php');
    exit();
  }
}
?>