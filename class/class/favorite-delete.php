<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
session_start();
if (isset($_SESSION['member'])) {
	$pdo=new PDO('mysql:host=localhost;dbname=class;charset=utf8', 'staff', '123');
	$sql=$pdo->prepare(
		'delete from follow where memberID=? and class_Name=?');
	$sql->execute([$_SESSION['member']['id'], $_REQUEST['Name']]);
	echo '所選商品已從追蹤清單移除。';
	echo '<hr>';
} else {
	echo '請先登入，才能從追蹤清單移除商品。';
}
require 'favorite.php';
?>
<?php require '../footer.php'; ?>
