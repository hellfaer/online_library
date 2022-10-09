<?php
include ('db.php');
$id=$_GET['id'];
$data = mysqli_query($connect, "SELECT * FROM author WHERE author.id_author=$id");
$author = mysqli_fetch_array($data);
?>
<form action="" method="POST">
        <p>Фамилия автора: <input type="text" name="surname" value="<?=$author['surname']?>" required></p>
        <p>Имя автора: <input type="text" name="name" value="<?=$author['name']?>" required></p>
        <p>Отчечтво автора: <input type="text" name="patr" value="<?=$author['patr']?>" required></p>
        <p>Дата рождения: <input type="date" name="birth" value="<?=$author['birth']?>" required></p>
        <input type="submit" name="submit" value="Изменить">
</form>

<?php
    if(isset($_POST['submit'])) {
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $patr = $_POST['patr'];
        $birth = $_POST['birth'];
        $result = mysqli_query($connect, "UPDATE author SET surname='$surname', name='$name', patr='$patr', birth='$birth'
                                                WHERE id_author='$id'");
        if ($result) {
            echo "<p>Автор успешно изменён</p>";
            ?>
            <script type="text/javascript">
                window.location="author_view.php"
            </script>
    <?php }
    else echo "Ошибка изменения";
}
?>
<p><a href="book_view.php">На главную страницу</a></p>
