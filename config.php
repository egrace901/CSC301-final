<?php

$user = 'gracee2';
$password = 'juzUC8Ev';

$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=db_spring19_gracee2', $user, $password);

function my_autoloader($class) {
    include "class." . $class . ".php";
}

spl_autoload_register('my_autoloader');

session_start();

$current_url = basename($_SERVER['REQUEST_URI']);


if (isset($_SESSION["customerID"])) {
	$sql = file_get_contents('sql/getCustomer.sql');
	$params = array(
		'customerid' => $_SESSION["customerID"]
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$customers = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$customer = $customers[0];
}

if(!isset($_SESSION['cart'])){
  $newCart = new ShoppingCart();
  $_SESSION['cart'] = $newCart;
}