<?php

/*   ここにDB接続時に必要な処理・命令を記述


      */


try{

    $dbh = /* ここに必要な処理・命令を記述    */
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*  ここに必要な処理・命令を記述  */
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $count = $stmt->rowCount();  /* 行数  */
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){  /* データの取り出し */
        $data[] = $row;
    }

}catch (PDOException $e){
    echo($e->getMessage());
    die();
}

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

/* ここに必要な処理・命令を記述





       */


</table>
</body>
</html>
