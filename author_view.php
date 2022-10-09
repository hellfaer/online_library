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

    <title>Таблица авторов</title>
</head>
<body>
<form action="" method="POST">
    <label>Дату рождения автора для поиска
        <input type="text" name="keyword" minlength="4" required>
    </label>
    <input type="submit" name="submit" value="Поиск">
</form>

<?php

//print_r($_POST);
if (isset($_POST['submit'])) {
    $keyword=$_POST['keyword'];
    $search=mysqli_query($connect, "SELECT * FROM author WHERE birth LIKE '%$keyword%'");
    if (mysqli_num_rows($search)>0) {
        $num = mysqli_num_rows($search);
        echo "<p>Найдено записей $num</p>";
        echo "<ol>";
        while ($row = mysqli_fetch_assoc($search)) {

            echo "<li><a href='author_one_view.php?id={$row['id_author']}'>{$row['surname']} {$row['name']}</a></li>";

        }
        echo "<ol>";
    }
    else echo "<p>По вашему запросу ничего не найдено</p>";
}
?>

<?php
$result = mysqli_query($connect, "SELECT * FROM `author`");
    echo "<table border=1 width=100%>
                    <tr>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>Год рождения</th>
                        <th>Изменить</th>
                        <th>Удалить</th>
                    </tr>";
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>". $row['surname']."</td>";
        echo "<td>". $row['name']."</td>";
        echo "<td>". $row['patr']."</td>";
        echo "<td>". $row['birth']."</td>";
        ?>
        <td align="center"><a href=author_edit.php?id=<?= $row['id_author']?>><img src="img/doc.png"></a> </td>
        <td align="center"><a href=author_delete.php?id=<?= $row['id_author']?>
                              onclick="return confirm('Уверенны, что хотите удалить?')">
                            <img src="img/delete.png"></a> </td>
        <?php echo "</tr>";

    }
    echo "</table>";
?>
<p><a href="book_view.php">На главную страницу</a></p>

</body>
</html>