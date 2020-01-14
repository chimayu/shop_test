<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ろくまる農園</title>
</head>
<body>
<?php

try{
    $staff_code = htmlspecialchars($_POST['code'], ENT_QUOTES, 'UTF-8');

    $dsn = 'mysql:dbname=shop_test_db;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'DELETE FROM mst_staff WHERE code = ?';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_code;
    $stmt->execute($data);

    $dbh = null;

} catch (Exception $e) {
    print '<div style="text-align:center;"><br /><br /><img src="assets/img/img01.jpg" style="width:400px;"><br />ただいま障害により大変ご迷惑をお掛けしております。</div>';
    exit();
}

?>

削除しました。<br />
<br />
<a href="staff_list.php">戻る</a>
</body>
</html>