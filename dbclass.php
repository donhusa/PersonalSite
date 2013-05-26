<?php


class DataBase{
	function connect(){
		$con=mysql_connect("localhost","root","root");
		//$con=mysql_connect("host","user","pwd");
		if (!$con){
	  		die('Could not connect: ' . mysql_error());
	  	}
	  	else {
	  		echo 'data';
	  		var_dump($con);
	  	}
	  	mysql_select_db("MarkMyWords", $con);
	  	return $con;
	}

	function testBet(){
		echo "test";
		$con=$this->connect();
		$sql="INSERT INTO Bet (better1, better2, startdate)
			  VALUES ('$_POST[person1]','$_POST[person2]',NOW())";
		if (!mysql_query($sql,$con)) {
			die('Error: ' . mysql_error());
	  	}
		mysql_close($con);
	}

	function findBetsMadeByUser($user){
		$con=connect();
		$sql="SELECT BetID FROM Bet
			  WHERE better1 = '$user'";
		$result = mysql_query($sql,$con);

	  	$row=mysql_fetch_array($result);
		mysql_close($con);	
		return $row;
	}

	function findBetsMadeAgainstUser($user){
		$con=connect();
		$sql="SELECT BetID FROM Bet
			  WHERE better1 = '$user'";
		$result = mysql_query($sql,$con);

	  	$row=mysql_fetch_array($result);
		mysql_close($con);	
		return $row;
	}


	//add user if username not taken
	function placeBet($b1,$b2,$moderator="none",$end,$bet,$stake){
		$con=$this->connect();
		
		$sql="SELECT * FROM Bet
			  WHERE better1 = '$b1'
			  AND better2 = '$b2'
			  AND thebet = '$bet'";
		$result = mysql_query($sql,$con);
	  	$row=mysql_fetch_array($result);
		if ($row) return false;

		$sql="INSERT INTO Bet (better1, better2, moderator, startdate, enddate, thebet, stakes)
			  VALUES ('$b1','$b2','$moderator',NOW(), '$end', '$bet', '$stake')";
		//$sql="INSERT INTO Bet
		//	  VALUES ('$_POST[better1]','$_POST[better2]','$_POST[moderator]',NOW(), '$_POST[enddate]', '$_POST[thebet]', '$_POST[stakes]')";
		if (!mysql_query($sql,$con)) {
			die('Error: ' . mysql_error());
	  	}
		mysql_close($con);
		return true;
	}
}
?>