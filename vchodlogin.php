
<?php 
session_start();
  function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
}
$email =  input_check($_POST["email"]);
$password =sha1(input_check($_POST["psw"]));

include_once("connection.php");
            /* Performing SQL query */
$sql = "SELECT*FROM `vcinformation_ssf` WHERE email ='$email' AND password ='$password'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check email" . mysqli_error($db_link));}

$sql2 = "SELECT*FROM `hods_account` WHERE email ='$email' AND password ='$password'";
if (!mysqli_query($db_link,$sql2)){die("Faild  to check email" . mysqli_error($db_link));}   
   
$result = mysqli_query($db_link,$sql);
if(mysqli_num_rows($result) > 0){
$fetch =mysqli_fetch_assoc($result);
$_SESSION['universityID']=$fetch["universityID"];
$_SESSION["position"]='VC';
$_SESSION["loginStatus"]='login';
header('location:vcssf0.php');
exit;
} 
elseif(mysqli_num_rows(mysqli_query($db_link,$sql2)) > 0){
$fetch =mysqli_fetch_assoc(mysqli_query($db_link,$sql2));
$accreditationID =$fetch["accreditationID"];
$_SESSION['accreditationID']=$accreditationID;
$_SESSION["position"]='HOD';
$_SESSION["loginStatus"]='login';
$_SESSION["hodID"]=$fetch["hodID"];
header('location:hodssf.php');
}
else{
  $_SESSION["msg"]= ' Incorrect Email or Password';
  header('location:apply.login.php');
}
mysqli_close($db_link);


 
 ?>
