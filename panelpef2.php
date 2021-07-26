
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
  $sql = "SELECT * FROM academiccontent_pef WHERE accreditationID= '$accreditationID' AND ID='$ID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){ 
  /* Closing connection */
mysqli_close($db_link);
header('location:panelpef3.php');
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
        $objectives = input_check($_POST["practical"]);
       $score = input_check($_POST["score"]);
       $comment = input_check($_POST["comment"]);
       $curriculum = input_check($_POST["course"]);
       $score1 = input_check($_POST["score1"]);
       $comment1 = input_check($_POST["comment1"]);
       $curriculum2 = input_check($_POST["standard"]);
       $score2 = input_check($_POST["score2"]);
       $comment2 = input_check($_POST["comment2"]);
       //$curriculum3 = input_check($_POST["evaluation"]);
       //$score3 = input_check($_POST["score3"]);
       //$comment3 = input_check($_POST["comment3"]);


               
             /* Performing SQL query */
if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){ 
  /* Closing connection */
mysqli_close($db_link);
header('location:panelpef3.php');
}
else{
  
$sql = "INSERT INTO `academiccontent_pef`(`accreditationID`, `content`, `remark`, `score`, `comments`, `ID`) 
VALUES 
('$accreditationID','Practical Work/Degree Project','$objectives','$score','$comment','$ID'),
('$accreditationID','Students Course Evaluation','$curriculum','$score1','$comment1','$ID'),
('$accreditationID','Standard Of Tests And Examinations','$curriculum2','$score2','$comment2','$ID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert acc1" . mysqli_error($db_link)); }

$_SESSION["msg"]= "Submited Sucessfully";
/* Closing connection */
mysqli_close($db_link);
header('location:panelpef3.php');
}
}
?>
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
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
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
     <textarea  id="Comment1" name="comment" required="required"cols="3" rows="2" class="form-control" > Comments if any</textarea> 
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
     <input type="text" id="Comment3" name="comment2" required="required" class="form-control" placeholder="Comments if any">
      </div>
  </div>
  
 <div class="form-row">
 <div class="col">
 <a class="btn btn-primary login-btn" href="panelpef1.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>
 </div>
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