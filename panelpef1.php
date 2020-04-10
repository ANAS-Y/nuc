
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">PROGRAMME EVALUATION FORM (NUC/PEF) APENDIX E</h3>
<h6 style="text-align: center;">"A" (Academic Matters )</h6>
</div>

  

  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >
<div class="card-title " >
<h5 style="text-align: center;">ADMISSION REQUIREMENTS INTO THE PROGRAMME AND ACADEMIC REGULATIONS  </h5>
</div>
<form>
 <div class="form-row">
  <label  class=" text-responsive">Admission Requirements Into The Programme</label>
  </div>
   <div class="form-row">
    <div class="col">
    <select id="status" id="objectives" name="objectives"class="form-control" required>
        <option selected ></option>
        <option>All students meet the admission requirements</option>
        <option>At least 80% of the students meet the admission requirements</option>
        <option>Less than 80% of the students meet the admission requirements</option>
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
  <label  class=" text-responsive">Academic regulations are</label>
  </div>
  <div class="form-row">
    <div class="col-sm-4">
    <select  id="curriculum" name="curriculum"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>Available quite clear</option>
        <option>Available not clear</option>
        <option>Not available</option>
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
<h5 style="text-align: center;">STANDARD OF TESTS AND EXAMINATIONS </h5>
</div>
  <div class="form-row">
    <label for="satus" class="col-sm-6 text-responsive">Standard Of Tests And Examinations</label>
</div>
  <div class="form-row">
    <div class="col-sm-5">
    <select id="standard" name="standard"class="form-control" onchange="scoreSelect()" >
        <option selected ></option>
        <option>Very good standard and quality </option>
        <option>Good standard and quality</option>
        <option>Average in standard and quality </option>
        <option>Below average in standard </option>
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
  <label  class=" text-responsive">Evaluation Of Students Work</label>
  </div>
   <div class="form-row">
    <div class="col-sm-5">
    <select  id="evaluation" name="evaluation"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>Marking schemes exist,are well developed</option>
        <option>Marking schemes exist,are fairly well developed</option>
        <option> Marking schemes do not exist</option>
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
 <a class="btn btn-primary login-btn" href="panelpef.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>
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