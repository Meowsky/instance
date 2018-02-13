<?php
include "lib_inc.php";
//Фильтруем данные
$login = clearData($_POST["login"]);
$password = clearData($_POST["password"]);



if(isset($_POST["sub"])){
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $sql = "SELECT id, password FROM users WHERE login={?} LIMIT 1";
    $row = $db->selectRow($sql,array($login));
	
	

    // Сравниваем пароли
    if($row["password"] === md5(md5($password))){
        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));
		
	// Записываем в БД новый хеш авторизации и IP
        $sqlu = "UPDATE users SET hash= ".$hash."WHERE id=".$row["id"];
		$rowu = $db->query($sql);
		

        // Ставим куки
        setcookie("id", $row["id"], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true); 

        // Переадресовываем браузер на страницу проверки
        header("Location: login_check_inc.php"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
	
}

?>