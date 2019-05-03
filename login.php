<?php

include('config.php');

include('functions.php');

// If form submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = file_get_contents('sql/attemptLogin.sql');
	$params = array(
		'username' => $username,
		'password' => $password
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	
	if(!empty($users)) {
		$user = $users[0];
		$_SESSION['customerID'] = $user['customerid'];
		header('location: index1.php');
	}
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Login</title>
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
      <a id = "sCart" href="http://csweb.hh.nku.edu/csc301/gracee2/final/cart.php">My Cart &nbsp;<img src = "images/cart-73-32.ico" id = "cart" ></a>
    </div>

</header>
    
	<main class="main-area">
        <div class="centered">
            <br>
            <h1>Login</h1>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" value="Log In" class = "button"/>
            </form><br>
            <h3>Welcome to our site!</h3>
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                <p>Incorrect username or password! Please try again.</p>
            <?php endif; ?>
            <br><hr>
            <p>
                Don't have an account?<br><br>
                <a href="userForm.php" class = "button">Create Account</a><br><br><br>
            </p>
        </div>
    </main>
</body>
</html>