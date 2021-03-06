<?php 
/*
		Общие Модификаторы	
		/g — допускает «глобальное» соответствие. Применяется с функцией замены, что 
				 позволяет выполнить замену во всех соответствующих местах, 
				 а не только в месте первого соответствия. 
		/i — отключает в регулярном выражении чувствительность к регистру букв. 
				 Иными словами, вместо /[a-zA-Z]/ можно указать /[a-z]/i или /[A-Z]/i. 
		/m — допускает многострочный режим работы, в котором знак вставки (^) и знак доллара ($) 
				 соответствуют позициям перед любыми символами новой строки в сравниваемой строковой переменной и после них. 
				 Обычно при поиске соответствия в многострочной строковой переменной 
				 знак ^ соответствует только позиции в ее начале, а символ $ — в ее конце
		
		Метасимволы
		\		общий экранирующий символ, допускающий несколько вариантов применения
		^		декларирует(соответствие) начало данных (или строки в многострочном режиме)
		$		декларирует(соответствие) конец данных или до завершения строки (или окончание строки в многострочном режиме)
		.		соответствует любому символу, кроме перевода строки (по умолчанию)
		[]	начало/конец описания символьного класса
		|		Сответсвует этому | либо этому
		()	начало/конец подмаски
		?		означающим 0 или 1 вхождение, также преобразует жадные квантификаторы в ленивые (смотрите повторение))
		*		квантификатор, означающий 0 или более вхождений
		+		квантификатор, означающий 1 или более вхождений
		
		\b Соответствует границе слова
		\B Соответствует при отсутствии границы слова 
		\d Соответствует одной цифре 
		\D Соответствует одному символу, не являющемуся цифрой 
		\n Соответствует символу новой строки 
		\s Соответствует пробелу 
		\S Соответствует символу, нее являющемуся пробелом 
		\t Соответствует символу табуляции 

		\w Соответствует символу, используемому в словах (a–z, A–Z, 0–9 и _) 
		\W Соответствует символу, не используемому в словах (все, кроме a–z, A–Z, 0–9 и _) 
		\x Соответствует x (применяется, если x является метасимволом, но нужен символ x как таковой) 

		{n} Соответствует в точности n появлениям 
		{n,} Соответствует n и более появлениям 
		{min,max} Соответствует как минимум min и как максимум max появлениям	
				

		Примеры
		Глобальных 
		 /cats/g  Оба появления слова cats в предложении I like cats and cats like me. 
		 /dogs/gi будет соответствовать обоим появлениям слова dogs (Dogs и dogs) в предложении Dogs like other dogs

		rec[ei][ei]ve 	Либо receive, либо recieve (но также и receeve или reciive)
		rec[ei]{2}ve 		Либо receive, либо recieve (но также и receeve или reciive) 
		rec(ei|ie)ve 		Либо receive, либо recieve (но не receeve или reciive) 
		cat 						Слово cat в I like cats and dogs 
		cat|dog 				Любое из слов cat или dog в I like cats and dogs 
		\. Символ «.» (Знак «\» необходим, так как «.» является метасимволом) 
		
		5\.0* 					5., 5.0, 5.00, 5.000 и т. д
		\d{2,3} 				Любое двух- или трехзначное число (от 00 до 999) 
		7(,000)+ 				7,000; 7,000,000; 7,000,000,000; 7,000,000,000,000 и т. д 

		[a–f] 					Любой из символов a, b, c, d, e или f 
		cats$ 					Только последнее слово cats в My cats are friendly cats
		^my 						Только первое my в my cats are my pets 

		[\w]+ 					Любое слово из одного или нескольких символов 
		[\w]{5} 				Любое слово из пяти символов

	
*/
//-----------------------------------------------------------------------------------------------------
/*	JS 		(test, replace)
		document.write(/cats/i.test("Cats are fun. I like cats."))					// Появление cats хотя бы 1 раз
		document.write("Cats are fun. I like cats.".replace(/cats/gi,"dogs")) // cats->dogs(в нижний регистр)  
*/
//-----------------------------------------------------------------------------------------------------

/*	PHP 	( preg_match, preg_match_all и preg_replace ) 
		
		$n = preg_match("/cats/i", "Cats are fun. I like cats."); 
		$n = preg_match("/cats/i", "Cats are fun. I like cats.", $match); // Расширенная ф-ция, запминающая какой текст соответсвовал выражению ($match[0]) 

		$n = preg_match_all("/cats/i", "Cats are fun. I like cats.", $match); 
		 for ($j=0 ; $j < $n ; ++$j) 
		 	echo $match[0][$j]." "; 

		preg_replace("/cats/i", "dogs", "Cats are fun. I like cats.");


*/	

 ?>