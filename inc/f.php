<p class="lmar">
<?php
if (stripos($_SERVER['SERVER_NAME'], 'and-rey.ru') !== false) {
    echo '<a href="//'.$my_syb_domian['1'].'us'.$_SERVER["REQUEST_URI"].'" title="Зеркало (Mirror): '.$my_syb_domian['1'].'us"><span class="image-and-rey-us"></span></a> &nbsp; ';
} else {
    echo '<a href="//'.$my_syb_domian['1'].'ru'.$_SERVER["REQUEST_URI"].'" title="Основной адрес: '.$my_syb_domian['1'].'ru"><span class="image-and-rey-ru"></span></a> &nbsp; ';
}
if (isset($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] === 'on') {
    echo '<a href="http://and-rey.ru'.$_SERVER["REQUEST_URI"].'" title="http"><span class="image-http"></span></a>';
} else {
    echo '<a href="https://and-rey.ru'.$_SERVER["REQUEST_URI"].'" title="https"><span class="image-https"></span></a>';
}
?>
  &nbsp; <a href="/blog/index.php?action=forum&amp;view=post&amp;id=32" title="Comments"><span class="image-comments"></span></a>
  <font color="white">Опр ИД стр: <?php echo md5($_SERVER["REQUEST_URI"]); ?></font>
</p>
<table width="100%" border="1" cellspacing="5" cellpadding="10" class="a01v">
 <tr>
  <td align="center" nowrap>
   2006-2012, CC-BY: <a href="http://www.and-rey.ru/">Andrey A.</a><br>
   <a href="mailto:info@and-rey.ru?subject=Web-tools" ONCLICK="window.open('/about/mails/','','Toolbar=0,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,Width=400,Height=600'); return false;">info@and-rey.ru</a>
   <img src="/img/0.gif" width="1" height="5" alt="0">
  </td>
 </tr>
</table>

</body>
</html>
