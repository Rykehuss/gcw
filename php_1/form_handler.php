<?php
/**
 * Created by PhpStorm.
 * User: Dimitry
 * Date: 07.12.2017
 * Time: 15:54
 */

$nickname = htmlspecialchars(filter_input(INPUT_POST, "nickname"));
$message = htmlspecialchars(filter_input(INPUT_POST, "message"));
//echo $nickname;
//echo $message;

if ($nickname && $message) {
    require_once("db_config.php");

    $dbhandler = mysqli_connect($host, $user, $passwrd, $dbname);

    if (!$dbhandler) {
        exit("Can't connect to DB!");
    }
    
	mysqli_set_charset($dbhandler, "utf8");

    $t = time();
//    var_dump($t);
    $result = mysqli_query($dbhandler, "INSERT INTO messages (nickname,message,date) VALUES ('{$nickname}','{$message}',{$t})");
//    var_dump($result);
}

Header("Location: index.php");