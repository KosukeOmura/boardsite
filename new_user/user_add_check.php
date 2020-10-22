<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> ろくまる農園</title>
</head>
<body>

<?php




$login_name=$_POST['name'];
$login_pass=$_POST['password'];
$login_pass2=$_POST['pass2'];
$login_code = $_POST['code'];

$login_name=htmlspecialchars($login_name,ENT_QUOTES,'UTF-8');
$login_pass=htmlspecialchars($login_pass,ENT_QUOTES,'UTF-8');
$login_pass2=htmlspecialchars($login_pass2,ENT_QUOTES,'UTF-8');

if($login_name=='')
{
	print 'スタッフ名が入力されていません。<br />';
}
else
{
	print 'スタッフ名：';
	print $login_name;
	print '<br />';
}

if($login_pass=='')
{
	print 'パスワードが入力されていません。<br />';
}

if($login_pass!=$login_pass2)
{
	print 'パスワードが一致しません。<br />';
}

if($login_name=='' || $login_pass=='' || $login_pass!=$login_pass2)
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	$login_pass=md5($login_pass);
	print '<form method="post" action="user_add_done.php">';
	print '<input type="hidden" name="name" value="'.$login_name.'">';
	print '<input type="hidden" name="password" value="'.$login_pass.'">';
	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="ＯＫ">';
	print '</form>';
}

?>

</body>
</html>