<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=class;charset=utf8', 'staff', '123');
$sql=$pdo->prepare('select * from class where teacher=?');
$sql->execute([$_REQUEST['teacher']]);


foreach ($sql->fetchAll() as $row) {
    $className=$row['className'];
    echo '<p>課程：','<a href="classdetail.php?Name=',$className, '">', $row['className'], '</a>';
    echo '<form action="cart-insert.php" method="post">';
    echo '<p>教師：', $row['teacher'], '</p>';
    echo '<p>類別：', $row['class'], '</p>';   
    }
    
?>
<?php require '../footer.php'; ?>
