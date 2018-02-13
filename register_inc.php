<?php
include "lib_inc.php";
//Фильтруем данные
$login = clearData($_POST["login"]);
$password = clearData($_POST["password"]);
$fname = clearData($_POST["fname"]);
$lname = clearData($_POST["lname"]);
$dob = $_POST["dob"];
if(isset($_POST["boy"]))
	$gender = $_POST["boy"];

if(isset($_POST["sub"])){
	$err = array();
	// проверям логин
	if(!preg_match("/^[a-zA-Z0-9]+$/", $login)){
		$err[] = "Логин может состоять только из букв английского алфавита и цифр";
	}
	
	if(strlen($login) < 4 or strlen($login) > 30)
		$err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
		
	// проверяем, не сущестует ли пользователя с таким именем	
	$sql = "SELECT COUNT(id) FROM users WHERE login={?}";
	$row = $db->selectCell($sql,array($login));
	
	if($row == 0)
		true;	
	else
			$err[] = "Пользователь с таким логином уже существует";
			
	// Если нет ошибок, то добавляем в БД нового пользователя
	if(count($err) == 0){
		$log = $login;
		$pass = md5(md5($password));
		$sql = "INSERT INTO users
						(login, password, fname, lname,
						gender, dob)
						VALUES ('$log', '$pass',
						'$fname', '$lname', '$gender', '$dob')";
		$row = $db->query($sql);
		header("Location: authentication.php");
	}else{
		echo "<b>При регистрации произошли следующие ошибки:</b><br>";
		foreach($err as $error)
			echo $error."<br>";
	}
}
?>