<?php
include ('db.php');
?>
    <form action="" method="POST">
        <p>Фамилия автора: <input type="text" name="surname" required></p>
        <p>Имя автора: <input type="text" name="name" required></p>
        <p>Отчечтво автора: <input type="text" name="patr" required></p>
        <p>Дата рождения : <input type="date" name="birth" required></p>
        <input type="submit" name="submit" value="Добавить">
    </form>

<?php
    if(isset($_POST['submit'])) {
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $patr = $_POST['patr'];
        $birth = $_POST['birth'];
        $result = mysqli_query($connect, "INSERT into author (surname, name, patr, birth) 
                                                    VALUES ('$surname', '$name', '$patr', '$birth')");
        if ($result) {
            echo "<p>Автор успешно добавлен</p>";
            ?>
            <script type="text/javascript">
                window.location="book_view.php"
            </script>
        <?php }
        else echo "Ошибка добавления";
}
?>
<p><a href="book_view.php">На главную страницу</a></p>
