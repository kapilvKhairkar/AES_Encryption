<?php
//connection details
$servername='localhost';
$username='root';
$password='';
$database='dbs';
//connecting to server
$connect=mysqli_connect($servername,$username,$password,$database);
if(!$connect){
	echo mysqli_connect_error($connect).'<br>';
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	session_start();
	$d_Dec_secretkey = $_POST['Dec_secretkey'];
	//$hash=password_hash($d_Dec_secretkey,PASSWORD_DEFAULT);
	$d_Dec_cipher = $_POST['Dec_cipher'];
	$sql = "SELECT * FROM plain where shared_key='$d_Dec_secretkey'";
	$result = mysqli_query($connect,$sql);
	if($result){
		$affect = mysqli_num_rows($result);
		if($affect == 1){
			while($row = mysqli_fetch_assoc($result)){
				//cipher type immutable
				$cipher = "aes-256-cbc";
				$decrypted_data = openssl_decrypt($row['Cipher_text'], $cipher,$row['shared_key'], 0, $_SESSION['iv']);
			}
		}
		//new update
		else{
			echo 'error occured';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="index.html" target="_blank"><img src="img/icon.jpeg" width="80px"></a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="info.php">Home</a>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Implementation
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
	            <li><a class="dropdown-item" href="index.php" target="_blank">Using text Encryption</a></li>
	            <li><a class="dropdown-item" href="index1.php" target="_blank">Using text Decryption</a></li>
				<hr>
				<li><a class="dropdown-item" href="index2.php" target="_blank">Using File Encryption</a></li>
	            <li><a class="dropdown-item" href="index3.php" target="_blank">Using File Decryption</a></li>
	          </ul>
	        </li>
	      </ul>
	      <form class="d-flex">
	        <button class="btn btn-outline-warning" type="submit">Log Out</button>
	      </form>
	    </div>
	  </div>
</nav>
	<h1>Implmentation using text</h1>
	<div class="container">
		<div class="process">
			<div class="item">
				<h3>Decryption</h3>
				<form method="post" action="/CNS/index1.php">
					<input type="text" name="Dec_secretkey" id="Dec_secretkey" placeholder="Enter secret key" class="mb-3"><br>
					<textarea placeholder="Enter cipher text" name="Dec_cipher" id="Dec_cipher" class="mb-3"></textarea><br>
					<button type="submit" class="btn btn-primary" class="mb-3">Submit</button></br>
					<?php
					if(!isset($decrypted_data)){
						$decrypted_data=" ";
					}
					echo '<textarea class="mb-3" style="width:1095px; heigth:10px; resize:none; margin-bottom : 10px;" placeholder="Decrypted data">'.$decrypted_data.'</textarea>';
					//echo '<div class="flex-md-wrap md-5">'.$decrypted_data.'</div>';
					?>
				</form>
			<!--</div>
			<div class="item">
				<h3>OUTPUT</h3>
				
			</div>-->
		</div>
	</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>