<?php
include "connect.inc.php";
$db = DataBase::getDB();

if (isset($_COOKIE["id"]) and isset($_COOKIE["hash"])){
    $sql = "SELECT * FROM users WHERE id ={?} LIMIT 1";
    $row = $db->selectRow($sql,array($_COOKIE["id"]));
	if($row["hash"] !== $_COOKIE["hash"] or $row["id"] !== $_COOKIE["id"]){
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
        print "Хм, что-то не получилось";
    }
    else
    {
        print "Привет, ".$row["login"]."Всё работает!";
    }
}
else
{
    print "Включите куки";
}

?>