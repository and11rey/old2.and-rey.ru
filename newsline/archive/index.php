<?php

//***********************************************************************
// Назначение: Архтв новостей v 0.2 (12.01.2010)
// Автор: Афоничев Андрей (email: info@and-rey.ru)
// Авторские права: использовать, а также распространять данный скрипт
//                  разрешается только с разрешением автора скрипта
//***********************************************************************

// ох...
$my_GET = [];
$my_GET['year'] = (isset($_GET['year']))?$_GET['year']:'';    // год
$my_GET['type'] = (isset($_GET['type']))?$_GET['type']:'xml'; // тип


// часовой пояс
date_default_timezone_set('Europe/Moscow');


if ($handle = opendir('.')) {
    while (false !== ($file = readdir($handle))) {
        if (preg_match("/^news_and-rey-(\d{2})-(\d{2})-(\d{4})\.xml$/", $file, $matches)) {
            $key = mktime(0,0,0,$matches[2],$matches[1],$matches[3]);
            $arrayf[$key] = $file;
        }
    }
    closedir($handle);
}

ksort($arrayf);
reset($arrayf);


$tema     = 'Архив новостей'; // тема страницы
$meta     = '';               // 
$meta_css = '';               // 
require('../../inc/h.php');

?>

<table width="500" border="0" cellspacing="0" cellpadding="2" align="center">
 <tr>
  <td>
   <h3 align="center">Архив новостей</h3>
  </td>
 </tr>
 <tr>
  <td>
   В архив, ежедневно записывается по 1 новости, 11 самых популярных новостных лент,
   являющейся главной в своей ленте на 17 часов по московскому времени с 01 сентября 2007 года
   по 23 февраля 2022 года.<br><br>
   <div align="right">&laquo;<a href="/newsline/">Последние новости</a>&raquo;.</div>
  </td>
 </tr>
 <tr>
  <td align="center">
   <br><br>

<?php

(substr(php_uname(), 0, 7) == "Windows") ? setlocale (LC_TIME, 'RU') : setlocale (LC_TIME, 'ru_RU.utf8');

// тип
if (!$my_GET['type'] or $my_GET['type'] == 'html') {
    //echo "&nbsp;<a href=\"?type=xml".(($my_GET['year'])?"&amp;year={$my_GET['year']}":"")."\">xml</a>&nbsp; | <span style='background-color: #D9D9D9;'>&nbsp;html&nbsp;</span>";
} else {
    //echo "<span style='background-color: #D9D9D9;'>&nbsp;xml&nbsp;</span> | &nbsp;<a href=\"?type=html".(($my_GET['year'])?"&amp;year={$my_GET['year']}":"")."\">html</a>&nbsp;";
}

//echo "<br><br>";

// страницы
$date_arr_temp = array_keys($arrayf);
$date_beg = array_shift($date_arr_temp);
$year_beg = date("Y", $date_beg);
$year_end = date("Y", array_pop($date_arr_temp));
$year_int = $year_end - $year_beg;
while ($year_int >= 0) {
    if ($my_GET['year'] == ($year_end - $year_int)) {
        echo " <span style='background-color: #D9D9D9;'>&nbsp;".($year_end - $year_int)."&nbsp;</span> | ";
    } else {
        echo " &nbsp;<a href=\"".((isset($_GET['type']))?"?type={$my_GET['type']}&amp;":"?")."year=".($year_end - $year_int)."\">".($year_end - $year_int)."</a>&nbsp; | ";
    }
    $year_int--;
}

echo "<br><br>";

if ($my_GET['year'] == 'all') {
    echo "<span style='background-color: #D9D9D9;'>&nbsp;все года&nbsp;</span> | ";
} else {
    echo "&nbsp;<a href=\"".((isset($_GET['type']))?"?type={$my_GET['type']}&amp;":"?")."year=all\">все года</a>&nbsp; | ";
}
if (!$my_GET['year']) {
    echo "<span style='background-color: #D9D9D9;'>&nbsp;последние&nbsp;</span>";
} else {
    echo "&nbsp;<a href=\"".((isset($_GET['type']))?"?type={$my_GET['type']}":".")."\">последние</a>&nbsp;";
}

?>

   <br>
  </td>
 </tr>
</table>
<br>

<?php

echo '<table align="center" border="0" cellpadding="5">';
foreach ($arrayf as $time => $file) {
    if ((!$my_GET['year'] and (date("Y", $time) > (/*date("Y")*/ 2022 - 2))) or ($my_GET['year'] == date("Y", $time)) or ($my_GET['year'] == 'all')) {
        if ((date("d-m", $time) == '01-01') or ($time == $date_beg)) { // начало года
            echo '<tr><td valign="top"><b>'.date("Y", $time).'</b><br><br>';
        }
        if (date("d", $time) == '01') { // начало месяца
            echo '</td><td valign="top"><b>'.my_month_ru(date("F", $time)).'</b><br><br>';
        }
        $st = '';
        if (date("w", $time) == '0' or date("w", $time) == '6') { $st=' style="color: red;"'; } // выходные
        $date = date("d", $time).'&nbsp;'.preg_replace(array("/понедельник/", "/воскресенье/"), array("понедельн.", "воскресен."), my_week_ru(date("l", $time)));
        echo '<a href="/newsline/archive/'.substr($file, 0, -3)."".(($my_GET['type'] == 'xml')?"xml":"html")."\"$st>$date</a><br>\r\n";
    }
}
echo '</td></tr></table>';

?>

<br>
<div align="right">
<script language="JavaScript" type="text/javascript" src="/js/time2.js.php?time=<?php echo mktime(0,0,0,12,21,2012); ?>"></script>
<tt title="По Московскому времени - MSK (UTC+3).">До 21 декабря 2012 года осталось:&nbsp;<br><font id="myalt" color="red"></font>&nbsp;</tt>
<script language="javascript" type="text/javascript">
movePic();
</script>
</div>

<?php

require('../../inc/f.php');


// Месяцы
function my_month_ru ($month) {
    
    $months = array(
        'January'   => 'Январь',
        'February'  => 'Февраль',
        'March'     => 'Март',
        'April'     => 'Апрель',
        'May'       => 'Май',
        'June'      => 'Июнь',
        'July'      => 'Июль',
        'August'    => 'Август',
        'September' => 'Сентябрь',
        'October'   => 'Октябрь',
        'November'  => 'Ноябрь',
        'December'  => 'Декабрь'
    );
    
    return $months[$month];
    
}


// Недели
function my_week_ru ($week) {
    
    $weeks = array(
        'Monday'    => 'понедельник',
        'Tuesday'   => 'вторник',
        'Wednesday' => 'среда',
        'Thursday'  => 'четверг',
        'Friday'    => 'пятница',
        'Saturday'  => 'субота',
        'Sunday'    => 'воскресенье'
    );
    
    return $weeks[$week];
    
}

?>
