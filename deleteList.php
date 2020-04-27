<?php

include __DIR__.'/../includes/databaseConnection.php';

try {
    $sql = 'DELETE FROM `list`  WHERE `id`=:id';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();

    header('Location:index.php');

} catch (PDOException $e){
    echo '데이터베이스오류 : '.$e->getMessage().', 위치 : '. $e->getFile().':'.$e->getLine();
}