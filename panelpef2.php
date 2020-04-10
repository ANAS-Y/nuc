
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
<h5 style="text-align: center;">PRACTICAL WORK/DEGREE PROJECT AND STUDENTS COURSE EVALUATION </h5>
</div>
<form>
 <div class="form-row">
  <label  class=" text-responsive">Practical Work/Degree Project</label>
  </div>
   <div class="form-row">
    <div class="col">
    <select id="practical" name="practical"class="form-control" required>
        <option selected ></option>
        <option>Good quality</option>
        <option>Fairly good quality</option>
        <option>Poor quality </option>
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
  <label  class=" text-responsive">Students Course Evaluation</label>
  </div>
  <div class="form-row">
    <div class="col-sm-4">
    <select  id="course" name="course"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>The course content and other learning materials are adequate </option>
        <option>The course content and other learning materials are Fairly adequate</option>
        <option>The course content and other learning materials are Not adequate</option>
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
<h5 style="text-align: center;">EXTERNAL EXAMINERS SYSTEM </h5>
</div>
  <div class="form-row">
    <label for="satus" class="col-sm-6 text-responsive">Standard Of External examiners system</label>
</div>
  <div class="form-row">
    <div class="col-sm-5">
    <select id="standard" name="standard"class="form-control" onchange="scoreSelect()" >
        <option selected ></option>
        <option>External examiners system exist and its very effective </option>
        <option>External examiners system exist and its Fairly effective</option>
        <option>External examiners system exist but poor and its Not effective</option>
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
 <div class="col">
 <a class="btn btn-primary login-btn" href="panelpef1.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>
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