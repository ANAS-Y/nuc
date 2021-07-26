
<?php require ('header1.inc');
$accreditationID=$_SESSION['accreditationID'];
$ID = $_SESSION['ID'];
function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
    }
    
include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM `staffing_pef` WHERE accreditationID= '$accreditationID' AND ID='$ID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

             /* Performing SQL query */
if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){ 
  /* Closing connection */
mysqli_close($db_link);
header('location:panelpef4.php');
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
        $objectives = input_check($_POST["staff"]);
       $score = input_check($_POST["score"]);
       $comment = input_check($_POST["comment"]);
       $curriculum = input_check($_POST["curriculum1"]);
       $score1 = input_check($_POST["score1"]);
       $comment1 = input_check($_POST["comment1"]);
       $curriculum2 = input_check($_POST["standard"]);
       $score2 = input_check($_POST["score2"]);
       $comment2 = input_check($_POST["comment2"]);
       $curriculum3 = input_check($_POST["standard3"]);
       $score3 = input_check($_POST["score3"]);
       $comment3 = input_check($_POST["comment3"]);

  
$sql = "INSERT INTO `staffing_pef`(`accreditationID`, `content`, `remark`, `score`, `comment`, `ID`) 
VALUES 
('$accreditationID','The actual staff/student ratio of the programme','$objectives','$score','$comment','$ID'),
('$accreditationID','Staff Mix by Rank','$curriculum','$score1','$comment1','$ID'),
('$accreditationID','Qualifications of the Teaching Staff','$curriculum2','$score2','$comment2','$ID'),
('$accreditationID','Competence of Teaching Staff','$$curriculum3','$score3','$comment3','$ID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert acc1" . mysqli_error($db_link)); }

$_SESSION["msg"]= "Submited Sucessfully";
/* Closing connection */
mysqli_close($db_link);
header('location:panelpef4.php');
}

?>
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
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
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
     <input type="text" id="Comment3" name="comment2" required="required" class="form-control" placeholder="Comments if any">
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
    <select id="standard" name="standard3"class="form-control" onchange="scoreSelect()" >
        <option selected ></option>
        <option>70% or more have a Ph.D (score 7) </option>
        <option>Less than 70% but more than 60% have a Ph.D (score 4)</option>
        <option>Less than 60% but more than 50% have a Ph.D  (score 2)</option>
        <option>Less than 50% have a Ph.D (score 0)</option>
      </select>
          </div>
    <div class="col">
      <input type="number" id="score2" name="score3" required="required" class="form-control" placeholder="Score Awarded ">
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
    <select  id="curriculum" name="curriculum1"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>Competent (score 1)</option>
        <option>Not competent (score 0)</option>
        </select>
          </div>
    <div class="col">
      <input type="number" id="score4" name="score1" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
       <div class="col">
     <input type="text" id="Comment4" name="comment1" required="required" class="form-control" placeholder="Comments if any">
      </div>
      
  </div>
  
 <div class="form-row">
 
 <div class="col">
 <button type="submit" class="btn btn-primary login-btn" value="Submit" style="margin-left: 6%;width: 95%; ">Submit</button>
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