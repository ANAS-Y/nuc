<?php require ('header1.inc');
function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
$email =  input_check($_POST["email"]);

include_once("connection.php");
            /* Performing SQL query */
$sql = "SELECT * FROM `panelmembers` WHERE  email ='$email'";
if (!mysqli_query($db_link,$sql)){ die("Faild  to check email" . mysqli_error($db_link));}

   $result = mysqli_query($db_link,$sql);
   if(mysqli_num_rows($result) > 0){
    $fetch =mysqli_fetch_assoc($result);
    $email =$fetch["email"];
$_SESSION["msg"]= 'Your password was sent to ' .$email. '<br> please check your inbox or sperm';
} else{

$_SESSION["msg"]= ' Email donot exist or not register with any account';
   }
mysqli_close($db_link);
}
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h4 style="text-align: center; font-family: fantasy;color:#2C7337 ;">PANEL COMMITTEE'S AREA</h4>
</div>
<div class="jumbotron login-form" id="requestLogin">
<h6 style="text-align: center; font-family: fantasy;color:red ;"><?php echo $_SESSION["msg"];?></h6>

 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<div class="form-row">
            <label for="email" class="col-sm-3"><b>User Email</b></label>
        <div class="col-sm-9">
            <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
        </div>
         
</div>
    
    <div class="form-row">
    <button type="submit" class="btn btn-primary login-btn" style="margin-left: 27%;">Reset Password</button>
    </div>
    
     <div class="form-row">
    <div class="col" style="margin-left: 40%;color:blue;">
     <span class="psw">Back to <a href="panel.login.php" style="color:red;"> login page</a></span>
    </div>
    </div>
    
  </div>

</form>
</div>
<!-- first div closing tag -->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>