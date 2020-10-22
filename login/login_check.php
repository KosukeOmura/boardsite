<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title> 掲示板ログイン</title>
</head>
<body>

<?php

ini_set("display_errors", "On");

// データベースの接続情報
// define( 'DB_HOST', 'localhost');
// define( 'DB_USER', 'kosuke');
// define( 'DB_PASS', 'komazawataxidesu');
// define( 'DB_NAME', 'board');

define('DB_HOST','board_login');
define('DB_USER','kosuke');
define('DB_PASS','komazawataxidesu');
define('PDO_DSN','mysql:host=localhost;dbname=' . DB_HOST);



try {
	//DB接続
    $db = new PDO(PDO_DSN,DB_USER,DB_PASS);
    //エラーをスロー
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$login_code=$_POST['code'];
	$login_pass=$_POST['pass'];



	$login_code=htmlspecialchars($login_code,ENT_QUOTES,'UTF-8');
	$login_pass=htmlspecialchars($login_pass,ENT_QUOTES,'UTF-8');

	$login_pass = md5($login_pass);


	$sql='SELECT name FROM  usersd WHERE code=? AND password=?';
	$stmt = $db->prepare($sql);
	$data[] = $login_code;
	$data[] = $login_pass;
	$stmt->execute($data);

	$db = null;

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

	if($rec == false) {
		echo 'スタッフコードかパスワードが間違っています。';
		echo '<a href="top_login.html>戻る</a>';
	} else {
		session_start();
		$_SESSION['login']=1;
		$_SESSION['login_code']=$login_code;
		$_SESSION['login_name']=$rec['name'];
		header('Location:../product/index.php');
		exit();
	}

} catch(Exception $e) {
	echo 'ただいま障害により大変ご迷惑をお掛けいたしております。';
	exit();
}
?>

</body>
</html>