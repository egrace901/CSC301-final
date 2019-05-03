<?php


include('config.php');
include('functions.php');


$animalid = get('animalid');
$name = get('name');

$sql = file_get_contents('sql/getAnimal.sql');
$params = array(
    'animalid' => $animalid
);
$statement = $database->prepare($sql);
$statement->execute($params);
$animals = $statement->fetchAll(PDO::FETCH_ASSOC);

$animal = $animals[0];

// Get types of animals from the database
$sql = file_get_contents('sql/getAnimalType.sql');
$params = array(
    'animalid' => $animalid
);
$statement = $database->prepare($sql);
$statement->execute($params);
$types = $statement->fetchAll(PDO::FETCH_ASSOC);

//get reviews from database
$sql = file_get_contents('sql/getReviews.sql');    
    $statement = $database->prepare($sql);
    $params = array(
        'animalid' => $animalid
    );
    $statement->execute($params);
    $reviews = $statement->fetchAll(PDO::FETCH_ASSOC);
  

if(isset($_GET['name']) && isset($_GET['quantity'])){
    
    $cart = $_SESSION['cart'];
    $name = $_GET['name'];
    $quantity = $_GET['quantity'];
    
    $cart->addToCart($name, $quantity);
    $_SESSION['cart'] = $cart;
    header("Location: http://csweb.hh.nku.edu/csc301/gracee2/final/cart.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $review = $_POST['review'];
        $animalid = $_POST['animalid']; 
    
        $sql = file_get_contents('sql/insertReview.sql');
		$params = array(
			'animalid' => $animalid,
            'review' => $review
			
		);
   
		$statement = $database->prepare($sql);
		$statement->execute($params);
     
    
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Animal</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style2.css">
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
    <!-- .site-title -->
   
  </div>
            <div class="topnav">
      <a class="active" href="http://csweb.hh.nku.edu/csc301/gracee2/final/index1.php">Home</a>
      <a href="http://csweb.hh.nku.edu/csc301/gracee2/final/login.php">Login</a>
      <a href="#about">About</a>
         <a id = "sCart" href="http://csweb.hh.nku.edu/csc301/gracee2/final/cart.php">My Cart &nbsp;<img src = "images/cart-73-32.ico" id = "cart" ></a>
    </div>
  <!-- .centered -->
</header>
    
	<main class="main-area">
        <div class="centered">
            <img src="images/<?php echo $animal['name']?>.jpg" id = "a-image" ><br>
            <h1><b><?php echo $animal['name'] ?></b> </h1>

            <p><?php echo $animal['description'] ?></p>

            <p>Price: $<?php echo $animal['price'] ?> </p>
            <p>Type: </p>
                <?php foreach ($types as $type): ?> 
                    <ul>
                        <li><?php echo $type['name'] ?></li>
                    </ul>
                <?php endforeach; ?><br>


            <form action="" method="GET">
                <div class="form-element " >
                    <label>Quantity:</label>
                         <input type = "hidden" name="name" value="<?php echo $animal['name'] ?>" />
                        <input type="text" name="quantity" />

                    <input type="submit" class="button" name = "quantity-submit"/>&nbsp;<br><br>
                </div>
            </form>
            <hr>
        
        <table style="width:70%" id = "reviews" align = "center">
            <tr>
                <th width="20%">Reviews </th>
            </tr>
				    <?php foreach($reviews as $review) : ?>
            <tr >
                       <td style="text-align: left"><?php echo $review['review'] ?></td>
            </tr>
				    <?php endforeach; ?><br>
        </table><br>
        
        <form action="" method="POST" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
            <div class="form-element" >
                <label>Add Review:</label><br>
                     <input type="hidden" name="animalid" value="<?php echo $animal['animalid'] ?>" />
                     <textarea required minlength="5" name="review" cols="50" rows="4"></textarea>
                <br><br>
                <input type="submit" class="button" name = "review-submit"/>&nbsp;
                <br><br>
            </div>
        </form>
        
        </div>
	</main>
</body>
</html>