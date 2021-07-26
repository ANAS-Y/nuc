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
$sql = "SELECT * FROM  visitationdetails_pef WHERE accreditationID= '$accreditationID' AND ID='$ID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
  
$universityName = $fetch["universityName"];
$program  = $fetch["titleProgramme"];    
}
else{
$universityName = '';
$program = ''; 
}
  if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){ 
  /* Closing connection */
mysqli_close($db_link);
header('location:panelpef1.php');
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
       $universityName =  input_check($_POST["university"]);
       $program = input_check($_POST["programme"]);
       $fdate = input_check($_POST["fdate"]);
       $tdate = input_check($_POST["tdate"]);
       $objectives = input_check($_POST["objectives"]);
       $score = input_check($_POST["score"]);
       $comment = input_check($_POST["comment"]);
       $objectives1 = input_check($_POST["curriculum"]);
       $score1 = input_check($_POST["score1"]);
       $comment1 = input_check($_POST["comment1"]);
               
$sql = "SELECT * FROM  visitationdetails_pef WHERE accreditationID = '$accreditationID' AND ID='$ID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}

  if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){ 
  /* Closing connection */
mysqli_close($db_link);
header('location:panelpef1.php');
}
else{
  
$sql = "INSERT INTO `visitationdetails_pef`(`accreditationID`, `universityName`, `titleProgramme`, `dateFrom`, `dateTo`, `ID`)
 VALUES ('$accreditationID','$universityName','$program','$fdate','$tdate','$ID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert visitation details " . mysqli_error($db_link)); }

$sql = "INSERT INTO `academiccontent_pef`(`accreditationID`, `content`, `remark`, `score`, `comments`, `ID`) 
VALUES ('$accreditationID','Programme philosophy and objectives','$objectives','$score','$comment','$ID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert acc1" . mysqli_error($db_link)); }

$sql = "INSERT INTO `academiccontent_pef`(`accreditationID`, `content`, `remark`, `score`, `comments`, `ID`) 
VALUES ('$accreditationID','The curriculum and structure of the programme','$objectives1','$score1','$comment1','$ID')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert acc2 " . mysqli_error($db_link)); }


$_SESSION["msg"]= "Submited Sucessfully";
/* Closing connection */
mysqli_close($db_link);
header('location:panelpef1.php');
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
<h5 style="text-align: center;">VISITATION DETAILS</h5>
</div>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <div class="form-row">
    <div class="col">
      <input type="text" required="required" id="university"   name="university"class="form-control" placeholder="Name of University Visited">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <input type="text" required="required" id="programme" name="programme"class="form-control" placeholder="Title of Programme">
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
  </div>
  
<div class="card-title ">
<h5 style="text-align: center;"></h5>
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
      <input type="number" id="score"  name="score" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
      <div class="col">
     <input type="text" id="Comment"  name="comment" required="required" class="form-control" placeholder="Comments if any">
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
      <input type="number" id="score1"  name="score1" required="required" class="form-control" placeholder="Score Awarded ">
      </div>
       <div class="col">
     <input type="text" id="Comment"  name="comment1" required="required" class="form-control" placeholder="Comments if any">
      </div>
      
  </div>
  
</div>
 <div class="form-row">
 <div class="col">
 <input type="submit" class="btn btn-primary login-btn" value="Submit" style="margin-left: 6%;width: 95%; ">
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

<?php require ('footer.inc');
$_SESSION["msg"]='';?>