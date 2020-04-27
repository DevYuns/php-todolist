<?php

include __DIR__.'/../includes/databaseConnection.php';

try {
    if (isset($_POST['content'])){
        $sql = 'INSERT INTO `list` SET
            `content` = :content';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':content', $_POST['content']);
        $stmt->execute();

        header('Location:index.php');
    } else {
        $sql = 'SELECT * FROM `list`';

        $stmt = $pdo->query($sql);
        header('Location:index.php');
    }

    } catch (PDOException $e){
        echo '데이터베이스오류 : '.$e->getMessage().', 위치 : '. $e->getFile().':'.$e->getLine();
    }


