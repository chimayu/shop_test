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

    $dsn = 'mysql:dbname=shop_test_db;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT code,name FROM mst_staff WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    print 'スタッフ一覧<br /><br />';
    print '<form method="POST" action="staff_branch.php">';
    
    while(true){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if($rec == false){
            break;
        }

        print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
        print $rec['name'];
        print '<br />';
    }
    print '<input type="submit" name="edit" value="修正">';
    print '<input type="submit" name="delete" value="削除">';
    print '</form>';

} catch (Exception $e) {
    print '<div style="text-align:center;"><br /><br /><img src="IMG_7123.jpg" style="width:400px;"><br />ただいま障害により大変ご迷惑をお掛けしております。</div>';
    exit();
}

?>

</body>
</html>