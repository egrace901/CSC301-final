<?php

include('config.php');

// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['customer-name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
    $username = $_POST['username'];
    $password = $_POST['password'];

        $sql = file_get_contents('sql/insertUser.sql');
        $params = array(
            'name' => $name,
            'address' => $address,
            'city' => $city,
            'username' => $username,
            'password' => $password
        );
        $statement = $database->prepare($sql);
        $statement->execute($params);
        
        header('location: login.php');
        die();
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Add New User</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
   <header class="masthead clear">
  <div class="centered">

    <div class="site-branding">
      <h1 class="site-title">Emily's Aquarium<img src="images/fishIcon1.png"></h1>
        
    </div>
   
  </div>
            <div class="topnav">
      <a href="http://csweb.hh.nku.edu/csc301/gracee2/final/index1.php">Home</a>
      <a class="active" href="http://csweb.hh.nku.edu/csc301/gracee2/final/login.php">Login</a>
      <a href="#about">About</a>
      <a id = "sCart" href="http://csweb.hh.nku.edu/csc301/gracee2/final/cart.php">My Cart &nbsp; <img src = "images/cart-73-32.ico" id = "cart" ></a>
    </div>

</header>
    
	<main class="main-area">
        <div class="centered">
            <br>
		<h1>Add New User</h1>
		<form action="" method="POST">
			<div class="form-element">
				<label>Name:</label><br>
				<input type="text" name="customer-name" class="textbox" />
			</div><br>
			<div class="form-element">
				<label>Address:</label><br>
				<input type="text" name="city" class="textbox" />
			</div><br>
			<div class="form-element">
				<label>City:</label><br>
				<input type="text" name="address" class="textbox" />
			</div><br>
            <div class = "form-element">
                <label>Username:</label><br>
				<input type="text" name="username" class="textbox" />
            </div><br>
             <div class = "form-element">
                <label>Password:</label><br>
				<input type="text" name="password" class="textbox" />
            </div><br>
			<div class="form-element">
				<input type="submit" class="button" />&nbsp;
				<input type="reset" class="button" />
			</div>
            <br><br>
		</form>
	</div>
    </main>
</body>
</html>