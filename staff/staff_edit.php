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

    $staff_code = $_GET['staffcode'];

    $dsn = 'mysql:dbname=shop_test_db;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT name FROM mst_staff WHERE code = ?';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_code;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $staff_name = $rec['name'];

    $dbh = null;

} catch (Exception $e) {
    print '<div style="text-align:center;"><br /><br /><img src="assets/img/img01.jpg" style="width:400px;"><br />ただいま障害により大変ご迷惑をお掛けしております？</div>';
    exit();
}

?>

スタッフ修正<br />
<br />
スタッフコード<br />
<?php print $staff_code; ?>
<br />
<br />
<form method="POST" action="staff_edit_check.php">
<input type="hidden" name="code" value="<?php print $staff_code; ?>">
スタッフ名<br />
<input type="text" name="name" style="width:200px" value="<?php print $staff_name; ?>"><br />
パスワードを入力してください。<br />
<input type="password" name="pass" style="width:100px"><br />
パスワードをもう1度入力してください。<br />
<input type="password" name="pass2" style="width:100px"><br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</body>
</html>