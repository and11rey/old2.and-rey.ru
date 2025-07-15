<?php

//***********************************************************************
// Назначение: JavaScript. Отсчет времени до даты.
// Автор: Афоничев Андрей (email: info@and-rey.ru)
// Авторские права: использовать, а также распространять данный скрипт
//                  разрешается только с разрешением автора скрипта
//***********************************************************************

$time_diff = $_GET['time'] - time();

// --------- / Запрет кэширования / ---------- //
header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: " . gmdate("D, d M Y H:i:s") . " GMT");
// ------- / end Запрет кэширования / -------- //

// внешний заголовок для js файла
header ("Content-type: application/x-javascript; charset=utf-8\n\n");

// ------ / Вывод JScript Script File / ------ //
?>
var tt = <?=$time_diff?>; // осталось секунд до даты

// отсчет времени до даты
function myTimer (diff) {
    var days = Math.floor(diff / (60 * 60 * 24)); // дни
    var diff = diff - (60 * 60 * 24) * days; // до конца дня
    var hours = Math.floor(diff / (60 * 60)); // часы
    var diff = diff - (60 * 60) * hours; // до конца часа
    var minutes = Math.floor(diff / (60)); // минуты
    var diff = diff - (60) * minutes; // до конца минуты
    var seconds = Math.floor(diff); // секунды
    var myPrint;
    if (days > 0 || hours > 0 || minutes > 0 || seconds > 0) {
    // событие не наступило если значения времени больше 0
    myPrint = days + " дней " + hours + " часов " + minutes + " минут " + seconds + " секунд ";
    } else {
    // событие наступило
    myPrint = "Выходные!";
    }
    return(myPrint);
}

// рекурсивный вызов раз в секунду
function movePic(){
    myalt.innerHTML=myTimer(tt);
    tt--;
    timerID = setTimeout("movePic()",1000);
}
