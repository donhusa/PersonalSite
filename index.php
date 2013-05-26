
<!DOCTYPE html>
<html>

<?php include("header.html"); 
include("header.php");
    echo 'here';

    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));

    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);

    $con=mysql_connect($server, $username, $password);
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }
    else {
        echo 'data';
        var_dump($con);
    }        
    
    mysql_select_db($db);

    $sql="CREATE TABLE Test(
          P_Id int,
          LastName varchar(255),
          FirstName varchar(255))";
    $sql2="INSERT INTO Test
        VALUES (1,'word','nah')";
    $sql3 ="SELECT * FROM Test";

    if (!mysql_query($sql,$con)) {
      die('Error: ' . mysql_error());
    }
    if (!mysql_query($sql2,$con)) {
      die('Error: ' . mysql_error());
    }
    $result = mysql_query($sql3,$con);
    print_r($result);
    
?>

<div id="main">
<h2> Welcome</h2><hr />
Welcome to my website! I am a senior at Duke University double majoring in Electrical & Computer Engineering and Computer Science and minoring in Economics. I'm kept pretty busy studying throughout the year, but I still enjoy learning for the sake of knowledge. In addition, I am actively involved in several different clubs and organizations. 
<br /><br />
You're welcome to explore my site to get a better idea of my skills and accomplishments. I designed this site from scratch to get a better understanding of web development languages and frameworks, including HTML5, CSS3, Javascript, JQuery, AJAX, PHP, and MySQL.  

<br /><br />
<h3>Extracurricular Involvement </h3><hr />
Here are a few organizations in which I have leadership positions:<br /><br />

<b><a href="http://www.pratt.duke.edu/e-team">E-Team</a> - President<br />
</b>E-Team is a team of engineering students from various fields of study who want to help incoming freshmen adjust to life as a Duke engineer. As president, I have had a significant impact on the way the team is structured. I reorganized the officer structure to have a chair for each engineering major. I also created a <a href='http://esg.pratt.duke.edu/e-team/'>FAQ website</a> to help answer some of the freshmen's more common questions. Additionaly, I plan out our events and meetings.
<br /><br />

<b><a href="http://dukegroups.duke.edu/ieee/">Duke IEEE</a> - Vice-President</b><br />
As Vice-President, I have had a key role in revitalizing our student branch of IEEE, which had previously been inactive for the better part of a decade. I helped lead and obtain funding for a trip to the annual regional IEEE conference, Southeastcon, held in Orlando, Florida. I was also one of the main developers of our <a href='projects.php#LDOC'>Duke IEEE LDOC sign</a>.
<br /><br />

<b><a href="http://www.cs.duke.edu/acm/">Duke ACM</a> - Vice-President</b><br />
Duke's ACM chapter brings in guest speakers from companies for tech talks, and also holds various other kinds of networking events. As Vice-President, I help plan our events. 

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