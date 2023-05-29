<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
session_start();
if (isset($_SESSION['member'])) {
	$pdo=new PDO('mysql:host=localhost;dbname=class;charset=utf8', 'staff', '123');

	$sql_purchase=$pdo->prepare('select * from purchase where member_id=? order by purchase_id desc');
	$sql_purchase->execute([$_SESSION['member']['id']]);


	foreach ($sql_purchase->fetchAll() as $row_purchase) {
		$sql_detail=$pdo->prepare('select * from purchaseDetail,classdetail '.'where order_id=? and purchaseDetail.className=classdetail.className');
		$sql_detail->execute([  $row_purchase['purchase_id'] ]);

		echo '<table>';
		echo '<tr><th>課程編號</th><th>課程名稱</th>', 
			'<th>課程價格</th><th>小計</th></tr>';
		$total=0;
		foreach ($sql_detail->fetchAll() as $row_detail) {
			echo '<tr>';
			echo '<td>', $row_detail['id'], '</td>';
			echo '<td><a href="classdetail.php?drug=', $row_detail['className'], '">', 
				$row_detail['className'], '</a></td>';
			echo '<td>', $row_detail['price'], '</td>';
			$subtotal=$row_detail['price'];
			$total+=$subtotal;
			echo '<td>', $subtotal, '</td>';
			echo '</tr>';
		}

		echo '<tr><td>合計</td><td></td><td></td><td></td><td>', 
			$total, '</td></tr>';
		echo '</table>';
		echo '<hr>';
	}
} else {
	echo '請先登入，才能查詢購買記錄。';
}
?>
<?php require '../footer.php'; ?>
