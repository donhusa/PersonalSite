<!DOCTYPE html>
<html>

<?php include("header.html"); 
include("header.php");
?>

<div id="main">

<?php 
//echo $loggedin . "wutup";
if ($GLOBALS["loggedin"]) {
	echo "You are already logged in as <i>". $_COOKIE["user"]."</i>.";
	echo "<br /> Click <a href=logout.php>here</a> to log out.";
}
else {
	include "loginform.php";
}
?>

</div>


</body>
</html>