<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<form action="product.php" method="post">
<div id="search">
	<p>課程類別搜尋</p>
	<input type="text" name="keyword">
	<input type="submit" value="搜尋">
</div>
</form>
<hr>
<?php
echo '<table border="2" cellpadding="4" cellspacing="1" style="border: 3px solid #274e13; 
border-collapse: collapse; width:400px;">';
echo '<th>編號</th><th>類別</th><th>教師名稱</th>';

$pdo=new PDO('mysql:host=localhost;dbname=class;charset=utf8', 'staff', '123');

if (isset($_REQUEST['keyword'])) {
	$sql=$pdo->prepare('select * from teacher where class like ?');
	$sql->execute(['%'.$_REQUEST['keyword'].'%']);
} else {
	$sql=$pdo->prepare('select * from teacher');
	$sql->execute([]);
}
foreach ($sql->fetchAll() as $row) {
	$id=$row['id'];
	$teacher=$row['teacher'];
	echo '<tr>';
	echo '<td>', $id, '</td>';
	echo '<td>', $row['class'], '</td>';
	echo '<td>';
	echo '<a href="detail.php?teacher=', $teacher, '">', $row['teacher'], '</a>';
	echo '</td>';
	echo '</tr>';
}
echo '</table>';
?>
<?php require '../footer.php'; ?>