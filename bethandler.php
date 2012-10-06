<html>

Hello world

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include "dbclass.php";
echo $_POST['person1'];

echo "hi";
$DBinstance = new DataBase;
echo "hi";
$DBinstance->testBet();
$DBinstance->placeBet($_POST['person1'],
		$_POST['person2'],$_POST['moderator'],
		$_POST['enddate'],$_POST['thebet'],$_POST['stake']);

?>
<br />
finished

</html>