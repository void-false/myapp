<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <title>Shopping App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="login">
        <h2>Hello shopper</h2>
    
        <form method="post" action="login.php">
            <label for="username">Username: </label><input name="username" type="text" value="" autofocus>
            <label for="password">Password: </label><input name="password" type="password" value="">
            <input name="submit" type="submit" value="Go Shopping">
        </form>
    </div>
    
</body>
</html>