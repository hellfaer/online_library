<?php
include ('db.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Таблица книг</title>
</head>
<body>
    <form action="" method="POST">
        <label>Введите название книги для поиска
            <input type="text" name="keyword" minlength="4" required>
        </label>
        <input type="submit" name="submit" value="Поиск">
    </form>
    <p><a href="book_insert.php">Добавить новую книгу</a></p>

    <p><a href="author_insert.php">Добавить нового автора</a></p>

    <p><a href="genre_insert.php">Добавить новый жанр</a></p>

    <?php

        //print_r($_POST);
        if (isset($_POST['submit'])) {
            $keyword=$_POST['keyword'];
            $search=mysqli_query($connect, "SELECT * FROM book WHERE title LIKE '%$keyword%'");
            if (mysqli_num_rows($search)>0) {
                $num = mysqli_num_rows($search);
                echo "<p>Найдено записей $num</p>";
                echo "<ol>";
                while ($row = mysqli_fetch_assoc($search)) {
                    echo "<li><a href=book_one_view.php?id=$row[id]> ".$row['title']."</a></li>";
                }
                echo "<ol>";
            }
            else echo "<p>По вашему запросу ничего не найдено</p>";
        }
    ?>

    <?php
    $result = mysqli_query($connect, "SELECT book.id, book.title, book.written, author.surname, author.name AS aname, genre.name AS gname 
                                                FROM book 
                                                INNER JOIN author ON author.id_author=book.id_author 
                                                INNER JOIN genre ON genre.id_genre=book.id_genre");
    echo "<table border=1 width=100%>
                <tr>
                    <th>Название книги</th>
                    <th>Год написания</th>
                    <th>Фамилия автора</th>
                    <th>Имя автора</th>
                    <th>Жанр</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                </tr>";
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>". $row['title']."</td>";
        echo "<td>". $row['written']."</td>";
        echo "<td>". $row['surname']."</td>";
        echo "<td>". $row['aname']."</td>";
        echo "<td>". $row['gname']."</td>";
        ?>
        <td align="center"><a href=book_edit.php?id=<?= $row['id']?>><img src="img/doc.png"></a> </td>
        <td align="center"><a href=book_delete.php?id=<?= $row['id']?>
                                    onclick="return confirm('Уверенны, что хотите удалить?')">
                                    <img src="img/delete.png"></a> </td>
        <?php echo "</tr>";
}
echo "</table>";
?>

    <p><a href="author_view.php">На страницу авторов</a></p>
    <p><a href="genre_view.php">На страницу жанров</a></p>
</body>
</html>