<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>


 <!-- CDN CSS & JS -->
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="css/w3.css" type="text/css" />
      
       <!-- User defined CSS & JS -->
       <link href="css/nuc.css" rel="stylesheet" type="text/css" />
       <script type="text/javascript" src="css/nuc.js"> </script>
      
 <title>National Universities commission</title>
  </head>
  <body onload="programmeDisplay">
          
  <!-- Navigation bar start here -->
  <div class="container-fluid navdiv" >
  
   <!-- Top navbar with a marquee start here-->
     <div class="container-fluid topnav" > 
     <a href="logOut.php" style="text-decoration: none; color:white;margin-left: 95%;">Log out</a>
     </div>
     
  <nav class="navbar navbar-expand-lg navbar-light">
 
  <!-- logo start here-->
    <img src="images/nuc-header-new.png" alt="logo" width="20%" />
   
  <a href="#" class="nav-link" ><i class="w3-large fa fa-home"></i></a>
  <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" ></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="hodssf.php" style="color: white;"><span class="sr-only">(current)</span>PROGRAMME TO BE ACCREDITED</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" onmouseover="showDropDown()" href="hodssf1.php"style="color: white;" >HISTORY OF THE PROGRAMME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hodssf2.php" style="color: white;">STUDENTS WELFAREAC</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hodssf3.php" style="color: white;">ADEMIC ATMOSPHERE</a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="checkstatus2.php" style="color: white;">CHECK ACCREDITATION STATUS</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="hodssf.Submit.php" style="color: white;">SUBMIT </a>
      </li>
             
    </ul>
 
       </div>
</nav>
  </div>


<?php 
   session_start();
   if( $_SESSION["loginStatus"]!="login"){
        header('location:vchodlogin.php');
   }
elseif($_SESSION['position']!=='HOD'){
           header('location:vchodlogin.php'); 
        }
$accreditationID=$_SESSION['accreditationID'];
include_once("connection.php");
            /* Performing SQL query */
$accreditationID=$_SESSION['accreditationID'];
$hodID=$_SESSION['hodID'];
$sql = "SELECT * FROM programmeinfo_ssf WHERE accreditationID= '$accreditationID' AND submissionStatus = 'submited'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$ahref1='printhodssf.php';
$notice1 = 'THE SELF-STUDY FORM SECTION "B" HAS BEEN SUBMITED';
$buttonText1 = 'Print Submited Self-Study Form Section B';

$sql = "SELECT * FROM vcselfstudy_ssf WHERE accreditationID= '$accreditationID' AND submissonStatus ='submited'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
    $ahref='printvcssf.php';
    $notice = 'THE SELF-STUDY FORM SECTION "A" HAS BEEN SUBMITED';
    $buttonText = 'Print Submited Self-Study Form Section A';
    
   }
   else{
$ahref='#';
$notice = 'THE SELF-STUDY FORM SECTION "A" IS NOT SUBMITED  YET! THE VICE CHANCELLOR SHOULD SUBMIT THE FORM IN TIME';
$buttonText = ' Self-Study Form Section A not Yet Submited by the VC';
}
    
 
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title "  >
<h3 style="text-align: center; color: red;" ><strong>SELF-STUDY FORM (NUC/SSF)</strong></h3>

<div class="alert">
<h3 id="msg" style="text-align: center; color: red;" class="alert-link" ><?php echo $_SESSION["msg"];?></h3>
</div>
</div>
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"   >
<div class="form-row">
      <label class="col"  style="color: red;margin-left: 8%; font-size:12px;font-family: fantasy;"><strong></strong></label>
      </div>
 <div class="form-row">
 <div class="col alert">
<a class="btn btn-primary login-btn" href="<?php echo $ahref;?>" style="float: right; width: 100%; "><?php echo $buttonText;?></a>
 </div>
 </div>

</div>
</div>
</div>
<!-- first div closing tag-->
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"   >
<div class="form-row">
      <label class="col"id="msg" style="color: red;margin-left: 8%; font-size: 25px;"></label>
      </div>
 
 <div class="form-row">
 <div class="col alert">
<a class="btn btn-primary login-btn" href="<?php echo $ahref1;?>" style="width: 100%; "><?php echo $buttonText1;?></a>
 </div>
 </div>

</div>
</div>
</div>
</div>
</div>
<?php   
}
else{
$accreditationID=$_SESSION['accreditationID'];
 include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
 $sql = "SELECT * FROM `programmeinfo_ssf` WHERE accreditationID= '$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}


if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);

$Fname= $fetch["officerFname"];
$Lname= $fetch["officerSurname"];
$Oname= $fetch["officerOname"]; 
$rank= $fetch["rank"];   
}
else{
 
$Fname = ''; 
$Lname = '';
$Oname = '';
$rank = '';
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
    }
       
       $cdate = input_check($_POST["cdate"]);
       $vcFname = input_check($_POST["vcFname"]);
       $vcLname = input_check($_POST["vcLname"]);
       $vcOname = input_check($_POST["vcOname"]);
       $rank = input_check($_POST["rank"]);
       
$sql= "UPDATE `programmeinfo_ssf` SET `officerFname`='$vcFname',`officerSurname`='$vcLname',`officerOname`='$vcOname',
 `dateSubmited`='$cdate',`rank`='$rank',`dateSubmited`='$cdate',submissionStatus='submited' WHERE `accreditationID`='$accreditationID'";
if(!mysqli_query($db_link,$sql)){ die("Faild  to update student welfare and exam structure" . mysqli_error($db_link));}
 
/* Closing connection */
mysqli_close($db_link);
header('location:hodssf.submit.php');
}
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SUBMITING THE NUC/SSF( FINAL STAGE)</h3>
</div>
  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >

<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
    <div class="form-group">
    <h4 style="text-align: center; color: red;">CONFIDENTIALITY OF INFORMATION</h4>
    <label>The information supplied in this Form is solely for the confidential use of the National 
   Universities Commission and its authorised agents. </label>
    
  </div>
 
  <div class="form-row">
     <label for="cdate" class="col-sm-5" >Date Form is completed </label>
     <div class="col-sm-7">
      <input type="date" class="form-control"  id="cdate" name="cdate">
    
    </div>
  </div>


</div>
</div>
<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">NAME OF OFFICER COMPLETING THE FORM AND DECLARATION</h5>
</div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="vcFame" name="vcFname" value="<?php echo $Fname?>" required="required" class="form-control" placeholder="First name">
      </div>
      <div class="col">
      <input type="text" id="vcLame" name="vcLname" value="<?php echo $Lname?>" required="required"class="form-control" placeholder=" Surname">
      </div>
    <div class="col">
      <input type="text" id="vcOname" name="vcOname" value="<?php echo $Oname?>" class="form-control" placeholder="Other name">
      </div>
  </div>
  <div class="form-row">
  <div class="col">
      <input type="text" id="rank" name="rank" value="<?php echo $rank?>" required="required"class="form-control" placeholder="Rank">
      </div>
       </div>
  <div class="form-row">
  <div class="form-row" style="margin-left:0%;">
      <div class="col"><input type="checkbox"   required="required" name="remember"> <label for="remeber" >I Confirmed that the Information
      provided Here are correct</label></div>
     
    </div>
</div>

</div>
 
 <div class="form-row">
 <div class="col">
<a class="btn btn-primary login-btn" href="hodssf3.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>

 </div>
 <div class="col">
 <button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">SUBMIT</button>
 <br />
 <br />
 </div>
 </div>

 </form>
 </div>
 </div>
 
<!-- first row closing tag-->
</div>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
<?php } 
require ('footer.inc');?>