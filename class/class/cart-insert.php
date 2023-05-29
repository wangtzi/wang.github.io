<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
session_start();
$id=$_REQUEST['id'];
if (!isset($_SESSION['class'])) {
	$_SESSION['class']=[];
}

$_SESSION['class'][$id]=[
	'Name'=>$_REQUEST['Name'], 
	'price'=>$_REQUEST['price'], 

];
echo '<p>商品放入購物車成功。</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require '../footer.php'; ?>

