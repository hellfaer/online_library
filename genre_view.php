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

    <title>Таблица жанров</title>
</head>
<body>

<?php
    $result = mysqli_query($connect, "SELECT id_genre, name FROM genre");
        echo "<table border=1 width=100%>
                        <tr>
                            <th>Жанр</th>
                            <th>Изменить</th>
                            <th>Удалить</th>
                        </tr>";
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>". $row['name']."</td>";

            ?>
            <td align="center"><a href=genre_edit.php?id=<?= $row['id_genre']?>><img src="img/doc.png"></a> </td>
            <td align="center"><a href=genre_delete.php?id=<?= $row['id_genre']?>
                                            onclick="return confirm('Уверенны, что хотите удалить?')">
                                            <img src="img/delete.png"></a> </td>
            <?php echo "</tr>";
        }
echo "</table>";
?>
<p><a href="book_view.php">На главную страницу</a></p>
</body>
</html>
