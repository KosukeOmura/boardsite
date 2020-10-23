<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

    <!--登録部分CSS-->
	<link rel="stylesheet" href="user_done.css">
	<title>新規ユーザーチェック画面</title>
</head>
	<body>	
        <div class="user_done_box">

            <?php

            // session_start();
            // session_regenerate_id(true);
            // if(isset($_SESSION['login'])==false) {
            //     echo 'ログインできません';
            //     echo '<a href="../login/staff_login.html">ログイン画面へ</a>';
            //     exit();
            // }else {

            //     echo $_SESSION['staff_name'];
            //     echo 'さんログイン中 <br />';
            //     echo '<br />';
            // }


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

            try{

                //new_user_top.phpから入力データを受け取り処理
                $login_name = $_POST['name'];
                $login_pass =$_POST['password'];


                $login_name=htmlspecialchars($login_name,ENT_QUOTES,'UTF-8');
                $login_pass=htmlspecialchars($login_pass,ENT_QUOTES,'UTF-8');

                //DB接続
                $db = new PDO(PDO_DSN,DB_USER,DB_PASS);
                //エラーをスロー
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql='INSERT INTO usersd (name,password) VALUES (?,?)';
                $stmt=$db->prepare($sql);
                $data[]=$login_name;
                $data[]=$login_pass;
                $stmt->execute($data);


                echo $login_name;
                echo 'さんを追加しました。<br />';


                $db= null;

            } catch(PDOException $e){
                echo 'ただいま障害により大変ご迷惑をお掛けしております。';
                exit();
            }

            $db=null;

            ?>

            <a href="../login/top_login.html"> ログインページ</a>

        </div>
	</body>
</html>