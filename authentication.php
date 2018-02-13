<?php
include_once "connect.inc.php";
$db = DataBase::getDB();

if($_SERVER["REQUEST_METHOD"]=="POST")
	include "login_inc.php";

?>
<!DOCTYPE html>
<html>
 <head>
  <title>authentication</title>
 </head>
 <body>
 
 <form method="POST">
Логин <input name="login" type="text" required><br>
Пароль <input name="password" type="password" required><br>
<input name="sub" type="submit" value="Войти">
</form>

 </body>
</html>