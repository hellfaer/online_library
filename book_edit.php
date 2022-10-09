<?php
include ('db.php');
$id=$_GET['id'];
$data = mysqli_query($connect, "SELECT * FROM book WHERE book.id=$id");
$book = mysqli_fetch_array($data);
?>

<form action="" method="POST">
    <p>Название книги: <input type="text" name="title" value="<?=$book['title']?>" required></p>
    <p>Год написания: <input type="number" name="written" min="1500" value="<?=$book['written']?>" required></p>
    <p> Жанр
        <select name="genre">
            <?php
            $result = mysqli_query($connect, "SELECT * FROM genre");
            while ($row=mysqli_fetch_array($result)){
                if ($row['id_genre']==$book['id_genre']) {
                    echo "<option value=$row[id_genre] selected>$row[name]</option>";
                }
                else echo "<option value=$row[id_genre]>$row[name]</option>";
            }
            ?>
        </select>
    </p>
    <p> Автор
        <select name="author">
            <?php
            $result = mysqli_query($connect, "SELECT * FROM author");
            while ($row=mysqli_fetch_array($result)){
                if ($row['id_author']==$book['id_author']) {
                    echo "<option value=$row[id_author] selected>$row[surname] $row[name] $row[patr]</option>";
                }
                else echo "<option value=$row[id_author]>$row[surname] $row[name] $row[patr]</option>";
            }
            ?>
        </select>
    </p>
    <input type="submit" name="submit" value="Изменить">
</form>

<?php
if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $written = $_POST['written'];
    $genre = $_POST['genre'];
    $author = $_POST['author'];
    $result = mysqli_query($connect, "UPDATE book SET title='$title', written='$written', id_genre='$genre', id_author='$author'
                                            WHERE id='$id'");
    if ($result) {
        echo "<p>Книга успешно изменена</p>";
        ?>
        <script type="text/javascript">
            window.location="book_view.php"
        </script>
    <?php }
    else echo "Ошибка изменения данных";
}
?>
<p><a href="book_view.php">На главную страницу</a></p>
