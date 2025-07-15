<?php

//***********************************************************************
// Назначение: Редирект для новостей - любая ссылка (15.02.2011)
// Пример: http://and-rey.ru/inc/go3.php/www.google.ru
// Автор: Афоничев Андрей (email: info@and-rey.ru)
// Авторские права: использовать, а также распространять данный скрипт
//                  разрешается только с разрешением автора скрипта
//***********************************************************************


// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Sec-Fetch-Site
//foreach ($_SERVER as $parm => $value) { echo "$parm => '$value'<br>\n"; } exit; // test


$https   = isset($_SERVER['HTTPS'])?$_SERVER['HTTPS']:'';
$site    = isset($_SERVER['HTTP_SEC_FETCH_SITE'])?$_SERVER['HTTP_SEC_FETCH_SITE']:'';
$referer = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
$pattern_referer = '!'.$_SERVER['SERVER_NAME'].'/newsline/!';


// ссылка не с сайта
if (
       ( $https and $site != 'same-origin')
    or (!$https and !preg_match($pattern_referer, $referer))
    ) {
    //header($_SERVER['SERVER_PROTOCOL'] . " 400 Bad Request", true, 400); // некорректный запрос
    header($_SERVER['SERVER_PROTOCOL'] . " 418 I'm a teapot", true, 418); // я — чайник
    exit;
}

/*
require_once('db.php');

$mysqli = db_connect();
mysqli_query($mysqli, "SET NAMES 'utf8'");

// счетчик
$sql = "
    INSERT INTO `go3` (`id`, `date`, `count`)
    VALUES (
        NULL, NOW(), '1'
    ) ON DUPLICATE KEY UPDATE `count` = `count` + 1
";
mysqli_query($mysqli, $sql);
*/

// редирект (http://ru.wikipedia.org/wiki/Список_кодов_состояния_HTTP)
$url = substr($_SERVER['REQUEST_URI'], 5); // обрезаем "/go2/www.google.ru" до "www.google.ru"
if ($url) {
    //header("Location: http://$url");       // 302
    header("Location: //$url", true, 301); // перемещено окончательно
    //header("Refresh: 0; url=http://$url"); // есть Referer (flash какой-то)
} else {
    header("Location: /", true, 307);      // временный редирект
}

?>