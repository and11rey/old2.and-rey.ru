<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>And-rey<?php echo (($tema)?": $tema":""); ?></title>
<meta name="keywords" content="Интернет сервис безопасность разработка програмирование приложения web <?php echo $tema; ?>">
<meta name="description" content="Интернет сервисы <?php echo $tema; ?>.">
<?php echo $meta; ?>

<meta name="Author" content="And-rey || info@and-rey.ru">
<link href="/css/a.css" rel="stylesheet" type="text/css">
<link href="/css/img.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" sizes="16x16">
<meta http-equiv="Content-Style-Type" content="text/css">
<?php echo $meta_css; ?>

</head>

<body bgcolor="#FFFFFF">

<!-- And-rey -->

<table width="100%" border="1" cellspacing="5" cellpadding="10" class="a01v">
 <tr>
  <td valign="top">
   <b><a href="/">And-rey.ru</a><?php echo (($tema)?": &laquo;$tema&raquo;":""); ?></b>.
<?php
preg_match("/^(.*and-rey\.).+$/i", $_SERVER['SERVER_NAME'], $my_syb_domian);
if (stripos($_SERVER['SERVER_NAME'], 'and-rey.ru') === false) {
    echo ' &nbsp; &nbsp; &nbsp; <font color=blye>Это зеркало сайта: <a href="//'.$my_syb_domian['1'].'ru'.$_SERVER['REQUEST_URI'].'">'.$my_syb_domian['1'].'ru</a></font>';
}
?>
  </td>
 </tr>
</table>
<br>
