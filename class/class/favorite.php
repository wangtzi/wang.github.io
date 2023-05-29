<?php
if (isset($_SESSION['member'])) {
	echo '<table>';
	echo '<th>課程編號</th><th>課程名稱</th><th>課程價格</th>';
	$pdo=new PDO('mysql:host=localhost;dbname=class;charset=utf8','staff', '123');
	$sql=$pdo->prepare('select * from follow, classDetail '.'where memberID=? and class_Name=className');

	$sql->execute([$_SESSION['member']['id']]);
	foreach ($sql->fetchAll() as $row) {
		$classid=$row['id'];
		echo '<tr>';
		echo '<td>', $classid, '</td>';
		echo '<td><a href="classdetail.php?Name='.$row['class_Name'].'">', $row['class_Name'], 
			'</a></td>';
		echo '<td>', $row['price'], '</td>';
		echo '<td><a href="favorite-delete.php?Name=', $row['class_Name'], '">刪除</a></td>';
		echo '</tr>';
	}
	echo '</table>';
} else {
	echo '請先登入，才能顯示我的最愛。';
}
?>
