<?php
include ('db.php');
?>
    <form action="" method="POST">
        <p>Название жанра: <input type="text" name='name' required></p>
        <input type="submit" name="submit" value="Добавить">
    </form>

<?php
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $result = mysqli_query($connect, "INSERT into genre (name) 
                                                VALUES ('$name')");
    if ($result) {
        echo "<p>Жанр успешно добавлена</p>";
        ?>
        <script type="text/javascript">
            window.location="book_view.php"
        </script>
    <?php }
    else echo "Ошибка добавления";
    }
?>
<p><a href="book_view.php">На главную страницу</a></p>
