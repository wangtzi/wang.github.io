<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=class;charset=utf8', 'staff', '123');

$sql=$pdo->prepare("select * from classDetail where className=?");
$sql->execute([$_REQUEST['Name']]);

foreach ($sql->fetchAll() as $row){
    echo '<form action="cart-insert.php" method="post">';
    echo '<p>課程名稱：', $row['className'], '</p>';
    echo '<p>課程簡介：', $row['detail'], '</p>';
    echo '<p>價格：', $row['price'],'元','</p>';
    
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<input type="hidden" name="Name" value="', $row['className'], '">';
    echo '<input type="hidden" name="price" value="', $row['price'], '">';
    echo '<p><input type="submit" value="放入購物車"></p>';
    echo '</form>';

    echo '<p><a href="favorite-insert.php?Name=', $row['className'], '">加入追蹤清單</a></p>';
}
?>
<?php require '../footer.php'; ?>


