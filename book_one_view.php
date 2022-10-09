<?php
include ('db.php');
$id = $_GET['id'];
//echo $id;
$result = mysqli_query($connect, "SELECT book.title, book.written, author.surname, author.name AS aname, genre.name AS gname 
                                        FROM book 
                                        INNER JOIN author ON author.id_author=book.id_author 
                                        INNER JOIN genre ON genre.id_genre=book.id_genre 
                                        WHERE book.id=$id");
echo "<table border=1 width=100%>
                <tr>
                    <th>Название книги</th>
                    <th>Год написания</th>
                    <th>Фамилия автора</th>
                    <th>Имя автора</th>
                    <th>Жанр</th>
                </tr>";
while ($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>". $row['title']."</td>";
    echo "<td>". $row['written']."</td>";
    echo "<td>". $row['surname']."</td>";
    echo "<td>". $row['aname']."</td>";
    echo "<td>". $row['gname']."</td>";
    echo "</tr>";
}
echo "</table>";
?>
<p><a href="book_view.php">На главную страницу</a></p>