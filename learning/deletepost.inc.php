<?php
$id = abs((int)$_GET["del"]);
if($id){
	$gbook -> deletePost($id);
	header("Location: gbook.php");
}else{
	$errMsg = "Хакер, не ломай мою Гостевую книгу!";
}
/*
ЗАДАНИЕ 1
- Отфильтруйте полученные данные
- Проверьте, корректны ли полученные данные
- Если НЕТ, то присвойте переменной $errMsg строковое значение "Хакер, не ломай мою Гостевую книгу!"
- Если ДА, то 
	вызовите метод deletePost,
	выполните перезапрос страницы, чтобы избавиться от информации, переданной через адресную строку  
*/

/* ЗАДАНИЕ 2
- После вызова метода deletePost проверьте, был ли запрос успешным?
- Если НЕТ, то присвойте переменной $errMsg строковое значение "Произошла ошибка при удалении сообщения".
	перезапрос страницы выполнять НЕ НАДО
*/
?>