<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!--登録部分CSS-->
	<link rel="stylesheet" href="new_user_top.css">
    
    <title>掲示板新規ユーザー登録画面</title>
</head>
<body>


<div class="new_user_box">

    新規ユーザー登録画面 <br>
    <br />
    <form method="post" action="user_add_check.php" enctype="multipart/form-data">

    お名前を入力してください。<br/>
    <input type="text" name="name" style="width:200px" class="name_touroku"> <br />
    パスワードを入力してください<br />
    <input type="password" name="password" style="width:50px" class="pass_touroku"> <br />
    パスワードをもう１度入力してください。<br />
    <input type="password" name="pass2" style="width:400px" class="pass_check"><br />
    <br />
    <input type="button" onclick="history.back()" value="戻る" >
    <input type="submit" value="OK">

    </form>
</div>

    
</body>
</html>