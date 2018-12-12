<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST["name"])){
        $name = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    }
}

$dsn = 'mysql:dbname=study;host=localhost;charset=utf8';
$user = 'root';
$password = '';

$data = [];

try{


    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user WHERE name like :name";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', '%'.$name.'%', PDO::PARAM_STR);
    $stmt->execute();
    $count = 0;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
        $count++;
    }

}catch (PDOException $e){
    echo($e->getMessage());
    die();
}
?>
<html>
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
<body>
<h1>会員データ一覧</h1>
<p><?php echo $count;?>件見つかりました。</p>
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
<p style="margin:8px;">
<input type="button" value="戻る" onClick="history.back()" />
</p>
</body>
</html>
