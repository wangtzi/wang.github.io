<?php
$total=0;
if (!empty($_SESSION['class'])) {
	echo '<table>';
	echo '<th>課程編號</th><th>課程名稱</th>';
	echo '<th>課程價格</th><th>小計</th>';
	
	foreach ($_SESSION['class'] as $id=>$class) {
		echo '<tr>';
		echo '<td>', $id, '</td>';
		echo '<td><a href="classdetail.php?Name=', $class['Name'], '">',$class['Name'], '</a></td>';
		echo '<td>', $class['price'], '</td>';
		$subtotal=$class['price'];
		$total+=$subtotal;
		echo '<td>', $total, '</td>';
		echo '<td><a href="cart-delete.php?id=', $id, '">刪除</a></td>';
		echo '</tr>';
	}
	echo '<tr><td>合計</td><td></td><td></td><td></td><td>', $total, 
		'</td><td></td></tr>';
	echo '</table>';
} else {
	echo '購物車內無商品。';
}
?>
