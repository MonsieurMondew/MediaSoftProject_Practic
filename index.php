<html>
    <head>
        <title>Главная страница</title>
    </head>
    <body>
    <form method="post" enctype="multipart/form-data" action="uploadd_page.php">
        <h3>Здравствуйте, гость, нажмите кнопочку, чтобы загрузить текст, который вас интересует:
            <button name="nextBut">Загрузить</button>
        </h3>
    </form>
    <h3>Тексты:</h3>
    <?php
    $connection = new PDO('mysql:dbname=MyFirstBD;host=localhost:3306', 'root', 'root');
    $selectQuery = 'SELECT * FROM uploaded_text';
    $selectRows = $connection->query($selectQuery)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($selectRows as $selectRow):?>
    <form method="post" action="full_information_page.php">
        <h4><?='Текст № '.$selectRow['id'] .'.'?> <?='Содержание: '.substr($selectRow['content'],0,45) . "..."?>
            <input type="submit" name="moreInfo" value="подробнее" >
            <input type="hidden" name="textId" value=<?= $selectRow['id']?> >
        </h4>
    </form>
    <?php endforeach;?>
    </body>
</html>