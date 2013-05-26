<html>
<body>

<?php
include "dbclass.php";
if ($_GET['datarequest']=="comment") obtainComments();
else echo "No data requested...";

function obtainComments(){
	$id = $_GET["BlogID"];
	$numComments=countComments($id);
	$allComments=getComments($id);
	echo "<ul id=comments style='list-style: none;";//styles!!!! 
	echo "margin: 0; padding: 0;'> \n";
	for($i=0; $i<$numComments;$i=$i+1){
		//echo "<li>" . $allComments[$i]['Comment'] . "</li>";
		echo "<li>" . $allComments[$i]['Comment']." - "; 
		echo "<span class='user' style='color:#41608F;'>".$allComments[$i]['User']."</span> ";
		echo "<span style='color:gray'> at ";
		$time=strtotime($allComments[$i]['Date']);
		echo date("h:mA", $time)." on ". date("m/d/y", $time)."</span>";
		echo "</li>";
		if ($i+1<$numComments){
			echo "<hr style='border:1px; width:2em;'/>";
		} 
	}
	echo "</ul>";
}

?>

</body>
</html>