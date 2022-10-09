<?php
include ('db.php');
?>
<form action="" method="POST">
    <p>Название книги: <input type="text" name="title" required></p>
    <p>Год написания: <input type="number" name="written" min="1500" required></p>
    <p> Жанр
        <select name="genre">
            <?php
                $result = mysqli_query($connect, "SELECT * FROM genre");
                while ($row=mysqli_fetch_array($result)){
                    echo "<option value=$row[id_genre]>$row[name]</option>";
                }
            ?>
        </select>
    </p>
    <p> Автор
        <select name="author">
            <?php
                $result = mysqli_query($connect, "SELECT * FROM author");
                while ($row=mysqli_fetch_array($result)){
                    echo "<option value=$row[id_author]>$row[surname] $row[name] $row[patr]</option>";
                }
            ?>
        </select>
    </p>
    <input type="submit" name="submit" value="Добавить">
</form>

<?php
    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $written = $_POST['written'];
        $genre = $_POST['genre'];
        $author = $_POST['author'];
        $result = mysqli_query($connect, "INSERT into book (title, written, id_genre, id_author) 
                                                VALUES ('$title', '$written', '$genre', '$author')");
        if ($result) {
            echo "<p>Книга успешно добавлена</p>";
        ?>
        <script type="text/javascript">
            window.location="book_view.php"
        </script>
        <?php }
        else echo "Ошибка добавления";
    }
?>
<p><a href="book_view.php">На главную страницу</a></p>
