<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
session_start();
if (isset($_SESSION['member'])) {
	unset($_SESSION['member']);
	echo '登出成功。';
} else {
	echo '您原本就已登出。';
}
?>
<?php require '../footer.php'; ?>
