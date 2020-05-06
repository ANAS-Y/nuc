<?php 
require ('header1.inc');
include_once("connection.php");
$accreditationID = $_SESSION["accreditationID"];
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM accreditationrequest_apply WHERE accreditationID = '$accreditationID'";
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of request" . mysqli_error($db_link));    
}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
    $_SESSION["msg"]= "ACCREDITATION REQUEST ALREADY SUBMITED";
    header('location:apply.home.php');
}
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">ACCREDITATION REQUEST</h3>
</div>
  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >

<form method="POST" action="submitApply.php">
    <div class="form-group">
    <label for="aReasons">What are the reasons for requesting accreditation?</label>
    <textarea class="form-control"  required="required" id="areasons" rows="7" name="reasons"></textarea>
  </div>
 
  <div class="form-row">
     <label for="adate" class="col-sm-5" >Proposed Accreditation Date </label>
     <div class="col-sm-7">
      <input type="date" class="form-control" required="required" placeholder="Established Date" id="adate"name="adate">
    
    </div>
  </div>


</div>
</div>
<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">APPLICANT DECLARATION</h5>
</div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="vcFame" name="vcFname" required="required" class="form-control" placeholder="First name">
      </div>
      <div class="col">
      <input type="text" id="vcLame" name="vcLname" required="required" class="form-control" placeholder=" Surname">
      </div>
    <div class="col">
      <input type="text" id="vcOname" name="vcOname" class="form-control" placeholder="Other name">
      </div>
  </div>
  <div class="form-row">
     <div class="form-row" style="margin-left:0%;">
      <div class="col"><input type="checkbox" required="required"  name="agree"> <label for="remeber" >I Confirmed that the Information
      provided Here are correct</label></div>
     
    </div>
</div>

</div>
 
 <div class="form-row">
 <div class="col">
<a class="btn btn-primary login-btn" href="apply.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>

 </div>
 <div class="col">
 <button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">SUBMIT</button>
 </div>
 </div>

 </form>
 </div>
 </div>
 
<!-- first row closing tag-->
</div>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>