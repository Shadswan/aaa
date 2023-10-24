<html>
<head> <title> Сведения о прользователях сайта </title> </head>
<body>
<?php
mysqli_connect("localhost", "root") or die ("Невозможно подключиться к 
серверу");// установление соединения с сервером
mysqli_query('SET NAMES cp1251');//типкодировки
// подключение к базе данных:
mysqli_select_db("users") or die("Нет такой таблицы!");
?>
<h2>Зарегистрированные пользователи:</h2>
<table border="1">
<tr>//вывод«шапки»таблицы
<th> Имя </th> <th> E-mail </th>
<th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query("SELECT id_user, user_name, user_e_mail FROM 
user");//запроснавыборкусведенийопользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
echo "<tr>";
echo "<td>" . $row['user_name'] . "</td>";
echo "<td>" . $row['user_e_mail'] . "</td>";
echo "<td><a href='edit.php?id=" . $row['id'] ."'>Редактировать</a></td>";// запуск скрипта для редактирования
echo "<td><a href='delete.php?id=" . $row['id'] ."'>Удалить</a></td>";// запуск скрипта для удаления записи
echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result);//числозаписейвтаблицеБД
print("<P>Всего пользователей: $num_rows </p>");
?>
<p> <a href="new.html"> Добавить пользователя </a>
</body> </html>