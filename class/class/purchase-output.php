<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
session_start();
$pdo=new PDO('mysql:host=localhost;dbname=class;charset=utf8','staff', '123');

$purchaseID=1;
foreach ($pdo->query('select max(purchase_id) from purchase') as $row) {
	$purchaseID=$row['max(purchase_id)']+1;
}
$sql=$pdo->prepare('insert into purchase values(?,?)');
if ($sql->execute([$purchaseID, $_SESSION['member']['id']])) {
	$order_time = date("Y/n/j");
	foreach ($_SESSION['class'] as $id=>$class) {
		$sql=$pdo->prepare('insert into purchaseDetail values(?,?,?)');
		$sql->execute([$purchaseID, $class['Name'], $order_time]);
	}
	unset($_SESSION['class']);
	echo '已完成訂購，謝謝您的惠顧。';
} else {
	echo '很抱歉，結帳過程發生錯誤，無法完成訂購。';
}
?>
<?php require '../footer.php'; ?>
