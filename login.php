<?php 

/**
@author : Shubham Maurya,
Email id : maurya.shubham5@gmail.com
**/

require_once 'dbconfig.php';

if(isset($_POST['login']))
{

$name=filter_var($_POST['uname'], FILTER_SANITIZE_STRING);

$pass=filter_var($_POST['upass'], FILTER_SANITIZE_STRING);


if($user->login($name,$pass))
{
	
echo "Login Done..!";
	
}
else
{
echo "Login Failed";
}

/* $stmt=$DBcon->prepare("SELECT * from register WHERE  name=:uname AND password=:upass");
$stmt->execute(array(':uname'=>$name , ':upass'=>$pass));
$data_row=$stmt->fetch(PDO::FETCH_ASSOC);
if($stmt->rowCount()>0)
{
	
if($pass==$data_row['password'])
{
echo "Login Done..!";
}
}
else
{
	echo "Invalid Details.!!";
}
*/

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>PDO Login form</title>
</head>
<body>
<form method="post" autocomplete="off" action="<?php echo $_SERVER["PHP_SELF"];?>">
	<input type="text" name="uname" placeholder="Your UserName" required="">
	<input type="text" name="upass" placeholder="Your Password" required="">
	<input type="submit" name="login" value="login">
</form>
<a href="register.php"><input type="button"  value="register" ></a>
</body>
</html>