<?php
include 'db_connection.php';

$bookId = $_GET['id'];

$sql = "SELECT * FROM tbl_44_books WHERE id = " . $bookId;
$result = $conn->query($sql);

$book = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Details</title>
</head>
<body>
    <h1>Book Details</h1>
    <img src="<?= $book['image_path2'] ?>" alt="<?= $book['title'] ?>">
    <h3><?= $book['title'] ?></h3>
    <p><?= $book['description'] ?></p>
    <p>Price: <?= $book['price'] ?></p>
    <p>Rating: <?= $book['rating'] ?></p>
    <p>Author: <?= $book['author'] ?></p>

    <img src="<?= $book['image_path1'] ?>" alt="<?= $book['title'] ?>">
</body>
</html>
