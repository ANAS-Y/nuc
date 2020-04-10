
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">PROGRAMME EVALUATION FORM (NUC/PEF) APENDIX E</h3>
<h6 style="text-align: center;">"E/F" (PROGRAMME FUNDING AND EMPLOYERS RATING OF GRADUATES  )</h6>
</div>

  

  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >
<div class="card-title " >
<h5 style="text-align: center;">AVAILABLE COMPUTERS IN THE LIBRARY AND FUNDING THE PROGRAMME</h5>
</div>
<form>
 <div class="form-row"> 
 <label  class=" text-responsive">Computers in the Library for Staff and Students are: </label>
  </div>
   <div class="form-row">
    <div class="col">
    <select id="status" id="objectives" name="objectives"class="form-control" required>
        <option selected ></option>
        <option>Very adequate (1 computer to 5 students)(score 3) </option>
        <option>Adequate (1 computer to 7 Students)  (score 2)</option> 
        <option>Fairly Adequate (1 computer to 8 students)  (score 1) </option>
        <option>Not adequate (any other higher ratio) (score 0) </option>
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
  <label  class=" text-responsive">Financing of the programme for which accreditation is required is:</label>
  </div>
  <div class="form-row">
    <div class="col-sm-4">
    <select  id="curriculum" name="curriculum"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>Very adequate (score 3)</option>
        <option>Adequate (score 2)</option>
        <option>Fairly adequate  (score 1)</option>
         <option>Not adequate (score 0)</option>
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
<h5 style="text-align: center;">EMPLOYERS RATING OF GRADUATES </h5>
</div>
  <div class="form-row">
    <label for="satus" class="col text-responsive">Graduates performances on the job are:</label>
</div>
  <div class="form-row">
    <div class="col-sm-5">
    <select id="standard" name="standard"class="form-control" onchange="scoreSelect()" >
        <option selected ></option>
        <option>Very good (Score 2) </option>
        <option>Average (Score 1) </option>
        <option>Below average (Score 0)</option>
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
  UNIVERSITIES THAT HAVE NOT GRADUATED STUDENTS 
  <label  class=" text-responsive">Students performance during supervised industrial and other similar experience are:</label>
  </div>
   <div class="form-row">
    <div class="col-sm-5">
    <select  id="evaluation" name="evaluation"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>Very good (Score 2) </option>
        <option>Average (Score 1) </option>
        <option>Below average (Score 0)</option>
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
 <a class="btn btn-primary login-btn" href="panelpef6.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>
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