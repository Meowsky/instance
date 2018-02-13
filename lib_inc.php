<?php
//Функция фильтра полученных данных
function clearData($data, $type="s"){
	switch($type){
		case "s": $data = stripslashes(trim(strip_tags($data)));break;
		case "i": $data = abs((int)$data);break;
		}
	return $data;
}

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}
?>