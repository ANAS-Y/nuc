<?php
	session_start();
    $_SESSION["MSG"]="";
   if( $_SESSION["loginStatus"]!="login"){
        header('location:vchodlogin.php');
   }
elseif($_SESSION['position']!=='VC'){
           header('location:vchodlogin.php'); 
        } 
        
$universityID=$_SESSION['universityID'];
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
          </li>
         <li class="nav-item active">
        <a class="nav-link" href="checkstatus1.php" style="color: white;">CHECK ACCREDITATION STATUS<span class="sr-only">(current)</span></a>
      </li>         
    </ul>
 
       </div>
</nav>
  </div>
<canvas class="my-4 w-100" id="myChart" height="10"></canvas>
<div class="card-title ">
<h5 style="text-align:center;color: red;"><?php echo $_SESSION["MSG"]; ?></h5>
</div>
<h2 style="text-align: center;">Submiting Self-study Form Section A</h2>
      <div class="card border p-3">
      <div class="table-responsive">
     
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<?php
	include_once("connection.php");
$sql = "SELECT* FROM programme_apply WHERE universityID ='$universityID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link));}
$result = mysqli_query($db_link,$sql);
$num_row = mysqli_num_rows(mysqli_query($db_link,$sql));
if( $num_row> 0){
   
    echo '<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class="card form-category" >


<div class="form-row">
    <div class="col">Select program
<select name="accID" class=" form-control" arial-label=".form-select example" id="program " > 
<option value="">Please select programme</option>';

while($fetch=mysqli_fetch_assoc($result) ){
$programme =$fetch["programme"];
$programmeID =$fetch["accreditationID"];
 echo'<option value="'.$programmeID.'" >'.$programme.'</option>';
}
}
else{
    echo '<p>No any programme Uploaded Yet!</p>';
}

 if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["accID"])){
        $_SESSION["msg"]='Please select programme then Continue';
      
        ?>
<script>window.location="vcssf0.php"</script>
<?php 
        exit;
    }
    else{
    $_SESSION["accreditationID"]= $_POST["accID"];
?>
<script>window.location="vcssf.php"</script>
<?php }}?>
</select>
<input type="submit" value="Continue" class="btn btn-success mx-auto col-6 d-block mx-auto" />
</div>
  </div> 
    </form>
      </div>
      </div>
    </main>
  </div>
</div>
</div>
<?php require ('footer.inc');
$_SESSION["msg"]='';
?>

</body>
</html>
