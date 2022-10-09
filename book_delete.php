<?php
include ('db.php');
$id=$_GET['id'];
$result = mysqli_query($connect, "DELETE FROM book WHERE book.id=$id");
    if ($result) {
        echo "<p>Книга успешно удалена</p>";
?>
    <script type="text/javascript">
        window.location="book_view.php"
    </script>
<?php }
else echo "Ошибка удаления книги";
?>
<p><a href="book_view.php">На главную страницу</a></p>
