
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">ACCREDITATION PANEL REPORT FORM (APENDIX F)</h3>
<h6 style="text-align: center;">Summary of Panel s Findings</h6>
<h6 style="text-align: center;">"A" (Academic Matters)</h6>
</div>

  

  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >
<div class="card-title " >
<h5 style="text-align: center;">VISITATION DETAILS</h5>
</div>
<form>
    <div class="form-row">
    <div class="col">
      <input type="text" required="required" id="university"  name="university"class="form-control" placeholder="Name of University Visited">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <input type="text" required="required" id="faculty"  name="faculty"class="form-control" placeholder="Department/Faculty/School/College of the Programme seeking Accreditation ">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <input type="text" required="required" id="programme"  name="programme"class="form-control" placeholder="Programme for which accreditation is being sought">
    </div>
  </div>
  <div class="form-row">
     <label for="pdate" >Date of Visit:      FROM </label>
     <div class="col">
      <input type="date" class="form-control"  id="fdate"name="fdate">
    </div>
    <label for="pdate" >TO </label>
     <div class="col">
      <input type="date" class="form-control"  id="tdate"name="tdate">
    </div>
  </div>


</div>
</div>
<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">PHILOSOPHY AND OBJECTIVES</h5>
</div>
<form>
<div class="form-row" >
     <div class="form-group" >
        <textarea class="form-control" id="curriculum" rows="6" cols="60" name="objectives" required="required">
        Philosophy and objectives of the Programme </textarea>
  </div>
  </div>
  
 <div class="form-row">
 <div class="col">
 <a class="btn btn-primary login-btn" href="hodssf1.php" style="float: right;margin-right: 4%; width: 95%; ">Save</a>
 </div>
 <div class="col">
 <button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; " onclick="score()">Next</button>
</div>
 </div>
<br />
 </form>
 </div>
 </div>
 
<!-- first row closing tag-->
 </div>
<!-- first div closing tag-->
</div>
</div>
</div>
<!-- Container closing tag-->

<?php require ('footer.inc');?>