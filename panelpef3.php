
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">PROGRAMME EVALUATION FORM (NUC/PEF) APENDIX E</h3>
<h6 style="text-align: center;">"B" (Staffing )</h6>
</div>

  

  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >
<div class="card-title " >
<h5 style="text-align: center;">ACADEMIC STAFF (Staff/Student Ratio and Staff Mix by Rank ) </h5>
</div>
<form>
   <div class="form-row">
    <div class="col">
       <input type="number" id="staffNo" name="StaffNo" required="required" class="form-control" placeholder="Actual number of academic staff">
      </div>
       <div class="col">
       
       <input type="number" id="studentsNo" name="studentsNo" required="required" class="form-control" placeholder="Actual Number of students">
       </div>
        
  </div>
  
  <div class="form-row">
  <div class="col">
         <input type="number" id="ratio" name="ratio" required="required" class="form-control" placeholder="Actual Teacher to Student Ratio">
       </div>
  </div>
  <div class="form-row">
  <label  class=" text-responsive">The actual staff/student ratio of the programme</label> 
  </div>
  <div class="form-row">
    <div class="col-sm-4">
    <select  id="staff" name="staff"class="form-control" onchange="scoreSelect2()">
        <option selected > </option>
        <option>The ratio complies with the NUC guidelines more than 70% </option>
        <option>The ratio complies less than 70% but more than 60% with the NUC guidelines  </option>
        <option>The ratio complies less than 60% but more than 50% with the NUC guidelines</option>
        <option>The ratio complies less than 50% with the NUC guidelines</option>
      </select>
          </div>
    <div class="col">
      <input type="number" id="score" name="score" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
       <div class="col">
     <input type="text" id="Comment" name="comment" required="required" class="form-control" placeholder="Comments if any">
      </div>
      
  </div>
   <div class="form-row">
    <label for="satus" class="col-sm-6 text-responsive">Staff Mix by Rank </label>
</div>
  <div class="form-row">
    <div class="col-sm-5">
    <select id="standard" name="standard"class="form-control" onchange="scoreSelect()" >
        <option selected ></option>
        <option>Consistent with the NUC  guidelines in all three categories(score 5)</option>
        <option>Follows the NUC guidelines in one  category only (score 3) </option>
        <option>Does not meet the NUC guidelines in any of the categories (score 0)</option>
      </select>
          </div>
    <div class="col">
      <input type="number" id="score2" name="score2" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
      <div class="col">
     <input type="text" id="Comment3" name="comment3" required="required" class="form-control" placeholder="Comments if any">
      </div>
  </div>



</div>
</div>
<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">QUALIFICATIONS OF THE TEACHING STAFF AND COMPETENCE OF TEACHING STAFF</h5>
</div>
  <div class="form-row">
    <label for="satus" class="col-sm-6 text-responsive">Qualifications of the Teaching Staff</label>
</div>
  <div class="form-row">
    <div class="col-sm-5">
    <select id="standard" name="standard"class="form-control" onchange="scoreSelect()" >
        <option selected ></option>
        <option>70% or more have a Ph.D (score 7) </option>
        <option>Less than 70% but more than 60% have a Ph.D (score 4)</option>
        <option>Less than 60% but more than 50% have a Ph.D  (score 2)</option>
        <option>Less than 50% have a Ph.D (score 0)</option>
      </select>
          </div>
    <div class="col">
      <input type="number" id="score2" name="score2" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
      <div class="col">
     <input type="text" id="Comment3" name="comment3" required="required" class="form-control" placeholder="Comments if any">
      </div>
  </div>
  <div class="form-row">
  <label  class=" text-responsive">Competence of Teaching Staff</label>
  </div>
   <div class="form-row">
    <div class="col-sm-5">
    <select  id="curriculum" name="curriculum"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>Competent (score 1)</option>
        <option>Not competent (score 0)</option>
        </select>
          </div>
    <div class="col">
      <input type="number" id="score4" name="score4" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
       <div class="col">
     <input type="text" id="Comment4" name="comment4" required="required" class="form-control" placeholder="Comments if any">
      </div>
      
  </div>
  
 <div class="form-row">
 <div class="col">
 <a class="btn btn-primary login-btn" href="panelpef2.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>
 </div>
 <div class="col">
 <button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Next</button>
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