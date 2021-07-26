<?php
	session_start();
   if( $_SESSION["loginStatus"]!="login"){
        header('location:vchodlogin.php');
   }
elseif($_SESSION['position']!=='VC'){
           header('location:vchodlogin.php'); 
        }
$accreditationID=$_SESSION['accreditationID'];
?>
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
        <a class="nav-link" href="vcssf.php" style="color: white;">GENERAL INFORMATION ON UNIVERSITY<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="vcssf2.php" style="color: white;">ORGANISATION, ADMINISTRATION AND CONTRO<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="vcssf2.php" style="color: white;">PHILOSOPhY,OBJECTIVES AND UTILITY SERVICES<span class="sr-only">(current)</span></a>
      </li>
         <li class="nav-item active">
        <a class="nav-link" href="checkstatus1.php" style="color: white;">CHECK ACCREDITATION STATUS<span class="sr-only">(current)</span></a>
      </li>        
    </ul>
 
       </div>
</nav>
  </div>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card p-5" >
<div class="card-title">
<h5 style="text-align:center;" id="un">CHECK ACCREDITATION STATUS</h5>
</div>
<!-- first div title--> 
<select class="form-control" onchange="printPanel(this.value)" >
<option>Please Select University</option>
<?php
include_once("connection.php");
$sql2 = "SELECT * FROM `universityinfo_ssf`";
if (!mysqli_query($db_link,$sql2)){die("Faild  to check the university info" . mysqli_error($db_link));}
$result2 = mysqli_query($db_link,$sql2);
while($fetch2 = mysqli_fetch_assoc($result2)){
  $University = $fetch2["universityName"];
$universityID = $fetch2["universityID"];


  //echo'<a class="dropdown-item"    ></a>';
  echo'<option value="'.$universityID.'" id="unName" >'. $University.'</option>'; 
}
	
?>           
  </select>
  </div>      
<?php
$universityID = $_SESSION["universityID"];
$sql = "SELECT* FROM programme_apply WHERE universityID ='$universityID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
 $numRow =  mysqli_num_rows($result); 
 
 
 
if ($numRow >0 ){
    
    echo'<div class="row">
<!-- Third column start here-->
<div class="col card form-category" id="filled-section"  style="font-size:11px;">
<div id="forms" style="background-color:#7CC68D; color: white;font-size:8px;">
</div>';
?>

<form method="post" enctype="multipart/form-data" action="vccheckstatus.php">
<select required class="form-control"  name="accID">
	<option value="">Select Program</option>
	
    <?php while($fetch=mysqli_fetch_assoc($result) ){
        $accreditationID = $fetch['accreditationID'];
        $program = $fetch['programme'];
        echo'<option value="'.$accreditationID.'">'.$program.'</option>';
    }
    }?>
  <td><input type="submit"class="btn btn-lg btn-success" value="Check"   /> </td>
  </select>
 </form>
 </tr>
 </table>
 </div>
</div>
</div>
</div>
</div>
</div>

<!-- first div closing tag-->
<?php 
       
require ('footer.inc');
$_SESSION["msg"]='';
?>
</div>
<!-- Container closing tag-->

