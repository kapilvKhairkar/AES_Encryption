<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="index.css">
    <style>
        #example{
            border: 2px solid black;
        }
    </style>
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
	        <li class="nav-item">
	          <a class="nav-link" href="#">Link</a>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Implementation
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			  	<li><a class="dropdown-item" href="index.php" target="_blank">Using text Encryption</a></li>
	            <li><a class="dropdown-item" href="index1.php?$iv='$_SESSION['iv']'/" target="_blank">Using text Decryption</a></li>
	          </ul>
	        </li>
	      </ul>
	      <form class="d-flex">
	        <button class="btn btn-outline-warning" type="submit">Log Out</button>
	      </form>
	    </div>
	  </div>
</nav>
<body>
    <div><br>
        <h1 class="text-center">Advanced Encryption Standard(AES)</h1><br>
    </div>
    <div class="d-flex justify-content-between container">
        <h5 class="align-self-center">The AES Encryption algorithm (also known as the Rijndael algorithm). AES was to be based on 128-bit blocks with 128 bit keys
            The number of rounds to be carried out depends on the length of the key being used to encrypt data. It supports key lengths and plain text block sizes 
            from 128 bit to 256 bit. The 128-bit key size has ten rounds, the 192-bit key size has 12 rounds, and the 256-bit key size has 14 rounds.
            <br>
            Some features of AES: <br>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item">Symmetric and parllel structure</li>
                <li class="list-group-item">The algorithm works well with mordern processors like pentium,RiSC,Parallel</li>
                <li class="list-group-item">Works well with smart card</li>
            </ol>            
    </h5>
        <img src="img/aeshome.jpg" id="example" class="rounded mx-auto d-block" width="640px" height="315px">
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>