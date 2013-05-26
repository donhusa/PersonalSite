<?php

include_once "dbclass.php";
$my_file=file_get_contents("header.html");
$GLOBALS["to_print"]=str_replace("<!--js-->",
	'<script language="javascript" type="text/javascript" src="loginscript.js"></script>'
	,$my_file);

$GLOBALS["outputText"]="";


if($_POST['formSubmit']=='Submit'){
	if (authenticateUser()) {
		newSession();
		welcome();
	}
	else{
		loginFail("Invalid login credentials.");
	}
}
else if($_POST['newUserSubmit']=='Register'){
	if (newUser()) welcome();
	else loginFail("Username already exists!");
}
else { // no form submitted
	//include("form.php");
}

function loginFail($reason){
	$GLOBALS["outputText"].="<div id=main>";
	$GLOBALS["outputText"].='<span style="color:red;">';
	$GLOBALS["outputText"].=$reason."</span>";
	$GLOBALS["outputText"].=file_get_contents("loginform.php");
	$GLOBALS["outputText"].="</div>";
}

function welcome(){
	$GLOBALS["outputText"] .= 
		"<div id=main> Welcome, " . $_POST['firstname'] . "!";
	$GLOBALS["outputText"] .= 
		"<br /> You are now logged in!</div></html>";
}

function newSession(){
	updateUser();
	$uname=$_POST['firstname'];
	$NONCE="hi";
	setcookie("user",$uname, time()+3600);//don't need if db
	$seshID=md5($uname . $NONCE);
	setcookie("sesh",$seshID,time()+3600);
}

function newUser(){//each user is for an hour!
	$uname=$_POST['firstname'];
	if (!addUser()) return false;
	setcookie("user",$uname, time()+3600);
	//add user and pw to database!
	newSession();
	return true;
}


?>


<!DOCTYPE html>
<html>

<?php
echo $GLOBALS["to_print"]; 
include("header.php");
echo $GLOBALS["outputText"];
?>

</body>
</html>
