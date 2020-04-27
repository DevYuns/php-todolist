<?php

include __DIR__.'/../includes/databaseConnection.php';

try {
    if (isset($_POST['content'])){
        $sql = 'UPDATE `list` SET `content`=:content WHERE `id`=:id' ;

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_POST['listId']);
        $stmt->bindValue(':content', $_POST['content']);
        $stmt->execute();

        header('Location:index.php');
    } else {
        $query = $pdo->prepare('SELECT `content`,`id` FROM `list` WHERE `id`=:id');
        $query->bindValue(':id', $_GET['id']);
        $query->execute();

        $list = $query->fetch();

        include __DIR__.'/../public/templetes/home.html.php';
    }
} catch (PDOException $e){
    echo '데이터베이스오류 : '.$e->getMessage().', 위치 : '. $e->getFile().':'.$e->getLine();
}