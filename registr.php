<?php
include_once "connect.inc.php";
$db = DataBase::getDB();

if($_SERVER["REQUEST_METHOD"]=="POST")
	include "register_inc.php";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>registration</title>
	</head>
<body>
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
		Логин <input type="text" name="login" required><br>
		Пароль <input type="password" name="password" required><br>
		</h3>Персональные данные:</h3><br>
		Имя: <input type="text" name="fname" required><br>
		Фамилия: <input type="text" name="lname" required><br>
		Пол: <input type="radio" name="boy" value="boy" checked>Мужчина
		<input type="radio" name="boy" value="girl">Женщина<br>	
		Дата рождения: <input type="text" name="dob" required><br>
		<input type="submit" name="sub" value="Зарегистрироваться">
	</form>

</body>
</html>
