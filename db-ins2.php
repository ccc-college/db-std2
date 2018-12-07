<?php 

$dsn = 'mysql:dbname=study;host=localhost;charset=utf8'; 

$user = 'root'; 

$password = ''; 

$name = '中川一郎'; 

$age = 33; 

try{ 

    $dbh = new PDO($dsn, $user, $password); 

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $sql = "INSERT INTO user (name, age) VALUE (:name, :age)"; 

    $stmt = $dbh->prepare($sql); 

    $stmt->bindValue(':name', $name, PDO::PARAM_STR); 

    $stmt->bindValue(':age', $age, PDO::PARAM_INT); 

    $stmt->execute(); 

    echo '処理が終了しました。'; 

}catch (PDOException $e){ 

    echo($e->getMessage()); 

    die(); 

} 

 