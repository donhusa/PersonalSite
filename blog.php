
<!DOCTYPE html>
<html>

<?php $my_file=file_get_contents("header.html");
$to_print=str_replace("<!--js-->",
	'<link rel="stylesheet" type="text/css" href="blogstyles.css">'
	,$my_file);
echo $to_print; 
include("header.php");
?>

<div id="main">
<h2>A Blog. Made From Scratch.</h2><hr />

<?php
if ($_POST['formsubmit']=="Submit"){
	echo "Comment submitted!";
	addComment($_POST['blogid'],htmlspecialchars($_POST['thecomment']),$_COOKIE['user']);
}
else displayBlogPosts();

function displayBlogPosts(){//most recent first
	for($i=getNumPosts()-1;$i>=0;$i=$i-1){
		$row=getPost($i);
		formatPost($row, $i);
	}
}

function showCommentPrivileges($BlogID){
	echo "<i>";
	if ($GLOBALS["loggedin"]){
		echo "<span id='cancomment' onclick='grayOutNShowAddComment(". $BlogID.");'>\n";
		echo "Click to comment";
		echo "</span>\n";
	}
	else{
		echo "<a href='login.php' style='text-decoration:none; color:black;'>";
		echo "Log in to Comment ";
		echo "</a>\n";
	}
	echo "</i> &#8226; ";
}

//numcomments class contains num of likes
//comments class reports comments
function formatPost($blogPost, $BlogID){
	echo "<div class='blogpost'>\n";
	echo "<h3>" . $blogPost['Title'] . "</h3>\n";
	echo $blogPost['Post'] . "<br /><hr />\n";
	echo "<div id='commentprivileges'>\n";
	showCommentPrivileges($BlogID);

	echo "<span class='numcomments' style='cursor:pointer;' onclick=requestAndShowComments(this,". $BlogID.")>\n";
	echo "Comments(" .countComments($BlogID). ")</span> &#8226; \n";

	//echo "<span>    Likes(".getNumLikes($BlogID).")</span>\n";
	echo date('F d, Y h:mA', strtotime($blogPost['Date']));

	echo "<br /><div class='comments'></div>\n";

	echo "</div>\n";	
	echo "</div>\n";

}

?>
<script type="text/javascript">

function showAddComment(BlogID){
	$('#master').after("<div id='addcomment'> </div>");
	$('#addcomment').load("addcomment.php",
		function(){$('#formblogid').attr('value',BlogID);});

	//remove the menu when clicked:
	$('#master').click(function(){
		$('#addcomment').animate({opacity:0},700,function(){
			$("#addcomment").remove();
		});
		$('#master').css({display:'none'});
	});
}

function grayOutNShowAddComment(BlogID){
	var height = $('body').height() + 30;
	$("#master").css({
		display: 'block',
		position: 'absolute',
		'background-color': 'black',
		opacity: 0,
		filter: 'alpha(opacity=70)',
		width: 100+'%',
		height: height+'px',
		'z-index': 1
	});
	$("#master").animate({opacity: .7},700,showAddComment(BlogID));
}

function getElementIndex(element, className){
	var elements = document.getElementsByClassName(className);
	for (var i=0;i<elements.length;i++){
		if (elements.item(i)==element) return i;
	}
	return -1;
}

//AJAX request to obtain comments
function requestAndShowComments(thisElement, BlogID){
	var url ="resourceobtainer.php?datarequest=comment&BlogID="+BlogID;
	var index = getElementIndex(thisElement, "numcomments"); 
	var commentBox = $('.comments:eq('+index+')');
	var firstTimeLoading = commentBox.html()=="";
	
	commentBox.load(url, function(){
		if (!firstTimeLoading){
			commentBox.toggle('slow');
		}
		else requestAndShowComments(thisElement,BlogID);	
	});

	var spanPos = $(thisElement).position();
	var boxHeight = commentBox.height();
	commentBox.css({
		position:"absolute",
		top: (spanPos.top-boxHeight-30)+"px",
		right: (10)+"px"
	});
}

</script>

</div>

</body>
</html>