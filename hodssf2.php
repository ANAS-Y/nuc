<?php require ('hodheader1.inc');
$accreditationID=$_SESSION['accreditationID'];
 include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
 $sql = "SELECT * FROM `programmeinfo_ssf` WHERE accreditationID= '$accreditationID'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}


if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
  
$swelfare = $fetch["studentsWelfare"];
$estructure= $fetch["academicAtmosphere"];    
}
else{
 $swelfare = '';
$estructure = ''; 
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
    }
       $welfare =  input_check($_POST["welfare"]);
       $structure = input_check($_POST["structure"]);
       
$sql= "UPDATE `programmeinfo_ssf` SET studentsWelfare ='$welfare', `academicAtmosphere`='$structure' WHERE `accreditationID`='$accreditationID'";
if(!mysqli_query($db_link,$sql)){ die("Faild  to update student welfare and exam structure" . mysqli_error($db_link));}
 
/* Closing connection */
mysqli_close($db_link);
header('location:hodssf3.php');
}
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part IV-V (STUDENTS WELFARE AND EXAMINATION STRUCTURE OF THE PROGRAMME)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">STUDENTS WELFARE</h5>
</div>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<div class="form-row" >
 <label class="form-row"for="history">Discribe how the programme/sub-discipline/discipline structured it's Students Welfare.
 the description should highlight (a)  Handling of academic grievances (b)  Student academic advising. </label>
    <div class="form-group" >
        <textarea class="form-control" id="history" rows="5" cols="60" name="welfare" required="required"><?php echo $swelfare?></textarea>
  </div>
  </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">THE PROGRAMM EXAMINATION STRUCTURE</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="lawText">Discribe how the programme/sub-discipline/discipline structured it's Examination
the description should highlight the Setting, conduct, evaluation schemes, moderation schemes internal 
and external for degree examinations and the issuance of results.</label>
    <div class="form-group">
        <textarea class="form-control" id="administration" required="required" rows="3" cols="58" name="structure"><?php echo $estructure?></textarea>
  </div>
  </div>

</div>
 
 <div class="form-row">
 <div class="col">
 <a class="btn btn-primary login-btn" href="hodssf1.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>

 </div>

  <div class="col">
  <button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">Next</button>

 </div>
 
 </div>

 </form>
 </div>
 
<!-- first row closing tag-->
</div>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>