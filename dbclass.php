<?php

function connect(){

    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);

    if ($url["host"]) {
    	$con=mysql_connect($server, $username, $password);
    }
	else {
		$con=mysql_connect("localhost","root","root");
		$db="dvh4";
	}

	if (!$con){
  		die('Could not connect: ' . mysql_error());
  	}
	mysql_select_db($db,$con);
  	return $con;
}

//check user and pw against database
//should be hashed!!!!!!!!
function authenticateUser(){
	$con=connect();
	$sql="SELECT * FROM Users
		  WHERE UserName = '$_POST[firstname]'";
	$result = mysql_query($sql,$con);
  	$row=mysql_fetch_array($result);
  	if (!$row) return false;//user doesn't exist
	mysql_close($con);
  	return $row['Password']==$_POST['pwd'];
}

//add user if username not taken
function addUser(){
	$con=connect();
	
	$sql="SELECT * FROM Users
		  WHERE UserName = '$_POST[firstname]'";
	$result = mysql_query($sql,$con);
  	$row=mysql_fetch_array($result);
	if ($row) return false;

	$sql="SELECT * FROM Users
		  WHERE UserName = '$_POST[firstname]'";
	$result = mysql_query($sql,$con);

	$sql="INSERT INTO Users
		  VALUES ('$_POST[firstname]','$_POST[pwd]',NOW(),NOW(),0,0)";
	if (!mysql_query($sql,$con)) {
		die('Error: ' . mysql_error());
  	}
	mysql_close($con);
	return true;
}

//updates visits and date if user exists
function updateUser(){
	$con=connect();
	$sql="SELECT * FROM Users
		  WHERE UserName = '$_POST[firstname]'";
	$result = mysql_query($sql,$con);

  	$row=mysql_fetch_array($result);
  	//$row=usernameQuery();

  	if (!$row){//legit?
  		echo "user doesn't exist!";
  		return false;
  	}
  	$numVisits=$row['NumVisits']+1;
  	$sql="UPDATE Users SET NumVisits='$numVisits'
		  WHERE UserName = '$_POST[firstname]'";
	mysql_query($sql,$con);
  	$sql="UPDATE Users SET LastVisitDate=NOW()
		  WHERE UserName = '$_POST[firstname]'";
	mysql_query($sql,$con);
	mysql_close($con);
  	return true;
}

function getNumPosts(){
	$con=connect();
	$sql="SELECT * FROM BlogPosts";
	$result=mysql_query($sql,$con);
	$numRows=mysql_num_rows($result);
	mysql_close($con);	
	return $numRows;
}

function getPost($BlogID){
	$con=connect();
	$sql="SELECT * FROM BlogPosts
		  WHERE ID = '$BlogID'";
	$result = mysql_query($sql,$con);

  	$row=mysql_fetch_array($result);
	mysql_close($con);	
	return $row;
}

function getComments($BlogID, $getRows=true){
	$con=connect();
	$sql="SELECT * FROM Comments
		  WHERE PostID='$BlogID'";
	$result=mysql_query($sql,$con);
	if (!$getRows) return $result;	
	$i=0;
	while($row=mysql_fetch_array($result)){
		$comments[$i]=$row;
		$i=$i+1;
	}
	mysql_close($con);	
	return $comments;
}

function addComment($BlogID, $comment, $user){
	$con=connect();
	$sql="INSERT INTO Comments 
		  VALUES ('$BlogID','$user','$comment',NOW()) ";
	if (!mysql_query($sql,$con)) {
		die('Error: ' . mysql_error());
  	}
	mysql_close($con);
}

function countComments($BlogID){
	
	$result=getComments($BlogID, false);
	return mysql_num_rows($result);
}

function getNumLikes($BlogID){
	$con=connect();
	$sql="SELECT Likes FROM BlogPosts
		  WHERE ID='$BlogID'";
	$result= mysql_query($sql, $con);
	$row= mysql_fetch_array($result);
	mysql_close($con);	
	return $row['Likes'];
}

?>