<?php
require ('admin.header.inc');
$pID = $_GET['pID']; 
 //$hodID = $_GET['hodID'];
 $accDate = $_GET['accDate'];

$accreditationID = $_SESSION['accID'];
echo $accreditationID;
include_once("connection.php");
$sql = "SELECT*FROM programme_apply WHERE accreditationID ='$accreditationID' AND pID ='$pID'";
 if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programme apply" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
  
$title = $fetch["programme"]; 
$type = '';
$faculty = $fetch["faculty"];
$$hodID = $fetch["hodID"];
$department = $fetch["department"];
$deanName = ''; 
$dQualification = '';
$sql = "SELECT*FROM `hods_account` WHERE accreditationID ='$accreditationID' AND hodID ='$hodID'";
 if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programme apply" . mysqli_error($db_link));}
 
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
$email = $fetch['email'];
$hodName = $fetch["firstName"].' '.$fetch["otherName"].' '.$fetch["surame"];
$hQualification=$fetch["qualification"];

$sql = "INSERT INTO `programmeinfo_ssf`(`programmeID`, `accreditationID`, `programmeTitle`, `accreditationType`, `faculty`, `department`, `visitedBefore`,
 `dateEstablished`, `deanName`, `deanQualification`, `hodName`, `hodQualification`, `programmehistory`, `programmeAdministration`, `studentsWelfare`,
  `academicAtmosphere`, `dateSubmited`, `officerFname`, `officerSurname`, `officerOname`, `rank`, `submissionStatus`) VALUES ('$pID','$accreditationID','$title',
  '$type','$faculty','$department','','$cdate','$dFName','$dQualification','$hFname','$hQualification','','','','','','','','','','$hodID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert programme information in to programmeinfo_ssf" . mysqli_error($db_link));}

$sql = "DELETE FROM programme_apply WHERE accreditationID ='$accreditationID' AND pID ='$pID'";
 if (!mysqli_query($db_link,$sql)){die("Faild  to update programme status" . mysqli_error($db_link));}
 
 mail($email,'ACCREDITATION APPROVAL','Your request for '.$title.' Programme Accreditation have been Approved!Here attached your login details
  Email:'.$email.' Password:'.$hodID.' Please kindly login to your dashboard on our Portal other required forms and accreditation mannual for more Details. filled 
  and Complete the Self-Study form, make sure it is submited three weeks before the accreditation. the scheduled accreditation is '.$accDate.'','From NUC');
/* Closing connection */
mysqli_close($db_link);
echo 'Sucessful'; 
}
?>