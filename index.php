<?php
include 'db_connection.php';

$sql = "SELECT * FROM tbl_44_books";
$result = $conn->query($sql);

$books = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
</head>
<body>
    <h1>Book List</h1>

    <!-- Category Dropdown -->
    <select id="categoryDropdown">
        <option value="all">All Categories</option>
        <?php
        // Read categories from JSON file
        $categories = json_decode(file_get_contents('categories.json'), true);

        foreach ($categories as $category) {
            echo "<option value='" . $category . "'>" . $category . "</option>";
        }
        ?>
    </select>

    <!-- Book List -->
    <ul id="bookList">
        <?php foreach ($books as $book): ?>
            <li data-category="<?= $book['category'] ?>">
                <a href="book.php?id=<?= $book['id'] ?>">
                    <h3><?= $book['title'] ?></h3>
                    <p><?= $book['description'] ?></p>
                    <p>Category: <?= $book['category'] ?></p>
                    <p>Price: <?= $book['price'] ?></p>
                    <p>Rating: <?= $book['rating'] ?></p>
                    <p>Author: <?= $book['author'] ?></p>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#categoryDropdown").change(function() {
                var selectedCategory = $(this).val();

                $("#bookList li").hide();
                if (selectedCategory === "all") {
                    $("#bookList li").show();
                } else {
                    $("#bookList li[data-category='" + selectedCategory + "']").show();
                }
            });
        });
    </script>
</body>
</html>
