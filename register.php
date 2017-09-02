<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Untitled Document</title>
</head>

<body>

<?php
if(!empty(filter_input(INPUT_POST, 'submit'))) {
	
	require_once('db_con.php');
	
	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal name parameter');
	$pw = filter_input(INPUT_POST, 'pw') 
		or die('Missing/illegal password parameter');
	// hash and salt the password
	$pw = password_hash($pw, PASSWORD_DEFAULT); 
	
//	echo 'Creating user: '.$un.' => '.$pw;
	
	$sql = 'INSERT INTO users (username, pwhash) VALUES (?,?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ss', $un, $pw);
	$stmt->execute();
	
	if ($stmt->affected_rows >0){
		echo 'user '.$un.' is added!';
	}
	else {
		echo 'User '.$un.' already exists"';
	}
}
?>
<h1 id="title">Design Your Life</h1>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset id="form">
    	<legend id="sub">Create User</legend>
    	<input name="un" type="text" placeholder="Username" required id="input"/><br>
    	<input name="pw" type="password" placeholder="Password"  required id="input"/><br>
    	<input type="submit" name="submit" value="Create User" id="button"/>
	</fieldset>
</form>
<fieldset id="form">
    <a href="log-in.php" style="text-decoration:none; color:black;"><p>Login Here</p></a>
</fieldset>


</body>
</html>
