<?php

include __DIR__.'/../includes/databaseConnection.php';

try {
    $sql = 'SELECT `id`, `content` FROM `list`';
    $result = $pdo->query($sql);

    while ($row = $result->fetch()){
        $lists[] = ['id'=>$row['id'], 'content'=>$row['content']];
    }

    ob_start();
    include __DIR__.'/../public/templetes/toDoList.html.php';
    $output = ob_get_clean();

} catch (PDOException $e){
    echo '데이터베이스오류 : '.$e->getMessage().', 위치 : '. $e->getFile().':'.$e->getLine();
}