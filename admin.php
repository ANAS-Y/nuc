<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h4 style="text-align: center; font-family: fantasy;color:#2C7337 ;">ADMIN LOGIN AREA</h4>
</div>
<div class="jumbotron login-form" id="requestLogin">
 <form action="" method="post">
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
    
  </div>

</form>

<!-- first div closing tag -->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>