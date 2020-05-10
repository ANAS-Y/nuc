<?php require ('mainHeader.inc');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
}
$email =  input_check($_POST["email"]);
$password = sha1(input_check($_POST["psw"]));
 
include_once("connection.php");
            /* Performing SQL query */
$sql = "SELECT * FROM `panelmembers` WHERE  email ='$email' AND password ='$password'";
if (!mysqli_query($db_link,$sql)){ die("Faild  to check email" . mysqli_error($db_link));}   
$result = mysqli_query($db_link,$sql);
if(mysqli_num_rows($result) > 0){
$fetch =mysqli_fetch_assoc($result);
$position =$fetch['position'];

mysqli_close($db_link);
$_SESSION["position"]=$position;
$_SESSION["loginStatus"]='login';
$_SESSION['accID'] ="";
header('location:panelpef.php');
} 
else{
    mysqli_close($db_link);
  $_SESSION["msg"]= ' Incorrect Email or Password'; 
}
}  
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h4 style="text-align: center; font-family: fantasy;color:#2C7337 ;">ACCREDITATION PANEL'S LOGIN AREA</h4>
</div>
<div class="jumbotron login-form" id="requestLogin">
<h4 style="text-align: center;color: red; font-family:fantasy;"><?php echo $_SESSION["msg"];?></h4>

 <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<div class="form-row">
            <label for="email" class="col-sm-3"><b>User Email</b></label>
        <div class="col-sm-9">
            <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
        </div>
            <label for="psw" class="col-sm-3"><b>Password</b></label>
        <div class="col-sm-9">
            <input type="password"  class="form-control"placeholder="Enter Password" name="psw" required>
        </div>
</div>
    
    <div class="form-row">
    <button type="submit" class="btn btn-primary login-btn" style="margin-left: 27%;">Login</button>
    </div>
    <div class="form-row" style="margin-left: 27%;">
     
    
      <div class="col"><input type="checkbox"  checked="checked" name="remember"> <label for="remeber" >Remember me</label></div>
     
    </div>

    <div class="form-row"style="margin-left: 40%;" >
    <div class="col" >
     <span style="color:blue;" class="psw">Forgot<a href="panel.fpassword.php" style="color:red;"> password?</a></span>
    </div>
    </div>
  </div>

</form>

<!-- first div closing tag -->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');
$_SESSION["msg"]='';
?>