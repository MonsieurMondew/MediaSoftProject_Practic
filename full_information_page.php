<html lang="en">
    <head>
        <title>Вся информация о тексте</title>
    </head>
    <body>
    <form method="post" action="index.php">
        <h3>Подробная информация:</h3>
        <?php
        $connection = new PDO('mysql:dbname=MyFirstBD;host=localhost:3306', 'root', 'root');
        $query = "Select * from word inner join uploaded_text on word.text_id = uploaded_text.id where text_id = {$_POST['textId']}";
        $allRows = $connection ->query($query)->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h4>
        <?='Текст: '. $allRows[0]['content'].';'?> <?=' Дата:'. $allRows[0]['date'].';'?> <?=' Общее количество слов в тексте: '.$allRows[0]['words_count'].'.'?>
        </h4>
        <?php foreach ($allRows as $row):?>
        <h4>
            <?='Слово: '.' " '.$row['word'].' " '?> <?=' - '.'кол-во вхождений: '.$row['count'].'.'?>
        </h4>
        <?php endforeach;?>
        <input type="submit" name="moreInfo" value="назад" >
    </form>
    </body>
</html>
