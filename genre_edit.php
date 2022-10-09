<?php
include ('db.php');
$id=$_GET['id'];
$data = mysqli_query($connect, "SELECT * FROM genre WHERE genre.id_genre=$id");
$genre = mysqli_fetch_array($data);
?>
    <form action="" method="POST">
        <p>Изменить название жанра: <input type="text" name="name" value="<?=$genre['name']?>" required></p>
        <input type="submit" name="submit" value="Изменить">
    </form>
<?php
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $result = mysqli_query($connect, "UPDATE genre SET name='$name' WHERE id_genre='$id'");
    if ($result) {
        echo "<p>Жанр успешно добавлена</p>";
        ?>
        <script type="text/javascript">
            window.location="genre_view.php"
        </script>
    <?php }
    else echo "Ошибка добавления";
}
?>
<p><a href="book_view.php">На главную страницу</a></p>
