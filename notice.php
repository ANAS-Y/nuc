<?php require ('admin.header.inc');
include_once("connection.php");
$query = "SELECT* FROM programme_apply WHERE accreditation_status ='Pending'";
if (!mysqli_query($db_link,$query)){die("Faild  to check the existance of programmes" . mysqli_error($db_link));}
$data = mysqli_query($db_link,$query);
$numRow11 =  mysqli_num_rows($data); 
if ($numRow11 >0 ){
?>
<h4 class="text-center">SEND ACCREDITATION NOTICE</h4>
      <div class="card border p-3">

<?php

$sql = "SELECT*FROM universityinfo_ssf ";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link));}

$result = mysqli_query($db_link,$sql);
$numRow =  mysqli_num_rows($result); 
 
if ($numRow >0 ){
  echo '<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Faculty</th>
              <th>Department</th>
              <th>Program</th>
              <th>Due Date</th>
            </tr>
          </thead>
          <tbody>
         ';
while($fetch=mysqli_fetch_assoc($result) ){
        $universityName =$fetch['universityName'];
        $universityID = $fetch['universityID'];
          //check for Non accreditated programes
$sql2 = "SELECT* FROM programme_apply WHERE universityID = '$universityID' AND accreditation_status ='Pending'";
if (!mysqli_query($db_link,$sql)){die("Faild  to check the existance of programmes" . mysqli_error($db_link));}
$result2 = mysqli_query($db_link,$sql2);
$numRow2 =  mysqli_num_rows($result2); 

if ($numRow2 >0 ){
echo '<tr class="table-primary"><th colspan="12" > <table class="table mb-0 ">'.$universityName.'</th></table></tr>';
  while($fetch2=mysqli_fetch_assoc($result2) ){
    echo '<tr class="table-secondary"><td>'.$fetch2['faculty'].'</td>'; 
    echo '<td>'.$fetch2['department'].'</td>';
    echo '<td>'.$fetch2['programme'].'</td>'; 
    echo '<td>'.$fetch2['duedate'].'</td></tr>';    
  } 
 echo '<tr class="table-light mx-auto d-block btn-group"><td colspan="12" > <table class="table mb-0 "> 
 <form action="circular.php" method="post" >
<input type="hidden" name="uID" value="'.$universityID.'" size="100" />
<input type="submit" class ="btn btn-success" value="SEND ACCREDITATION NOTICE"  style="margin-left:5px;" />
</form></td></table><br/>';  
 
}

 }           
}
}
else{ echo '<div class="card border p-3"> 
<p>No Pending Accreditation Yet</p> </div>';}
?>          
     <p style="text-align: end;"></p>      
          </tbody>
        </table>
      </div>
      </div >
    </main>
  </div>
</div>
</div>
<?php require ('footer.inc');
$_SESSION["msg"]='';
?>

</body>
</html>
