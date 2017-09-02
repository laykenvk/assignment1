<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
<title>Logged In</title>
</head>
<body>
    <h1 id="title">Welcome</h1>
    <?php
    if (!empty($_SESSION['uid'])){
		echo 'Logged in as user '.$_SESSION['un'];
		echo '<br> This is your own secret page!';
	}
	else {
		echo 'Not logged in...';
	}
    
    ?>
    
    <fieldset id="form">
        <a href="logout.php" style="text-decoration:none; color:black; text-align:center;"><p>Logout</p></a>
    </fieldset>
    
</body>
</html>
