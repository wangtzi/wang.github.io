<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
session_start();
if (isset($_SESSION['member'])) {
	$pdo=new PDO('mysql:host=localhost;dbname=class;charset=utf8', 'staff', '123');
	$sql=$pdo->prepare('select * from follow where memberID=? and class_Name=?');
	$sql->execute([$_SESSION['member']['id'], $_REQUEST['Name']]);
	if(empty($sql->fetchAll())){
		$sql2=$pdo->prepare('insert into follow values(?,?)');
		$sql2->execute([$_SESSION['member']['id'], $_REQUEST['Name']]);
		echo '課程加入追蹤清單成功。';
		
	}else{
		echo '課程已經存在!';
	}

	echo '<hr>';
	require 'favorite.php';
} else {
	echo '請先登入，才能將課程加入我的最愛。';
}
?>
<?php require '../footer.php'; ?>
