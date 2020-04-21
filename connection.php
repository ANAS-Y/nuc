<?php

$db_link = mysqli_connect("localhost", "root", "");
if (!$db_link) {
   die("Could not connect: " . mysql_error());
}
mysqli_select_db($db_link,"nucaccreditation") or die("Could not select database");



?>