// JavaScript for and-rey.ru RSS archive http://www.and-rey.ru/newsline/

// формирование ссылки (дней вперед или дней назад)
function myURL (newDay) {
    var myDate = new Date(pubDate);
    var day = myDate.getDate();
    day = day + newDay;
    myDate.setDate(day);
    var pattern = /^\d$/;
    var days = myDate.getDate();
    if (pattern.test(days)) {
        days = '0' + days;
    }
    var month = myDate.getMonth() + 1;
    if (pattern.test(month)) {
        month = '0' + month;
    }
    return 'news_and-rey-'+days+'-'+month+'-'+myDate.getFullYear()+'.xml';
}

// вставка ссылок в документ
window.onload = function() {
    // предыдущий день
    var newLink1 = document.createElement('a');
    newLink1.setAttribute('href', myURL(-1));
    var linkText1 = document.createTextNode('предыдушая');
    newLink1.appendChild(linkText1);
    document.getElementsByTagName('td')[0].appendChild(newLink1);
    // следующий день
    var myDate = new Date(pubDate);
    var myDate2 = new Date(myDate.getFullYear(), myDate.getMonth(), myDate.getDate());
    var nowDate = new Date();
    var nowDate2 = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate());
    if ((myDate2 - 1) != (nowDate2 - 1)) { // если просматривается не текущий день
        var newLink2 = document.createElement('a');
        newLink2.setAttribute('href', myURL(1));
        var linkText2 = document.createTextNode('следующая');
        newLink2.appendChild(linkText2);
        document.getElementsByTagName('td')[2].appendChild(newLink2);
    } else {                               // если просматривается текущий день
        //document.write('следующая');
    }
}
