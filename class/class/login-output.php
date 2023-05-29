<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
session_start();
unset($_SESSION['member']);
$pdo=new PDO('mysql:host=localhost;dbname=class;charset=utf8','staff', '123');
$sql=$pdo->prepare('select * from member where account=? and password=?');
$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
foreach ($sql->fetchAll() as $row) {
	$_SESSION['member']=[
		'id'=>$row['id'], 'memberName'=>$row['memberName'], 
		'region'=>$row['region'], 'phone'=>$row['phone'], 
		'email'=>$row['email'],
		'account'=>$row['account'], 'password'=>$row['password']];
}
if (isset($_SESSION['member'])) {
	echo '親愛的', $_SESSION['member']['memberName'], '、歡迎光臨。';
} else {
	echo '登入ID或密碼有誤。';
}
?>
<?php require '../footer.php'; ?>