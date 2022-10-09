<?php
include ('db.php');
$id=$_GET['id'];
$result = mysqli_query($connect, "DELETE FROM author WHERE author.id_author=$id");
    if ($result) {
        echo "<p>Автор успешно удалён</p>";
        ?>
        <script type="text/javascript">
            window.location="author_view.php"
        </script>
    <?php }
    else echo "Ошибка удаления";
    ?>
    <p><a href="book_view.php">На главную страницу</a></p>