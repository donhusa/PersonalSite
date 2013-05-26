<html>
<head>
<title>Don Husa</title>
</head>

<body>

<?php
ini_set('display_errors', 'On');
include_once 'dbclass.php';
if ($_POST['formsubmit']=='Submit') addPost();
else showform();

function updatePost(){
	$con=connect();
	if ($_POST['title']!=""){
		$sql="UPDATE BlogPosts
		  SET Title='$_POST[title]'
		  WHERE ID='$_POST[blogID]'";
		mysql_query($sql,$con);
	}
	$sql="UPDATE BlogPosts
		  SET Post='$_POST[blogpost]'
		  WHERE ID= '$_POST[blogID]'";
	mysql_query($sql,$con);
	mysql_close();
}

function newPost($postID){
	$con=connect();
	if ($_POST['blogID']!="") $postID=$_POST['blogID'];
	$sql="INSERT INTO BlogPosts VALUES ('$postID',
		  '$_POST[title]','$_POST[blogpost]',0,NOW())";
	mysql_query($sql,$con);
	mysql_close($con);
}

function addPost(){
	if ($_POST['pwd']!='blargh'){
		echo 'incorrect credentials';
		return;
	}
	if ($_POST['posttype']=='updatepost') {
		updatePost();
	}
	else if ($_POST['posttype']=='newpost'){
		$postID=getNumPosts();
		newPost($postID);
	}
	else {
		echo "no post type selected...";
		include 'addpostform.php';
		return;
	}
	echo 'k';
}

function showform(){
	include 'addpostform.php';
}

?>
</body>
</html>