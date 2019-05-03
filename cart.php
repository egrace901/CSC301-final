<?php

include('config.php');

$cart = $_SESSION['cart'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Shopping Cart</title>
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
            <a  href="http://csweb.hh.nku.edu/csc301/gracee2/final/index1.php">Home</a>
            <a href="http://csweb.hh.nku.edu/csc301/gracee2/final/login.php">Login</a>
            <a href="#about">About</a>
            <a class="active" id="sCart" href="http://csweb.hh.nku.edu/csc301/gracee2/final/cart.php">My Cart &nbsp;<img src="images/cart-73-32.ico" id="cart"></a>
        </div>

    </header>

    <main class="main-area">
        <div class="centered">
            <br>
            <h1>Shopping Cart</h1>


            <?php if($cart->items == array()): ?>
                <img src="images/empty_cart.png" id="empty">
            <?php else: ?>
                <table style="width:100%">
                    <tr>
                        <th width="20%">Photo </th>
                        <th width="30%">Name</th>
                        <th width="30%">Quantity</th>
                    </tr>
                    <?php foreach ($cart as $animalid => $quantity): ?>
                    <tr>
                        <td><img src="images/<?php echo $animalid?>.jpg" id="cImg"></td>
                        <td> <?php print_r($animalid);?> </td>
                        <td><?php print_r($quantity);?></td>
                    </tr>
                    <?php endforeach;?>
                 </table>
                <br>
                <a href="deleteCart.php" class = "button">Empty Cart</a><br>
            <?php endif; ?>
            
            <br><hr>
            
            <?php if(isset($customer['name'])): ?>
                <p>Currently logged in as: <?php echo $customer['name'] ?></p>
                <a href="logout.php" class="button">Log Out</a>
            <?php else: ?>
                <p>You're not currently logged in!</p>
                <a href="login.php" class="button">Log in here!</a>
            <?php endif; ?><br><br>

            <br>
            
        </div>
    </main>

</body>

</html>
