<?php
session_start();
$uID=$_POST["uID"];
include_once("connection.php");
$sql="SELECT DISTINCT programme_apply.programme,hods_account.email,hods_account.firstName,hods_account.surname,hods_account.hodID,programme_apply.duedate
FROM programme_apply INNER JOIN hods_account ON hods_account.accreditationID = hods_account.accreditationID 
WHERE programme_apply.universityID = '".$uID."' AND programme_apply.accreditation_status ='Pending'";

if (!mysqli_query($db_link,$sql)){die("Faild  to select university program " . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$fetch1 = mysqli_fetch_assoc($result);
$accdate = $fetch1["duedate"];

$sql2="SELECT*FROM `vcinformation_ssf` WHERE universityID = '".$uID."'";
$result2 = mysqli_query($db_link,$sql2);
$fetch2 = mysqli_fetch_assoc($result2);
$vc_fulName = $fetch2["firstName"]." ".$fetch2["surname"];
$vcpassword = $fetch2["firstName"].$fetch2["telephone1"];
$vcemail = $fetch2["email"];
mail(
$vcemail,
"ACCREDITATION NOTICE",
"Dear ".$vc_fulName." The National University Commission (NUC) whish to Inform you that the 
accreditation of new Programmes in your University scheduled to commence on ".$accdate.". click this link www.nuc.com
 to login using your Email: ".$vcemail." and Password:".$vcpassword." You are urged to submit the  Self Study (SSF) for all programs in next Three weeks. Thank You.",
"From:nucnotice@gmail.com");

while($fetch = mysqli_fetch_assoc($result)){
$email = $fetch["email"];
$programme = $fetch["programme"];
$hod_fulName = $fetch["firstName"]." ".$fetch["surname"];
$duedate = $fetch["duedate"];
$hodID = $fetch["hodID"];

mail(
$email,
"ACCREDITATION NOTICE",
"Dear ".$hod_fulName." The National University Commission (NUC) whish to Inform you that the 
accreditation of ".$programme." is scheduled to commence on ".$duedate.". click this link www.nuc.com
 to login using your Email: ".$email." and Password:".$hodID." You are urged to submit the  Self Study (SSF)in next Three weeks. Thank You.",
"From:nucnotice@gmail.com");
}

$sql = "UPDATE programme_apply SET accreditation_status ='Ready' WHERE universityID = '".$uID."' AND accreditation_status ='Pending'";
if (!mysqli_query($db_link,$sql)){die("Faild  to UPDATE program status" . mysqli_error($db_link));}
$_SESSION["msg"]="Email of Notice sent to VC & HOD Sucessfully";
header('location:admin.home.php');

//else{
//$_SESSION["msg"]="Email not sent";

//header('location:admin.home.php');
 

?>