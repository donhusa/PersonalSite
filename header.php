<div style = "text-align:center">
<?php 
//ini_set('display_errors', 'On');
include_once "dbclass.php";

$GLOBALS["loggedin"]=false;
//cookies need to be added before <html> tag
//cookies used to handle session info (but not user auth)
//session checked whenever user loads a new page
if (isset($_COOKIE["user"]) && checkSeshId()){
	echo "Welcome " . $_COOKIE["user"] . "!";
	$GLOBALS["loggedin"]=true;
}
else
  ;//echo "<a href=login.php>Login</a>";


function checkSeshId(){
	$NONCE="hi";
	return md5($_COOKIE["user"] . $NONCE)==$_COOKIE["sesh"];
}

//print_r($_COOKIE);
?>
</div>