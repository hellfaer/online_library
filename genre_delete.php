<?php
include ('db.php');
$id=$_GET['id'];
$result = mysqli_query($connect, "DELETE FROM genre WHERE genre.id_genre=$id");
if ($result) {
    echo "<p>Жанр успешно удалён</p>";
    ?>
    <script type="text/javascript">
        window.location="genre_view.php"
    </script>
<?php }
else echo "Ошибка удаления";
?>
<p><a href="book_view.php">На главную страницу</a></p>
