<?php
function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
}$_SESSION["msg"]= "";
	require ('admin.header.inc');
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $vcFname = input_check($_POST["vcFname"]);
        $vcLname = input_check($_POST["vcLname"]);
        $vcOname = input_check($_POST["vcOname"]);
        $email = input_check($_POST["email"]);
        $vcPhone = input_check($_POST["phone"]);
         $vcQualification = input_check($_POST["Qualification"]);
          $pwd = sha1(input_check($_POST["pwd"]));
        include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM `admin` WHERE email= '$email'";
 if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of request" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql))> 0){
    $_SESSION["msg"]= "THE ADMIN WITH THIS EMAIL ALREADY EXIST";
        exit;
}
else{
  
$sql = "INSERT INTO `admin`(`firstName`, `surname`, `otherName`, `email`, `telephone1`, `password`)
VALUES ('$vcFname','$vcLname','$vcOname','$email','$vcPhone','$pwd')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert ADMN details" . mysqli_error($db_link));}
$_SESSION["msg"]= "ADMIN ADDED SUCCESSFUL";
 //header('location:admin.home.php');
 ?>
<script>window.location="newadmin.php"</script>
<?php 
    }
    }
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h4 style="text-align: center; font-family: fantasy;color:#2C7337 ;">Adding New Admin</h4>
</div>

 
 
<!-- first div column-->
<div class="row">
<div class="col card form-category">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
  <div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">Admin's Information</h5>
</div>

  <div class="form-row">
    <div class="col">
      <input type="text" id="vcFame" name="vcFname" required="required" class="form-control" placeholder="First name">
      </div>
      <div class="col">
      <input type="text" id="vcLame" name="vcLname" required="required"class="form-control" placeholder=" Surname">
      </div>
    <div class="col">
      <input type="text" id="vcOname" name="vcOname" class="form-control" placeholder="Other name">
      </div>
  </div>
  <div class="form-row">
    <div class="col">
      <input type="email" id="email" name="email" required="required" class="form-control" placeholder="Email">
      </div>
      <div class="col">
      <input type="text" id="phone" name="phone" required="required"class="form-control" placeholder="Phone Number">
      </div>
    <div class="col">
      <input type="text" id="Qualification" name="Qualification" required="required"class="form-control" placeholder="Position ">
      </div>
  </div>
  <div class="form-row">
      <div class="col">
      <input type="password" id="pwd" name="pwd"    required="required"class="form-control" placeholder="password" >
      </div>
      <div class="col">
      <input type="password"  onmouseout="confirmPassword1()"   id="cpwd" name="cpwd" required="required"class="form-control" placeholder="Confirm password">
      </div>
      </div>
      <div class="form-row">
      <label id="msg" style="color: red;">Password must be more than 5 characters</label>
      </div>
      <div class="form-row">
<div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 38%;margin-bottom:1% ;">Submit</button>
 </div>
  </div>

      
  </div>
</div>

 </form>
<!-- first div closing tag -->
</div>
<!-- Container closing tag-->
</div>
</div>
</div>
</div>
<?php require ('footer.inc');
$_SESSION["msg"]= "";?>