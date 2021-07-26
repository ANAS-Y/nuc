<?php 
require ('admin.header.inc');
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="row" >
 <div class="col" >
<select class="form-control" onchange="addProgramme(this.value)"">
<option>Please Select University</option>
<?php
include_once("connection.php");
$sql2 = "SELECT * FROM `universityinfo_ssf`";
if (!mysqli_query($db_link,$sql2)){die("Faild  to check the university info" . mysqli_error($db_link));}
$result2 = mysqli_query($db_link,$sql2);
while($fetch2 = mysqli_fetch_assoc($result2)){
  $University = $fetch2["universityName"];
$universityID = $fetch2["universityID"];


  //echo'<a class="dropdown-item"    ></a>';
  echo'<option value="'.$universityID.'" id="unName" >'. $University.'</option>'; 
}
	
?>           
  </select>       
</div>
</div>
<div class="row" id="forms" style="visibility: hidden;"  >
<!-- first column start here-->
<div class="col card form-category" >
<div class=" card form-category"   >
<div class="card-title " >
<h5 style="text-align: center;" id="txt">Programme Details</h5>
<h6  class="alert" style="  text-align: center; color: red;   font-size: 14px;"  > </h6>
</div>
<form action="applyNext1.php" method="post" >
    <div class="form-row">
    <div class="col">
      <input type="text" required="required" id="faculty" onclick="" name="faculty"class="form-control" placeholder="Faculty">
    </div>
  </div>
  <div class="form-row">
   <div class="col">
      <input type="text" required="required" id="department"   name="department"class="form-control" placeholder="Department">
    </div>
    <div class="col">
      <input type="text" required="required" id="programme"  name="programme"class="form-control" placeholder="programme">
    </div>
  </div>
  <div class="form-row">
  <label for="satus" class="col-sm-4 text-responsive">Current Programe Status</label>
    <div class="col-sm-8">
    <select id="status"   name="status"class="form-control">
        <option selected >Select status</option>
        <option>New programe/New Department</option>
        <option>Accreditated Department/New Programme</option>
        <option>Other</option>
      </select>
          </div>
      </div>
  <div class="form-row">
     <label for="pdate" class="col-sm-3" >Date Established </label>
     <div class="col-sm-9">
      <input type="date" class="form-control" placeholder="Established Date" id="pdate"name="pdate">
    
    </div>
  </div>
   <div class="form-row">
     <label for="adate" class="col-sm-5" >Proposed Accreditation Date </label>
     <div class="col-sm-7">
      <input type="date" class="form-control" required="required" placeholder="Established Date" id="adate"name="adate">
    
    </div>
  </div>
</div>
</div>

<!-- Second column start here-->
<div class="col card form-category" >
<div class="card form-category p-2" >

<div class="card-title ">
<h5 style="text-align: center;">HOD's Information</h5>
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
      </div>
      <div class="form-row">
      <div class="col">
      <input type="text" id="phone" name="phone" required="required"class="form-control" placeholder="Phone Number">
      </div>
      </div>
      <div class="form-row">
    <div class="col">
      <input type="text" id="Qualification" name="Qualification" required="required"class="form-control" placeholder="Highest Qualification">
      </div>
      </div>
 
 </div>
<!-- first row closing tag-->
 <div class="form-row">
 <div class="col">
     <button type="submit" class="btn btn-primary login-btn" style="margin:0 auto; width:100%; ">Submit</button>
    </div>
    </div>
    </form>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<!-- first div closing tag-->
<?php require ('footer.inc');
$_SESSION["msg"]='';
?>
</div>
<!-- Container closing tag-->

