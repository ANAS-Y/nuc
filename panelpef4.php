
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
<h5 style="text-align: center;">ADMINISTRATION OF COLLEGE/SCHOOL/ FACULTY/DEPARTMENT/NON-TEACHING STAFF </h5>
</div>
<form>
 <div class="form-row">
  <label  class=" text-responsive">The administration of College/School/Faculty/Department is</label>
  </div>
   <div class="form-row">
    <div class="col">
    <select id="status" id="objectives" name="objectives"class="form-control" required>
        <option selected ></option>
        <option>Run by Senior Lecturer and above) and very effective and efficient (score 3) </option>
        <option>Run by Senior Lecturer and above) and fairly efficient (score 1)</option>
        <option>Run by an inexperienced academic and generally ineffective and inefficient(score 0) </option>
      </select>
          </div>
    <div class="col">
      <input type="number" id="score" name="score" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
       <div class="col">
     <textarea  id="Comment1" name="comment1" required="required"cols="3" rows="2" class="form-control" > Comments if any</textarea> 
      </div>
  </div>
  <div class="form-row">
  <label  class=" text-responsive">Non-Teaching Staff</label>
  </div>
  <div class="form-row">
    <div class="col-sm-4">
    <select  id="curriculum" name="curriculum"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>Adequate in number and quality (score 3)</option>
        <option>Not adequate in number but of good quality (score 2)</option>
        <option>Inadequate in number and of poor quality (score 0)</option>
      </select>
          </div>
    <div class="col">
      <input type="number" id="score1" name="score1" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
       <div class="col">
     <input type="text" id="Comment2" name="comment2" required="required" class="form-control" placeholder="Comments if any">
      </div>
      
  </div>



</div>
</div>
<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">STAFF DEVELOPMENT PROGRAMME AND PHYSICAL FACILITIES FOR THE PROGRAMME </h5>
</div>
  <div class="form-row">
    <label for="satus" class="col text-responsive">Standard Of Staff Development Programme </label>
</div>
  <div class="form-row">
    <div class="col-sm-5">
    <select id="standard" name="standard"class="form-control" onchange="scoreSelect()" >
        <option selected ></option>
        <option>Staff development programme exists, and at least 70% of the teaching staff of the department
         have benefited from it(score 5)</option>
        <option>Staff development   programme exists and 60-69% of the teaching staff of the department have
         benefited from it (score 3)</option>
        <option>Staff development   programme exists and 50-59%of the teaching staff of the department have
         benefited from it (score 1)</option>
        <option>Below 50% of the teaching staff of the department have benefitted from it or no staff development 
        programme exists (score 0)</option>
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
  <label  class=" text-responsive">Space The space in the existing laboratories is:</label>
  </div>
   <div class="form-row">
    <div class="col-sm-5">
    <select  id="evaluation" name="evaluation"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>Adequate  and meets the provisions of the MAS on space standard by 70% or more (score 4)</option>
        <option>Fairly adequate and meets more than 60% but less than 70%  of the prescribed NUC space standards(score 2) </option>
        <option> Meets more than 50% but less than 60% of the NUC space standards (score 1)</option>
        <option> Meets less than 50% of prescribed space requirements(score 0)</option>

      </select>
          </div>
          <div class="col">
      <input type="number" id="score3" name="score3" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
      <div class="col">
     <input type="text" id="Comment4" name="comment4" required="required" class="form-control" placeholder="Comments if any">
      </div>
           </div>
 <div class="form-row">
 <div class="col">
 <a class="btn btn-primary login-btn" href="panelpef3.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>
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