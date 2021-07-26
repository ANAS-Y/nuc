<?php
	session_start();
    
   if( $_SESSION["loginStatus"]!="login"){
        header('location:panel.login.php');
   }
else{ 
    if( $_SESSION["position"]="Member" OR $_SESSION["position"]="Chairman" ){
    }
    else{
        header('location:panel.login.php');
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
        <a class="nav-link" href="panelpef.php" style="color: white;">VISITATION DETAILS<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onmouseover="showDropDown()" href="panelpef1.php"style="color: white;" >ADMISSION REQUIREMENTS </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="panelpef2.php" style="color: white;">STUDENTS COURSE EVALUATION </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="panelpef3.php" style="color: white;">ACADEMIC STAFF</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="panelpef4.php" style="color: white;">NON-TEACHING STAFF</a>
      </li>
             
    </ul>
 
       </div>
</nav>
  </div>