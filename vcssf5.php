<?php require ('vcheader1.inc');
$accreditationID=$_SESSION['accreditationID'];
function input_check($data){ 
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return($data);
    }
    
    include_once("connection.php");
             /* Performing SQL query */
  $sql = "SELECT * FROM vcselfstudy_ssf WHERE accreditationID= '$accreditationID'";
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));    
}

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
    
    
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result);
$bookList= $fetch["bookList"];

//performing central library SQL
  $sql = "SELECT * FROM `centrallibrary_ssf` WHERE accreditationID= '$accreditationID'";
             if (!mysqli_query($db_link,$sql)){
  die("Faild  to check the existance of central library" . mysqli_error($db_link));    
}
if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
$result = mysqli_query($db_link,$sql);
$fetch=mysqli_fetch_assoc($result); 

$fullName = $fetch["officerName"]; 
$Designation = $fetch["designation"]; 
$Grade = $fetch["gradeLevel"]; 
$FloorArea = $fetch["floorArea"]; 
$Population = $fetch["studentPopulation"]; 
$capacity = $fetch["sittingCapacity"];
$open = $fetch["openHour"]; 
$close = $fetch["closingHour"]; 
$StaffPolicy = $fetch["staffLendingPolicy"]; 
$StudentPolicy = $fetch["studentLendingPolicy"]; 
   
}
else{
$fullName = ''; 
$Designation = ''; 
$Grade = ''; 
$FloorArea = ''; 
$Population = ''; 
$capacity = '';
$open = ''; 
$close = ''; 
$StaffPolicy = ''; 
$StudentPolicy =''; 
}   
}

else{
 $bookList = '';
 $fullName = ''; 
$Designation = ''; 
$Grade = ''; 
$FloorArea = ''; 
$Population = ''; 
$capacity = '';
$open = ''; 
$close = ''; 
$StaffPolicy = ''; 
$StudentPolicy =''; 
}

  if($_SERVER["REQUEST_METHOD"]=="POST"){
       $books =  input_check($_POST["books"]);
       $full_name =  input_check($_POST["librarianName"]);
       $designation =  input_check($_POST["designation"]);
       $salary=  input_check($_POST["salary"]);
       $floorArea =  input_check($_POST["floorArea"]);
       $population =  input_check($_POST["population"]);
       $sittingC =  input_check($_POST["sittingCapacity"]);
       $opening =  input_check($_POST["opening"]);
       $closing =  input_check($_POST["closing"]);
       $studentPolicy =  input_check($_POST["studentPolicy"]);
       $staffPolicy =  input_check($_POST["staffPolicy"]);
       
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
  $sql = "SELECT * FROM vcselfstudy_ssf WHERE accreditationID= '$accreditationID'";
   if (!mysqli_query($db_link,$sql)){ die("Faild  to check the existance of Vc's self study form" . mysqli_error($db_link));}
             

if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
   $sql= "UPDATE vcselfstudy_ssf SET `bookList` ='$books' WHERE `accreditationID`='$accreditationID'";
 if(!mysqli_query($db_link,$sql)){die("Faild  to update book list" . mysqli_error($db_link)); }
}
else{
  
$sql = "INSERT INTO `vcselfstudy_ssf`(`accreditationID`, `ownershipControl`, `organisationAdministration`, `phillosophyObjectives`, `utilityServices`,
 `curriculumDesign`, `updatingCurricula`, `bookList`, `aquisitionPolicy`, `libraryservices`, `staffAccomodation`, `sportFacilities`, `healthFacilities`, 
 `recruitmentPolicy`, `staffDevelopment`, `firstName`, `surname`, `otherName`, `rank`, `dateSubmited`, `submissonStatus`) VALUES ('$accreditationID','',
 '','','','','','$books','','','','','','','','',
 '','','','','')";
if (!mysqli_query($db_link,$sql)){die("Faild  to insert vc self study form " . mysqli_error($db_link));}

  }
  
  //performing central library SQL
  $sql = "SELECT * FROM `centrallibrary_ssf` WHERE accreditationID= '$accreditationID'";
             if (!mysqli_query($db_link,$sql)){ die("Faild  to check the existance of central library" . mysqli_error($db_link));}
             
if(mysqli_num_rows(mysqli_query($db_link,$sql)) > 0){
    
$sql=" UPDATE `centrallibrary_ssf` SET `officerName`='$full_name',`designation`='$designation',`gradeLevel`='$salary',
`floorArea`='$floorArea',`studentPopulation`='$population',`sittingCapacity`='$sittingC',`openHour`='$opening',`closingHour`='$closing',
`staffLendingPolicy`='$staffPolicy',`studentLendingPolicy`='$studentPolicy' WHERE `accreditationID`='$accreditationID'";
 if(!mysqli_query($db_link,$sql)){die("Faild  to Central library" . mysqli_error($db_link));}
 /* Closing connection */
mysqli_close($db_link);
header('location:vcssf6.php');
    }
else{
    
    $sql = "INSERT INTO `centrallibrary_ssf`(`accreditationID`, `officerName`, `designation`, `gradeLevel`, `floorArea`, `studentPopulation`, `sittingCapacity`,
 `openHour`, `closingHour`, `staffLendingPolicy`, `studentLendingPolicy`) VALUES ('$accreditationID','$full_name','$designation','$salary','$floorArea',
 '$population','$sittingC','$opening','$closing','$staffPolicy','$studentPolicy')";

if (!mysqli_query($db_link,$sql)){die("Faild  to insert Central Library information " . mysqli_error($db_link));}
mysqli_close($db_link);
header('location:vcssf6.php');
}

}
?>

<div class="container-fluid">
<!-- first div start here-->
<div class="col card" >
<!-- first div title-->
<div class="card-title " >
<h3 style="text-align: center;">SELF-STUDY FORM (NUC/SSF)</h3>
<h6 style="text-align: center;">SECTION:A Part VIII-IX (PHYSICAL FACILITIES)</h6>
</div>

<!-- first div column-->
<div class="row">
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">THE CENTRAL LIBRARY AND LENDING POLICY</h5>
</div>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

<div class="form-row">
    <div class="col">
      <input type="text" name="librarianName" value="<?php echo $fullName;?>"  required="requird" id="librarinName"class="form-control"
       placeholder="Full Name of highest officer in-charge of the main library">
    </div>
    </div>
   <div class="form-row">
    <div class="col-sm-8">
    <input type="text"name="designation" value="<?php echo $Designation;?>"  required="requird" id="designation"class="form-control" placeholder="Designation">
      </div>
    <div class="col-sm-4">
    <input type="text"name="salary"  value="<?php echo $Grade;?>" required="requird" id="salary"class="form-control" placeholder="Salary Grade Level">
      </div>
  </div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="floorArea"  value="<?php echo $FloorArea;?>" name="floorArea" required="required" class="form-control" placeholder="Useable floor area in Meter SQuare">
      </div>
      <div class="col">
      <input type="text" id="population"  value="<?php echo $Population;?>" name="population" required="required"class="form-control" placeholder=" Student population served">
      </div>
   </div>
  <div class="form-row">
    <div class="col">
      <input type="text" id="sittingCapacity"  value="<?php echo $capacity;?>" name="sittingCapacity" required="required" class="form-control" placeholder="Sitting Capacity">
      </div>
      <div class="col">
      <input type="text" id="opening" value="<?php echo $open;?>" name="opening" required="required"class="form-control" placeholder=" Opening Hours">
      </div>
      <div class="col">
      <input type="text" id="closing"  value="<?php echo $close;?>" name="closing" required="required"class="form-control" placeholder=" Closing Hours">
      </div>
   </div>
    <div class="form-row">
    <div class="col">
      <input type="text" id="staffPolicy"  value="<?php echo $StaffPolicy;?>" name="staffPolicy" required="required" class="form-control" placeholder="Lending Policy For academic staff">
      </div>
      <div class="col">
      <input type="text" id="studentPolicy" value="<?php echo $StudentPolicy;?>" name="studentPolicy" required="required"class="form-control" placeholder=" Lending Policy For students">
      </div>
   </div>
  
  </div>
  
  



<!-- Second column start here-->
<div class="col second-category" >
<div class="col card form-category">
<div class="card-title ">
<h5 style="text-align: center;">LIST OF BOOKS</h5>
</div>
<div class="form-row" style="margin-left: 1%;">
 <label class="form-row"for="books">List all books, journals and related facilities for: 
(1) General reading 
(2) General education 
(3) Degree programmes 
(4) Programme to be accredited. </label>
    <div class="form-group">
        <textarea class="form-control" id="books" required="required" rows="3" cols="58" name="books"><?php echo $bookList?></textarea>
  </div>
  </div>

</div>
 
 <div class="form-row">

 <div class="col">
<a class="btn btn-primary login-btn" href="vcssf4.php" style=" width: 95%; ">Pevious</a>
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