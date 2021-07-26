<?php
	session_start();
   if( $_SESSION["loginStatus"]!="login"){
        header('location:admin.php');
   }
    else{
        if($_SESSION['position']!='admin'){
           header('location:admin.php'); 
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
        <link href="css/dashboard.css" rel="stylesheet" type="text/css" />
       <script type="text/javascript" src="css/nuc.js"> </script>
      <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

 <title>National Universities commission</title>
  </head>
  <body>
    <div class="home_content " >
<!-- Top navbar  start here-->
  <header class="navbar  sticky-top  flex-md-nowrap p-0 shadow" style="background-color:#2C7337; color: white;">
  <!-- logo start here-->
    <img class="navbar-brand col-md-3 col-lg-2 me-0 px-3"src="images/nuc-header-new.png" alt="logo" width="20%" />
  
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="adminLogOut.php" >Sign out</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block bg-dark text-white sidebar collapse" style="font-size:11px;">
      <div class="position-sticky pt-5">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="admin.home.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <hr class="featurette-divider">
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>University</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="apply.new_account.php">
              <span data-feather="file-text"></span>
              Add New University
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Apply.php">
              <span data-feather="file-text"></span>
              Add New Program
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="viewProgram.php">
              <span data-feather="file-text"></span>
              View Programs
            </a>
          </li
          <hr class="featurette-divider">
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Accreditation</span>
          <a class="link-secondary" href="#" aria-label="a">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
          <li class="nav-item">
            <a class="nav-link" href="request.php">
              <span data-feather="users"></span>
              Update Accreditation
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="notice.php">
              <span data-feather="users"></span>
              Send Notice
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="panelprint2.php">
              <span data-feather="users"></span>
              Print Panel Report
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="panelprint1.php">
              <span data-feather="users"></span>
              Print Submited SSF
            </a>
          </li>
           <li class="nav-item">
          <a class="nav-link" href="checkstatus.php">
              <span data-feather="users"></span>
              Check Accreditation Status
            </a>
          </li>
        </ul>
<hr class="featurette-divider">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Accreditation Panel</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
           <li class="nav-item">
            <a class="nav-link" href="addpanel2.php">
              <span data-feather="file"></span>
              Add panel Member
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="panelRemoveMember.php">
              <span data-feather="shopping-cart"></span>
              Remove Panel Member
            </a>
          </li>
          <hr class="featurette-divider">
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h5 class="text-muted">Wel Come: <?php echo $_SESSION['admin'];?></h5>
        <div class="alert"></div>
          <div class=" me-2">
            <button type="button"  class="btn btn-sm btn-secondary "><a href="newadmin.php">Add Admin</a></button>
            <button type="button" class="btn btn-sm btn-secondary"><a href="admindelete.php">Remove Admin</a></button>
          </div>
        </div>
      <h6 id="msg" style="text-align: center; color: red;" class="alert-link" ><?php echo $_SESSION["msg"];?></h6>


      
