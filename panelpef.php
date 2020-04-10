
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
      <input type="text" required="required" id="programme"  name="programme"class="form-control" placeholder="Title of Programme">
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
<h5 style="text-align: center;">CURRICULUM,PHILOSOPHY AND OBJECTIVES</h5>
</div>
 <div class="form-row">
    <label for="satus" class="col-sm-6 text-responsive">Programme philosophy and objectives</label>
</div>
  <div class="form-row">
    <div class="col-sm-5">
    <select id="objectives" name="objectives"class="form-control" onchange="scoreSelect()" >
        <option selected ></option>
        <option>Clearly defined</option>
        <option>Not well stated</option>
        
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
  <label  class=" text-responsive">The curriculum and structure of the programme</label>
  </div>
   <div class="form-row">
    <div class="col-sm-5">
    <select  id="curriculum" name="curriculum"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>Adequate for the degree programme</option>
        <option>Fairly Adequate for the degree programme</option>
        <option> Not Adequate for the degree programme</option>
      </select>
          </div>
    <div class="col">
      <input type="number" id="score1" name="score1" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
       <div class="col">
     <input type="text" id="Comment" name="comment" required="required" class="form-control" placeholder="Comments if any">
      </div>
      
  </div>
  
<div class="form-row">
      <label class="col"id="msg" style="color: red;margin:auto ;text-align: center;">Click Save before you procced!</label>
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
<!-- Container closing tag-->

<?php require ('footer.inc');?>