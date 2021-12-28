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
	$pass=$_POST['password'];
	$hash=password_hash($pass,PASSWORD_DEFAULT);
	$sql="SELECT * FROM log WHERE username='$uname' and ppassword='$hash';";
	$result=mysqli_query($connect,$sql);
	$affect=mysqli_num_rows($result);
	if($affect!=1){
		$error_login='login error due to more entries';
		header("Location: /CNS/index.php?loginsuccess=false&loginerror=".$error_login."");
	}
	else{
		header("Location: /CNS/index.php?loginsuccess=true");
		exit();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LoginIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div>
		<form method="post">
			<h2 style="max-width: max-content;margin: 1em auto;">LOGIN CREDENTIALS</h2>
			<input type="text" name="username" id="username" placeholder="Enter Username" required><br>
			<input type="password" name="password" id="password" placeholder="Enter Password"><br>
			<button type="submit">LOG IN</button><br>
			<p>Don't have account <a href="signup.html">Create an account</a></p>
		</form>
	</div>
</body>
</html>