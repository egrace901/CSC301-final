<?php

include('config.php');
include('functions.php');

$term = get('search-term');

$animals = searchAnimals($term, $database);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Animals</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style2.css" type = "text/css">
    <link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
    <style>
       
     
    </style>
</head>
<body>
 <header class="masthead clear">
  <div class="centered">

    <div class="site-branding">
      <h1 class="site-title">Emily's Aquarium<img src="images/fishIcon1.png"></h1>
        
    </div>
     
  </div>
            <div class="topnav">
      <a class="active" href="http://csweb.hh.nku.edu/csc301/gracee2/final/index1.php">Home</a>
      <a href="http://csweb.hh.nku.edu/csc301/gracee2/final/login.php">Login</a>
      <a href="#about">About</a>
         <a id = "sCart" href="http://csweb.hh.nku.edu/csc301/gracee2/final/cart.php">My Cart &nbsp;<img src = "images/cart-73-32.ico" id = "cart" ></a>
    </div>

</header>

<main class="main-area">
      
  <div class="centered">
      <br>
       <form method="GET" class = "right">
			<input type="text" name="search-term" placeholder="Search..." />
			<input type="submit" class = "button"/>
		</form><br>
      
      <h1>Animals</h1>
    <section class="cards">
   
    <?php if ($animals ==array()): ?>
        <p>No search results found.</p>
    <?php endif; ?>
        
    <?php foreach($animals as $animal) : ?>
      <article class="card">
        <a href="animal.php?animalid=<?php echo $animal['animalid'] ?>&name=<?php echo $animal['name'] ?>"> 
          <figure class="thumbnail">
            <img src="images/<?php echo $animal['name']?>.jpg">
          </figure>
          <div class="card-content">
            <h2><?php echo $animal['name']; ?></h2>
            <p>$<?php echo $animal['price']; ?></p>
          </div>
        
        </a>
      </article>
    <?php endforeach; ?>
           
    </section>
      <hr>
        <?php if(isset($customer['name'])): ?>
            <p>Currently logged in as: <?php echo $customer['name'] ?></p>
            <a href="logout.php" class = "button">Log Out</a>
        <?php else: ?>
            <p>You're not currently logged in!</p>
            <a href="login.php" class = "button">Log In</a>
        <?php endif; ?><br><br>
  </div>
  
</main>
 
</body>
</html>