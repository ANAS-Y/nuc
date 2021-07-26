
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
  $sql = "SELECT * FROM `physicalfacilities_pef` WHERE accreditationID= '$accreditationID' AND ID='$ID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

             /* Performing SQL query */
if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){ 
  /* Closing connection */
mysqli_close($db_link);
header('location:panelpef6.php');
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
        $objectives = input_check($_POST["objectives"]);
       $score = input_check($_POST["score"]);
       $comment = input_check($_POST["comment"]);
       $curriculum = input_check($_POST["curriculum"]);
       $score1 = input_check($_POST["score1"]);
       $comment1 = input_check($_POST["comment1"]);
       $curriculum2 = input_check($_POST["standard"]);
       $score2 = input_check($_POST["score2"]);
       $comment2 = input_check($_POST["comment2"]);
       $curriculum3 = input_check($_POST["evaluation"]);
       $score3 = input_check($_POST["score3"]);
       $comment3 = input_check($_POST["comment3"]);

  
$sql = "INSERT INTO `physicalfacilities_pef`(`accreditationID`, `content`, `remark`, `score`, `comment`, `ID`) 
VALUES 
('$accreditationID','The laboratory equipment inspected meet the MAS specifications','$objectives','$score','$comment','$ID'),
('$accreditationID','Classroom space available meets the space standards specified in the MAS','$curriculum','$score1','$comment1','$ID'),
('$accreditationID','The equipment and furniture','$curriculum2','$score2','$comment2','$ID'),
('$accreditationID','Staff Offices','$$curriculum3','$score3','$comment3','$ID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert acc1" . mysqli_error($db_link)); }

$_SESSION["msg"]= "Submited Sucessfully";
/* Closing connection */
mysqli_close($db_link);
header('location:panelpef6.php');
}

?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">PROGRAMME EVALUATION FORM (NUC/PEF) APENDIX E</h3>
<h6 style="text-align: center;">"C" (PHYSICAL FACILITIES FOR THE PROGRAMME )</h6>
</div>

  

  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >
<div class="card-title " >
<h5 style="text-align: center;">LABORATORIES/CLINICS/STUDIOS FOR THE PROGRAMME </h5>
</div>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
 <div class="form-row"> 
 <label  class=" text-responsive">The laboratory equipment inspected meet the MAS specifications up to </label>
  </div>
   <div class="form-row">
    <div class="col">
    <select id="status" id="objectives" name="objectives"class="form-control" required>
        <option selected ></option>
        <option>70% or more(score 7) </option>
        <option>60% but less than 70%(score 4)</option> 
        <option>50% but less than 60% (score 2) </option>
        <option>Less than 50%(score 0) </option>
      </select>
          </div>
    <div class="col">
      <input type="number" id="score" name="score" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
       <div class="col">
     <textarea  id="Comment1" name="comment" required="required"cols="3" rows="2" class="form-control" > Comments if any</textarea> 
      </div>
  </div>
  <div class="form-row">
  <label  class=" text-responsive">Classroom space available meets the space standards specified in the MAS by:</label>
  </div>
  <div class="form-row">
    <div class="col-sm-4">
    <select  id="curriculum" name="curriculum"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>70% or more(score 5)</option>
        <option>60% but less than 70% (score 3)</option>
        <option>50% but less than 60% (score 1)</option>
         <option>Less than 50%(score 0)</option>
      </select>
          </div>
    <div class="col">
      <input type="number" id="score1" name="score1" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
       <div class="col">
     <input type="text" id="Comment2" name="comment1" required="required" class="form-control" placeholder="Comments if any">
      </div>
      
  </div>



</div>
</div>
<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">CLASSROOM EQUIPMENT AND OFFICE ACCOMMODATION</h5>
</div>
  <div class="form-row">
    <label for="satus" class="col-sm-6 text-responsive">The equipment and furniture are </label>
</div>
  <div class="form-row">
    <div class="col-sm-5">
    <select id="standard" name="standard"class="form-control" onchange="scoreSelect()" >
        <option selected ></option>
        <option>Adequate and well maintained (score 3)</option>
        <option>Adequate but not well maintaineslightly inadequate but well maintained (score 1)</option>
        <option>Inadequate and not well maintained (score 0)</option>
      </select>
          </div>
    <div class="col">
      <input type="number" id="score2" name="score2" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
      <div class="col">
     <input type="text" id="Comment3" name="comment2" required="required" class="form-control" placeholder="Comments if any">
      </div>
  </div>
  <div class="form-row">
  <label  class=" text-responsive">Staff Offices are:</label>
  </div>
   <div class="form-row">
    <div class="col-sm-5">
    <select  id="evaluation" name="evaluation"class="form-control" onchange="scoreSelect()">
        <option selected ></option>
        <option>Adequate in space and well equipped (score 5)</option>
        <option>Slightly inadequate in space but well equipped (score 3) </option>
        <option> Adequate in space but ill-equipped OR inadequate in space but well equipped (score 1)</option>
        <option> Inadequate in space and ill-equipped or inappropriate (score 0)</option>

      </select>
          </div>
          <div class="col">
      <input type="number" id="score3" name="score3" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
      <div class="col">
     <input type="text" id="Comment4" name="comment3" required="required" class="form-control" placeholder="Comments if any">
      </div>
           </div>
 <div class="form-row">
  <div class="col">
 <button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Submit</button>
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