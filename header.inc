<?php
	session_start();
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
       <link href="css//nuc.css" rel="stylesheet" type="text/css" />
       <script type="text/javascript" src="css/nuc.js"> </script>
      
 <title>Accreditation System</title>
  </head>
  <body>
          
  <!-- Navigation bar start here -->
  <div class="container-fluid navdiv" >
  
   <!-- Top navbar with a marquee start here-->
     <div class="container-fluid topnav" > 
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
     <li class="nav-item " >
        <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ABOUT US</a>   
        <div class="dropdown-menu"  id="aboutID" aria-labelledby="navbarDropdown" onmouseover="showDropDown()" >
          <a class="dropdown-item" id="dropdown-item" href="aboutUs.php">About Us</a>
          <a class="dropdown-item"id="dropdown-item2" href="boardMembers.php">NUC Board Members</a>
            </div>
            </li>
            <li class="nav-item ">
        <a class="nav-link" id="dropdown-item2" href="apply.login.php" style="color: white;">VC/HOD LOGIN</a>
           </li>
             <li class="nav-item ">
        <a class="nav-link" id="dropdown-item3" href="panel.login.php" style="color: white;">PANEL LOGIN </a>
           </li>
            <li class="nav-item ">
        <a class="nav-link" id="dropdown-item3" href="checkstatus3.php" style="color: white;">CHECK ACCREDITATION STATUS</a>
           </li>
       
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: white;">CONTACT US</a>
      </li>
             
      
    </ul>
 
       </div>
</nav>
<!-- header image start here-->
<div class=" media-body" >

<img src="images/nuc_secretariat.png" alt="nuc Secretariat picture" width="100%" height="auto" />
</div>
  </div>
  <?php	
?>