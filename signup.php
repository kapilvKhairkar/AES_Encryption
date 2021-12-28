<?php
//connection details
$servername='localhost';
$username='root';
$password='';
$database='dbs';
//connection establishment
$connect=mysqli_connect($servername,$username,$password,$database);
if(!$connect){
	echo 'Error Occured'.mysqli_connect_error($connect);
}

?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$uname=$_POST['username'];
	$email=$_POST['mail'];
	$pass=$_POST['password'];
	$cpass=$_POST['cpassword'];
	$sql="SELECT * FROM log WHERE username='$uname';";
	$result=mysqli_query($connect,$sql);
	$affect=mysqli_num_rows($result);
	if($affect > 0){
		$error_insert='already exist';
	}
	
	else{
		if($pass==$cpass){
			$hash=password_hash($pass,PASSWORD_DEFAULT);
			$sql="INSERT INTO log(username,emailid,ppassword,cpassword) VALUES('$uname','$email','$hash','$hash')";
			$result=mysqli_query($connect,$sql);
			header("Location: /CNS/login.php?signupsuccess=true");
			exit();
		}
		else{
			$error_insert='password does not match';
		}
	}
	header("Location: /CNS/login.php?signupsuccess=false&signuperror=".$error_insert."");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SignUP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div>
		<form method="POST">
			<h2 style="max-width: max-content;margin: 1em auto;">SIGNUP CREDENTIALS</h2>
			<input type="text" name="username" id="username" placeholder="Enter Username" required><br>
			<input type="email" name="mail" id="email" placeholder="Enter Email" required><br>
			<input type="password" name="password" id="password" placeholder="Enter Password" required><br>
			<input type="password" name="cpassword" id="cpassword" placeholder="Enter  Confirm Password" required><br>
			<button type="submit">SIGN UP</button><br>
			<p>Already have account <a href="login.html">Click to login</a></p>
		</form>
	</div>
</body>
</html>