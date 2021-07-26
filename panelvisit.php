<?php
session_start();
include_once("connection.php");
$accreditationID = $_SESSION['accreditationID'];
$ID = $_SESSION['ID'];
function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
    }
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    
       $universityName =  input_check($_POST["university"]);
       $program = input_check($_POST["programme"]);
       $fdate = input_check($_POST["fdate"]);
       $tdate = input_check($_POST["tdate"]);
       $objectives = input_check($_POST["objectives"]);
       $score = input_check($_POST["score"]);
       $comment = input_check($_POST["comment"]);
       $objectives1 = input_check($_POST["curriculum"]);
       $score1 = input_check($_POST["score1"]);
       $comment1 = input_check($_POST["comment1"]);
        //$ID = input_check($_POST["ID"]);
               
$sql = "SELECT * FROM  visitationdetails_pef WHERE ID='$ID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

  if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){ 
  /* Closing connection */
mysqli_close($db_link);
header('location:panelpef1.php');
}

  
$sql = "INSERT INTO `visitationdetails_pef`(`accreditationID`, `universityName`, `titleProgramme`, `dateFrom`, `dateTo`, `ID`)
 VALUES ('$accreditationID','$universityName','$program','$fdate','$tdate','')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert visitation details " . mysqli_error($db_link)); }

$sql = "INSERT INTO `academiccontent_pef`(`accreditationID`, `content`, `remark`, `score`, `comments`, `ID`) 
VALUES ('$accreditationID','Programme philosophy and objectives','$objectives','$score','$comment','$ID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert acc1" . mysqli_error($db_link)); }

$sql = "INSERT INTO `academiccontent_pef`(`accreditationID`, `content`, `remark`, `score`, `comments`, `ID`) 
VALUES ('$accreditationID','The curriculum and structure of the programme','$objectives1','$score1','$comment1','$ID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert acc2 " . mysqli_error($db_link)); }


$_SESSION["msg"]= "Submited Sucessfully";
/* Closing connection */
mysqli_close($db_link);
header('location:panelpef1.php');
}
?>
