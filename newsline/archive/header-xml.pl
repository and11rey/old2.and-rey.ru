#!/usr/bin/perl -w

#************************************************************************
# Назначение: Добавление ссылки на XSL и кодирование UTF8. (08.10.2008)
# Автор: Афоничев Андрей (email: info@and-rey.ru)
# Авторские права: использовать, а также распространять данный скрипт
#                  разрешается только с разрешением автора скрипта
#************************************************************************
#!/usr/local/bin/perl -wT
#!C:\Andrey\Perl\bin\perl.exe


use strict;
use CGI ':standard';
use CGI::Carp qw(fatalsToBrowser); # не для web
use Encode;

my $utf8 = 1;
my $text = '<?xml version="1.0" encoding="utf-8" ?>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
 xxxxxxxxxxxxxxx       Архив новостей and-rey.ru       xxxxxxxxxxxxxxxxxx
 xxxxxxxxxxxxxxx  http://and-rey.ru/newsline/archive/  xxxxxxxxxxxxxxxxxx
 xxxxxxxxxxxxxxx        с 01 сентября 2007 года        xxxxxxxxxxxxxxxxxx
 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
-->
<?xml-stylesheet type="text/xsl" href="news.xsl" ?>
';

my $file = $ENV{'PATH_TRANSLATED'};

# Читаем файл
open FILE, "<$file";
  my @mfile = <FILE>;
close FILE;

if ($mfile[0] =~ /1251/i) { $utf8 = 0; }

$ENV{'SERVER_NAME'} =~ /^(.*)and-rey\..+$/i;
my $str1 = 'http://www.and-rey.ru/inc/go3.php/';
my $str2 = 'https://'.$1.'and-rey.ru/go2/';
my $re = qr/\Q$str1\E/i;


print "Content-type: text/xml; charset=utf-8\n\n";

# Проходим его в цикле
my $i = 1;
foreach (@mfile) {
    if ($i == 1) {
        print $text;
    } elsif (/<rss(.+?)>/i) {
        print "<xmlrss$1>\n";
    } elsif (/<\/rss>/i) {
        print '</xmlrss>';
    } elsif (/$re/i) {
        s/$re/$str2/i;
        print $_;
    } else {
        unless ($utf8) {
            $_ = encode("utf8", decode("cp1251", $_));
        }
        print $_;
    }
    $i++;
}
