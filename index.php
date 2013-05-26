
<!DOCTYPE html>
<html>

<?php include("header.html"); 
include("header.php");
?>

<div id="main">
<h2> Welcome</h2><hr />
Welcome to my website! I am a grad student at Duke University pursuing a 
Master of Engineering Management (MEM) degree. I finished my undergraduate 
degree at Duke in May with a double major in Electrical & Computer Engineering 
and Computer Science and a minor in Economics. I'm kept pretty busy studying 
throughout the year, but I still enjoy learning for the sake of knowledge. In 
addition, I am actively involved in several different clubs and organizations. 
<br /><br />
You're welcome to explore my site to get a better idea of my skills and accomplishments. 
I designed this site from scratch to get a better understanding of web development 
languages and frameworks, including HTML5, CSS3, Javascript, JQuery, AJAX, PHP, and MySQL.  

<br /><br />
<h3>Extracurricular Involvement </h3><hr />
Here are a few organizations in which I had leadership positions as an undergraduate:<br /><br />

<b><a href="http://www.pratt.duke.edu/e-team">E-Team</a> - President<br />
</b>E-Team is a team of engineering students from various fields of study who want to help incoming freshmen adjust to life as a Duke engineer. As president, I have had a significant impact on the way the team is structured. I reorganized the officer structure to have a chair for each engineering major. I also created a <a href='http://esg.pratt.duke.edu/e-team/'>FAQ website</a> to help answer some of the freshmen's more common questions. Additionaly, I planned out our events and meetings.
<br /><br />

<b><a href="http://dukegroups.duke.edu/ieee/">Duke IEEE</a> - Vice-President</b><br />
As Vice-President, I have had a key role in revitalizing our student branch of IEEE, which had previously been inactive for the better part of a decade. I helped lead and obtain funding for a trip to the annual regional IEEE conference, Southeastcon, held in Orlando, Florida. I was also one of the main developers of our <a href='projects.php#LDOC'>Duke IEEE LDOC sign</a>.
<br /><br />

<b><a href="http://www.cs.duke.edu/acm/">Duke ACM</a> - Vice-President</b><br />
Duke's ACM chapter brings in guest speakers from companies for tech talks, and also holds various other kinds of networking events. As Vice-President, I help planned our events. 

<br /><br />
<h3>Feedback Form</h3><hr />
<?php 
if ($_POST['formSubmit']=="Submit"){
	$theComments = $_POST['comments'];
	echo "<i>Thank you for your submission! </i><br />";
	mail('dvh4@duke.edu','Website Comment', $theComments);
	//$fs = fopen("mydata.csv","a");
	//fwrite($fs,$theComments . "\n");
	//fclose($fs);
	exit;//doesn't close body or html, but works for now
}
?>
Feel free to leave any comments in the box below. Your feedback is appreciated.
<form action="index.php" method="post">
<textarea name="comments" rows="5" cols="80"></textarea>
<br />
<input type="submit" name="formSubmit" value="Submit" />
</form>

</div>


</body>
</html>