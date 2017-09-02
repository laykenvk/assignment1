<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Login</title>
</head>

<body>

<?php
if(!empty(filter_input(INPUT_POST, 'submit'))) {
	require_once('db_con.php');
	
	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal name parameter');
	$pw = filter_input(INPUT_POST, 'pw') 
		or die('Missing/illegal password parameter');
	$sql = 'SELECT id, pwhash FROM users WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($uid, $pwhash);
	while ($stmt->fetch()) {} // fill result variables
	
	if (password_verify($pw, $pwhash)){
		header ('Location: logged-in.php');
		$_SESSION['uid'] = $uid;
		$_SESSION['un'] = $un;
	}
	else {
		echo 'Incorrect username or password';
	}
}
?>
<h1 id="title">Design Your Life</h1>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset id="form">
    	<legend id="sub">Login</legend>
    	<input name="un" type="text" placeholder="Username" required id="input"/><br>
    	<input name="pw" type="password" placeholder="Password"  required id="input"/><br>
    	<input type="submit" name="submit" value="Login" id="button"/>
	</fieldset>
</form>
<fieldset id="form">
    <p id="sub">Haven't got an account?</p>
    <a href="register.php" style="text-decoration:none; color:black;"><p>Register Here</p></a>
</fieldset>
    
</body>
</html>
