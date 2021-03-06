<?php 

// Определение текущего времени:
	echo 'Now'.time().'<br>';
// Т.к отсчет от 1янв 1970 идет в секундах,
// то дата на неделю вперед, можно уст арифметически
	echo 'This Moment Next week'.(time() + (7 * 24 * 60 * 60)).'<br>';

// Вывод нужной даты: (h,m,s,mounth,day,Year) Year(1970-2038);

	echo mktime(0, 0, 0, 1, 1, 2000);

/* Константы Даты

	date(DATE_RSS);
	Полный перечень приведен по адресу 
	http://php.net/manual/en/class.datetime.php.

	DATE_ATOM — формат для потоков Atom. PHP-формат имеет вид «Y-m-d\TH:i:sP»,
							выводимая информация — «2018-08-16T12:00:00+0000».
  DATE_COOKIE — формат для cookie, устанавливаемый веб-сервером или JavaScript. PHP-формат имеет вид «l, d-M-y H:i:s T», 
 									выводимая информация — «Thu, 16-Aug-2018 12:00:00 UTC».  
  DATE_RSS — формат для потоков RSS. PHP-формат имеет вид «D, d M Y H:i:s T», 
	 					 выводимая информация — «Thu, 16 Aug 2018 12:00:00 UTC».  
  DATE_W3C — формат для Консорциума Всемирной паутины, World Wide Web Consortium. PHP-формат имеет вид «Y-m-d\TH:i:sP»,  
  					 выводимая информация  «2018-08-16T12:00:00+0000». 

*/

// Проверка допустимости даты :
  // checdate(m,d,y)

  $month = 9;      // Сентябрь (в котором только 30 дней)  
  $day   = 31;     // 31-е  
  $year  = 2018;   // 2018
  if (checkdate($month, $day, $year)) echo "Допустимая дата";  else echo "Недопустимая дата";

 ?>