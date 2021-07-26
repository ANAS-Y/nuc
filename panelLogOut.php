<?php
$_SESSION["msg"]='';
session_unset($_SESSION['accreditationID']);
session_unset($_SESSION['universityID']);
session_unset($_SESSION['ID']);
session_unset($_SESSION["msg"]);
session_unset($_SESSION["loginStatus"]);
session_unset($_SESSION["position"]);
session_destroy();
header('location:panel.login.php');



?>