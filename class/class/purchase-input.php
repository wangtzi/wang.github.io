<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
date_default_timezone_set('Asia/Taipei');
session_start();
if (!isset($_SESSION['member'])) {
	echo '請先登入再開始結帳。';
} else 
if (empty($_SESSION['class'])) {
	echo '購物車內無商品。';
} else {
	echo '<p>姓名：', $_SESSION['member']['memberName'], '</p>';
	echo '<p>地區：', $_SESSION['member']['region'], '</p>';
	echo '<p>手機號碼：', $_SESSION['member']['phone'], '</p>';
	echo '<p>e-mail：', $_SESSION['member']['email'], '</p>';
	echo '<hr>';
	require 'cart.php';
	echo '<hr>';
	echo '<p>請確認課程內容無誤後，按下確定購買開始結帳。</p>';
	echo '<a href="purchase-output.php" style: "padding-left: 150px;">確定購買</a>';
}
?>
<?php require '../footer.php'; ?>
