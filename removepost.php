<html>
<head>
<title>Don Husa</title>
</head>

<body>

<?php
ini_set('display_errors', 'On');
include_once 'dbclass.php';
if ($_POST['formsubmit']=='Submit') removePosts();
else showform();

function deletePost(){
	$con=connect();
	$sql="DELETE FROM BlogPosts
		  WHERE ID= '$_POST[blogID]'";
	mysql_query($sql,$con);
	mysql_close();
}

function deleteComment(){
	$con=connect();
	$sql="DELETE FROM Comments 
		  WHERE PostID= '$_POST[blogID]'
		  AND Comment ='$_POST[comment]'";
	mysql_query($sql,$con);
	mysql_close($con);
}

function removePosts(){
	if ($_POST['pwd']!='blargh'){
		echo 'incorrect credentials';
		return;
	}
	if ($_POST['posttype']=='deletepost') {
		deletePost();
	}
	else if ($_POST['posttype']=='deletecomment'){
		deleteComment();
	}
	else {
		echo "no post type selected...";
		include 'addpostform.php';
		return;
	}
	echo 'k';
}

function showform(){
	include 'forms/removepostform.php';
}

?>
</body>
</html>