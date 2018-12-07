<?php

$dsn = 'mysql:dbname=study;host=localhost;charset=utf8';
$user = 'root';
$password = '';

try{

    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $count = $stmt->rowCount();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    /* echo '処理が終了しました。'; */

}catch (PDOException $e){
    echo($e->getMessage());
    die();
}
/*var_dump($count);*/
/*var_dump($data);*/
?>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}
table th {
  padding: 10px;
  border: solid 1px black;
  color: #CCFFFF;
  background: #008080;
}
table td {
  padding: 3px 10px;
  border: solid 1px black;
}
</style>
</head>
<body>
<h1>会員データ一覧</h1>
<table border=1>
    <tr><th>id</th><th>名前</th><th>年齢</th><th>メールアドレス</th></tr>
    <?php foreach($data as $row): ?>
    <tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['age'];?></td>
    <td><?php echo $row['email'];?></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>