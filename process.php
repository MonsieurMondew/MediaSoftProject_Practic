<?php

$today = date("Y-m-d h:i:s");#Дата и время сегодня

$connection = new PDO('mysql:dbname=MyFirstBD;host=localhost:3306', 'root', 'root'); #Соединение с бд
$query = 'INSERT INTO uploaded_text(content, date, words_count) VALUES (?,?,?)';#Запрос на добавление новых значений в таблицу uploaded_text

$querySecond = 'INSERT INTO word(text_id, word, count) VALUES (?,?,?)';#Запрос на добавление новых значений в таблицу word

if (!empty($_FILES['docs']['name'])){ #Проверка на наличие файла
    $fileText = file_get_contents($_FILES['docs']['tmp_name']);

    #Изменение текста
    $text = mb_strtolower($fileText);
    $punctuation = ['.',',','-',PHP_EOL, '!'];
    $newText = str_replace($punctuation, "", $text);
    $masText = explode(" ", $newText);

    #Подсчет слов
    $lastMas = array_count_values($masText);
    $countText = count($masText);

    #Добавление значений в таблицу uploaded_text
    $insertQuery = $connection -> prepare($query);
    $insertQuery -> execute([$fileText,$today,$countText]);

    #Добавление значений в таблицу word
    $checkQuery = 'SELECT id FROM uploaded_text order by id DESC limit 1';#Запрос для выявления последней записи в uploaded_text
    $checkRow = $connection->query($checkQuery)-> fetch();#Создание ассоциативного массива с этой записью
    foreach ($lastMas as $key => $value){
        $insertQuery = $connection -> prepare($querySecond);
        $insertQuery ->execute([$checkRow[0], $key, $value]);
    }
}
?>
<html>
    <head>
        <title>Результная страничка</title>
    </head>
    <body>
    <form method="post" enctype="multipart/form-data" action="index.php">
        <h3>Поздравляю, данные были успешно загружены!
            <input type="submit" name="moreInfo" value="вернуться" >
        </h3>
    </body>
</html>
