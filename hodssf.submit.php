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

$Fname= $fetch["officerFname"];
$Lname= $fetch["officerSurname"];
$Oname= $fetch["officerOname"]; 
$rank= $fetch["rank"];   
}
else{
 
$Fname = ''; 
$Lname = '';
$Oname = '';
$rank = '';
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
    }
       
       $cdate = input_check($_POST["cdate"]);
       $vcFname = input_check($_POST["vcFname"]);
       $vcLname = input_check($_POST["vcLname"]);
       $vcOname = input_check($_POST["vcOname"]);
       $rank = input_check($_POST["rank"]);
       
$sql= "UPDATE `programmeinfo_ssf` SET `officerFname`='$vcFname',`officerSurname`='$vcLname',`officerOname`='$vcOname',
 `dateSubmited`='$cdate',`rank`='$rank',`dateSubmited`='$cdate',submissionStatus='submited' WHERE `accreditationID`='$accreditationID'";
if(!mysqli_query($db_link,$sql)){ die("Faild  to update student welfare and exam structure" . mysqli_error($db_link));}
 
/* Closing connection */
mysqli_close($db_link);
header('location:ssf.home.php');
}
?>
<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SUBMITING THE NUC/SSF( FINAL STAGE)</h3>
</div>
  
<div class="row" >
<!-- first column start here-->
<div class="col" >
<div class=" card form-category"  >

<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
    <div class="form-group">
    <h4 style="text-align: center; color: red;">CONFIDENTIALITY OF INFORMATION</h4>
    <label>The information supplied in this Form is solely for the confidential use of the National 
   Universities Commission and its authorised agents. </label>
    
  </div>
 
  <div class="form-row">
     <label for="cdate" class="col-sm-5" >Date Form is completed </label>
     <div class="col-sm-7">
      <input type="date" class="form-control"  id="cdate" name="cdate">
    
    </div>
  </div>


</div>
</div>
<br />


<!-- Second column start here-->
<div class="col" >
<div class="card form-category" >

<div class="card-title ">
<h5 style="text-align: center;">NAME OF OFFICER COMPLETING THE FORM AND DECLARATION</h5>
</div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="vcFame" name="vcFname" value="<?php echo $Fname?>" required="required" class="form-control" placeholder="First name">
      </div>
      <div class="col">
      <input type="text" id="vcLame" name="vcLname" value="<?php echo $Lname?>" required="required"class="form-control" placeholder=" Surname">
      </div>
    <div class="col">
      <input type="text" id="vcOname" name="vcOname" value="<?php echo $Oname?>" required="required"class="form-control" placeholder="Other name">
      </div>
  </div>
  <div class="form-row">
  <div class="col">
      <input type="text" id="rank" name="rank" value="<?php echo $rank?>" required="required"class="form-control" placeholder="Rank">
      </div>
       </div>
  <div class="form-row">
  <div class="form-row" style="margin-left:0%;">
      <div class="col"><input type="checkbox"   required="required" name="remember"> <label for="remeber" >I Confirmed that the Information
      provided Here are correct</label></div>
     
    </div>
</div>

</div>
 
 <div class="form-row">
 <div class="col">
<a class="btn btn-primary login-btn" href="hodssf3.php" style="float: right;margin-right: 4%; width: 95%; ">Previous</a>

 </div>
 <div class="col">
 <button type="submit" class="btn btn-primary login-btn" style="margin-left: 6%;width: 95%; ">SUBMIT</button>
 <br />
 <br />
 </div>
 </div>

 </form>
 </div>
 </div>
 
<!-- first row closing tag-->
</div>
<!-- first div closing tag-->
</div>
<!-- Container closing tag-->
</div>
<?php require ('footer.inc');?>