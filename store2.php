<?php
include_once("connection.php");
$accreditationID = $_SESSION["accreditationID"];
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM accreditationrequest_apply WHERE accreditationID = '$accreditationID'";
 if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of request" . mysqli_error($db_link)); }

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
    $result = mysqli_query($db_link,$sql);
    $fetch=mysqli_fetch_assoc($result);
    $status =$fetch['status'];
    $position = $_SESSION["position"];
    $hodID = $_SESSION["hodID"];
    
    
if($status =='approved' OR $status =='approved some' ){
        if( $position=='VC'){
            header('location:vcssf.php');
            }
        else{
            
$sql = "SELECT* FROM programmeinfo_ssf WHERE hodID ='$hodID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link)); }
$result = mysqli_query($db_link,$sql);
$numRow =  mysqli_num_rows($result); 
if ($numRow >0 ){header('location:hodssf.php'); }
else{ header('location:apply.home.php');}

            }
      
    }
else{
    header('location:apply.home.php');
    }
   
}
else{
  
}

?>