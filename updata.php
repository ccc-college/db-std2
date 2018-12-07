<?php
$dsn = 'mysql:dbname=study;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$id = 2;
$email = 'sample@test.com';
try{
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE user SET email = :email WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    echo '処理が終了しました。';
}catch (PDOException $e){
    print('Connection failed:'.$e->getMessage());
    die();
}
