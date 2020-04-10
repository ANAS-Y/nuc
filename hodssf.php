
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:B Part I (PROGRAMME/SUB-DISCIPLINE/DISCIPLINE TO BE ACCREDITED)</h6>
</div>

  
  </div>
  </div>
  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >
<div class="card-title " >
<h5 style="text-align: center;">PROGRAMME TO BE ACCREDITED</h5>
</div>
<form>
    <div class="form-row">
    <div class="col">
      <input type="text" required="required" id="faculty"  name="faculty"class="form-control" placeholder="Title of programme/sub-discipline/discipline to be accredited ">
    </div>
  </div>
  <div class="form-row">
  <div class="col">
      <select id="owner" class="form-control" name="accreditationType">
        <option selected>Select Accreditation Type</option>
        <option>Initial Accreditation</option>
        <option>Re-accreditation</option>
      </select>
    </div>
    <div class="col">
      <input type="text" required="required" id="faculty"  name="school"class="form-control" placeholder="Name of Faculty/School/College">
    </div>
  </div>
      
    <div class="form-row">
    <label class=" col text-responsive" >Has any NUC Accreditation Panel visited your University to determine if the 
Programme/sub-discipline/discipline can be accredited? <label class="form-check-label" for="Yes"> Yes</label>
    <input class="" type="radio" name="Yes" id="Yes" value="Yes" onclick="lawYes()"/>
    
    <label class="form-check-label" for="No"> No</label>
    <input class="" type="radio" name="No" id="No" value="No" onclick="lawNo()"/>
  </label>
   <div class="form-group" hidden="hidden"style="float: right;" id="lawUpload" >
    <label for="lawCopy" style="color: red;">Attach a photocopy of NUC Decision</label>
    <input type="file" class="form-control-file" id="lawCopy" name="lawCopy">
  </div>
  </div>
  <div class="form-row">
      <div class="col">
      <input type="text" required="required" id="department"  name="department"class="form-control" placeholder="Department">
  </div>
     <label for="pdate" >Date Established </label>
     <div class="col">
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
<h5 style="text-align: center;">FACULTY DEAN's/HOD's INFORMATION</h5>
</div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="dFame" name="dFname" required="required" class="form-control" placeholder="Dean's Full name">
      </div>
      <div class="col">
      <input type="text" id="dqualification" name="dqualification" required="required"class="form-control" placeholder=" Dean's Quqlification(s)">
      </div>
  </div>
  
  <div class="form-row">
    <div class="col">
     <input type="text" id="hFame" name="hFname" required="required" class="form-control" placeholder="HOD's Full name">
      </div>
      <div class="col">
       <input type="text" id="hqualification" name="hqualification" required="required"class="form-control" placeholder=" HOD's Quqlification(s)">
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
<a class="btn btn-primary login-btn" href="hodssf1.php" style="float: right;margin-right: 4%; width: 95%; ">Next</a>
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