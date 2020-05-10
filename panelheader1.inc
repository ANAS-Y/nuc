<?php
	session_start();
   if( $_SESSION["loginStatus"]!="login"){
        header('location:panel.login.php');
   }
else{ 
    if( $_SESSION["position"]!="Member"){ 
        header('location:panelpef.summary.php');
    }
    else{
        
    }
    
}
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
     <a href="panelLogOut.php" style="text-decoration: none; color:white;margin-left: 95%;">Log out</a>
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
        <a class="nav-link" href="index.php" style="color: white;">HOME <span class="sr-only">(current)</span></a>
      </li>
     <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ABOUT US</a>   
        <div class="dropdown-menu"  id="aboutID" aria-labelledby="navbarDropdown" onmouseover="showDropDown()" >
          <a class="dropdown-item" id="dropdown-item" href="aboutUs.php">About Us</a>
          <a class="dropdown-item"id="dropdown-item2" href="boardMembers.php">NUC Board Members</a>
            </div>
            </li>
        <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" onclick="showDropDown()" style="color: white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ACCREDITATION</a>   
        <div class="dropdown-menu" id="accID" aria-labelledby="navbarDropdown" >
        <a href="#" class="divider"></a>
          <a class="dropdown-item" id="dropdown-item" href="apply.new_account.php">Apply For Accreditation</a>
          <a href="#" class="divider"></a>
          <a class="dropdown-item"id="dropdown-item2" href="apply.login.php">Submit Self-Study Form (NUC/SSF)</a>
          <a class="dropdown-item"id="dropdown-item2" href="#">View Accreditation Status</a>
          <div class="divider dropdown-item"></div>
          <a class="dropdown-item"id="dropdown-item3" href="panel.login.php">Accreditation Panel Login Area</a>
          <a class="dropdown-item"id="dropdown-item3" href="apply.login.php">VC/HOD Login Area</a>
            </div>
            </li>
      <li class="nav-item">
        <a class="nav-link" onmouseover="showDropDown()" href="#"style="color: white;" >DIRECTORATES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: white;">NIGERIAN UNIVERSITIES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: white;">PART TIME COURSES</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: white;">CONTACT US</a>
      </li>
             
    </ul>
 
       </div>
</nav>
  </div>