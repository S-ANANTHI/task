<?php



require_once 'dbconfig.php';

if(isset($_POST['register']))
{
$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);

$password=filter_var($_POST['pass'], FILTER_SANITIZE_STRING)

$mobile=filter_var($_POST['mobile'], FILTER_SANITIZE_STRING)


try 
{
	$stmt=$DBcon->prepare("SELECT name FROM register WHERE name=:name");
	$stmt->execute(array(':name'=>$name)); //PLACEHOLDER ' : '
	$data_f=$stmt->fetch(PDO::FETCH_ASSOC);

	if($stmt->rowCount()>0)
	{
		echo "Name Already Taken";
	}
	else
	{

if($user->signup($name,$password,$mobile))
{
if(true)
	echo "Registration Done..!";
}
else
{
	echo "Registration fAILED";
}
	
	}

} 
catch (PDOException $e) 
{
	 echo $e->getMessage();
}



/*$stmt=$DBcon->prepare("INSERT into register(name,password,mobile) VALUES(:name , :pass , :mobile)");
if($stmt->execute(array(':name'=>$name , ':pass'=>$password , ':mobile'=>$mobile)))
{
	echo "Registration Done..!";
}
else
{
	echo "Registration Not Done..!";
}
*/

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>PDO Registration form</title>
</head>
<body>
<form method="post" autocomplete="off" action="<?php echo $_SERVER["PHP_SELF"];?>">
	<input type="text" name="name" placeholder="Your Name" required="">
	<input type="password" name="pass" placeholder="Your password" required="">
	<input type="number" name="mobile" placeholder="Your mobile" required="">
		<input type="submit" name="register" value="Register">
</form>
<a href="login.php"><input type="button"  value="Login" ></a>
</body>
</html>