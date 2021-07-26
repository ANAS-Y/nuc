<?php require ('admin.header.inc');?>
<canvas class="my-4 w-100" id="myChart" height="10"></canvas>
<h2>REMOVING PANEL MEMBERS </h2>
      <div class="card border p-3">
      <div class="table-responsive">
     
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<?php
	include_once("connection.php");
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");
            
             /* Performing SQL query */
$sql = "SELECT universityName, universityID FROM universityinfo_ssf";
  if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of universities" . mysqli_error($db_link));    }
$num_row = mysqli_num_rows(mysqli_query($db_link,$sql));
if( $num_row> 0){
    $result = mysqli_query($db_link,$sql);
   
    echo '<select  class=" form-control" arial-label=".form-select example" name="id">
	<option value="" name="id">Select University to add the accreditation panel</option>';
    while( $fetch= mysqli_fetch_assoc($result)){
    echo '<option value="'.$fetch["universityID"].'">'.$fetch["universityName"].'</option>';
    }
    echo '<input type="submit" value="Continue" class="btn btn-success mx-auto col-6 d-block mx-auto" />
    </select> 
    </form>'  ;
}
else{
    echo '<p>No University Record Uploaded Yet! Please Click "Add New University" to Add New University Details </p>';
}

 if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $_SESSION["universityID"]= $_POST["id"];
?>
<script>window.location="panelRemoveMembers.php"</script>
<?php }?>
      </div>
      </div>
    </main>
  </div>
</div>
</div>
<?php require ('footer.inc');
$_SESSION["msg"]='';
?>

</body>
</html>
