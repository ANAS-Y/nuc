
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
    
       $SN = rand(1,1000000);
       $schoolName =  input_check($_POST["schoolName"]);
       $address = input_check($_POST["address"]);
       $telephone =input_check($_POST["telephone"]);
       $foundedDate= input_check($_POST["fdate"]);
       $proprietor = input_check($_POST["pname"]);
       $proprietorPhone1 = input_check($_POST["pTelphone1"]);
       $proprietorPhone2 = input_check($_POST["pTelphone2"]);
       $parsuantLaw = input_check($_POST["Plaw"]);
       $parsuantEstablishe = input_check($_POST["lawText"]);
       $vcFname = input_check($_POST["vcFname"]);
        $vcLname = input_check($_POST["vcLname"]);
        $vcOname = input_check($_POST["vcOname"]);
        $email = input_check($_POST["email"]);
        $vcPhone = input_check($_POST["phone"]);
         $vcQualification = input_check($_POST["Qualification"]);
          $pwd = sha1($vcFname.$vcPhone);
           $squestion = input_check($_POST["squestion"]);
            $sanswer = sha1($foundedDate);
            $universityID = "UN".date('Y').date('m').$SN;
            
include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM vcinformation_ssf WHERE email= '$email' ";
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of request" . mysqli_error($db_link));    
}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
    $_SESSION["msg"]= "THE VC WITH THIS EMAIL ALREADY EXIST";
    header('location:submitApply.php');
    exit;
}
else{
  
$sql = "INSERT INTO `universityinfo_ssf`(`universityName`, `universityAddress`, 
`telephone`, `dateFounded`, `proprietorsName`, `proprietorsTelephone1`, `proprietorsTelephone2`,
 `parsuantLaw`,`parsuantEstablishe`, `universityID`)
 VALUES ('$schoolName','$address','$telephone','$foundedDate','$proprietor','$proprietorPhone1',
 '$proprietorPhone2','$parsuantLaw','$parsuantEstablishe','$universityID')";

if (!mysqli_query($db_link,$sql)){
    die("Faild  to insert university details" . mysqli_error($db_link));    
}

 $sql= "INSERT INTO `vcinformation_ssf`(`firstName`, `surname`, `otherName`, `email`, `telephone1`,
  `telephone2`, `qualification`, `homeAddress`, `password`, `securityQuestion`, `securityAnswer`, `universityID`) 
 VALUES ('$vcFname','$vcLname','$vcOname','$email','$vcPhone','$telephone','$vcQualification','$address','$pwd','$squestion','$sanswer','$universityID')";
 if(!mysqli_query($db_link,$sql)){
     die("Faild  to insert VC information" . mysqli_error($db_link));
      }
   /* Closing connection */
mysqli_close($db_link);
$_SESSION["universityID"]= $universityID ;
$_SESSION["msg"]="University Registration Submited Sucessfully";

header('location:apply.php');

             }
}
?> 

