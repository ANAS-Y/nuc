
<?php require ('mainHeader.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">ACCREDITATION REQUEST</h3>
</div>
<?php
$numRow ='';
$faculty ="Science";
$department="Computer Science";	
$programme ="Computer Science";
$status="New Department/New programme";
$edate ="12/6/2020";
$hod_fuulName ="Anas Yunusa Adamu";
$hod_contact ="08086777408/yunusa.anas.ay@gmail.com";
$hod_qualification ="B.Tech Computer Science";

?>
<input type="hidden" id="numRow"value="<?php echo $numRow; ?>"/>
<div class="row">
<!-- Third column start here-->
<div class="col card form-category" id="filled-section" style="display:none;">
<div style="background-color:#7CC68D; color: white;">
<h5 style="text-align:center;">SAVED PROGRAMMES</h5>
</div>
<?php
 if ($numRow >0 ){
    echo'
    <table class="table">
<tr class="trheader">
	<td>Faculty</td>
	<td>Department</td>
	<td>Programme</td>
    <td>Status</td>
	<td>Date Establish</td>
	<td> HOD Name</td>
	<td>HOD Contact</td>
	<td>HOD Qualification</td>
</tr>';

    for ($i=0; $i<=$numRow; $i++){
    echo'
    <tr class="tr">
	<td>A$i</td>
	<td>B</td>
	<td>C</td>
	<td>D</td>
	<td>E</td>
	<td>F</td>
	<td>G</td>
	<td>H</td>
    </tr>';
    }
 echo'</table>';
 }
?>

  
  </div>
  </div>
  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >
<div class="card-title " >
<h5 style="text-align: center;">Programme Details</h5>
</div>
<form>
    <div class="form-row">
    <div class="col">
      <input type="text" required="required" id="faculty"  name="faculty"class="form-control" placeholder="Faculty">
    </div>
  </div>
  <div class="form-row">
   <div class="col">
      <input type="text" required="required" id="department"  name="department"class="form-control" placeholder="Department">
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
  
  
<div class="card-title ">
<h5 style="text-align: center;"></h5>
</div>


</div>
</div>
<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

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
      <input type="text" id="vcOname" name="vcOname" required="required"class="form-control" placeholder="Other name">
      </div>
  </div>
  <div class="form-row">
    <div class="col">
      <input type="email" id="email" name="vcFname" required="required" class="form-control" placeholder="Email">
      </div>
      <div class="col">
      <input type="text" id="phone" name="phone" required="required"class="form-control" placeholder="Phone Number">
      </div>
    <div class="col">
      <input type="text" id="Qualification" name="Qualification" required="required"class="form-control" placeholder="Highest Qualification">
      </div>
</div>
<div class="form-row">
      <label class="col"id="msg" style="color: red;margin:auto ;text-align: center;">Click Save before you procced!</label>
      </div>

</div>
 
 <div class="form-row">
 <div class="col">
<button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Save</button>
 </div>
 <div class="col">
<a class="btn btn-primary login-btn" href="apply.submit.php" style="float: right;margin-right: 4%; width: 95%; ">Next</a>
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