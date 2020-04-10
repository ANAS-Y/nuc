
<?php require ('header1.inc');?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">PROGRAMME EVALUATION FORM (NUC/PEF) APENDIX E</h3>
<h6 style="text-align: center;">"D" (LIBRARY, SAFETY AND ENVIRONMENTAL SANITATION OF TEACHING FACILITIES )</h6>
</div>

  

  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >
<div class="card-title " >
<h5 style="text-align: center;">ENVIRONMENTAL SANITATION OF TEACHING FACILITIES AND LIBRARY HOLDINGS</h5>
</div>
<form>
 <div class="form-row"> 
 <label  class=" text-responsive">Teaching facilities for the programme and the environment are: </label>
  </div>
   <div class="form-row">
    <div class="col">
    <select id="status" id="objectives" name="objectives"class="form-control" required>
        <option selected ></option>
        <option>Safe, comply with all government Laws relating to fire and environmental sanitation (score 3) </option>
        <option>Reasonably safe, comply with most government Laws relating to fire and environmental sanitation (score 2)</option> 
        <option>Unsafe, violate government Laws relating to fire and environmental sanitation(score 0) </option>
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
  <label  class=" text-responsive">Physical Library Holdings Number and Quality </label>
  </div>
  <div class="form-row">
    <div class="col-sm-4">
    <select  id="curriculum" name="curriculum"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>Adequate in number and of good quality(score 6)</option>
        <option>Fairly adequate in number and of good quality(score 3)</option>
        <option>Inadequate in number but of good quality (score 1)</option>
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
<h5 style="text-align: center;">CURRENCY OF LIBRARY HOLDINGS AND e-LIBRARY</h5>
</div>
  <div class="form-row">
    <label for="satus" class="col-sm-6 text-responsive">Library holdings are: </label>
</div>
  <div class="form-row">
    <div class="col-sm-5">
    <select id="standard" name="standard"class="form-control" onchange="scoreSelect()" >
        <option selected ></option>
        <option>Very current for both books and journals (Score 4) </option>
        <option>Very current for books but fairly current for journals or vice versa (Score 3) </option>
        <option>Fairly current for books and journals (Score 2)</option>
        <option>Current for books but not current for journals  or vice versa (Score 1)</option>
        <option>Not current at all for both books and journals(Score 0)</option>
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
  <label  class=" text-responsive">Subscription to e-Books and e-Journals Relevant to the programme, the Library has:</label>
  </div>
   <div class="form-row">
    <div class="col-sm-5">
    <select  id="evaluation" name="evaluation"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>Subscription to adequate number of very current e-books and e-journals(score 5)</option>
        <option>Subscription to fairly adequate number of e-books and e-journals (score 3) </option>
        <option> Subscription to current e-books but not to current e-journals or vice versa  (score 1)</option>
        <option> No subscription to e-books and e-journals (score 0)</option>

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
 <a class="btn btn-primary login-btn" href="panelpef5.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>
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