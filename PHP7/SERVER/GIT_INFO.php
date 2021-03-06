<?php

			/*
					
					Git - Система контроля версий.

					Предназначениа для сохранения истории изменений и для командной работы над проектами.
					История представляет собой снимки проекта, идуще друг за другом в хронологическом порядке.

					Так, можно откатиться на любую стадию системы или узнать кто изменил какойто файл.

					Система позволяет дтектировать правку разными разработчиками одного участка кода и предлагает
					разрешить эту проблему.

					Системы контроля версий, альтернативные Git:
						CVS
						Subversion
						SVN

			*/

			/* 	Основы Git
					
					В истории не хранится полная копия состояний, а только измененившиеся файлы, а на неизменив-
					шиеся приводится ссылка.

					Система является расределенной, что означает, что каждый участнк имеет локальную копию всех 
					файлов, веток и истории правок. Так, Выход из строя центрального репозитория не приводит к
					безвозвратной потере данных. Поэтому наличи центрального репозитория не обязательно, развертывание
					приложения может осуществляться с любого узла, на котором имеется копия проекта.

					Если у нас имеется проект, который нужно изменть, но который при этом должен продолжать работать,
					то команда разработчиков может слеать ветку, тогда основной проект будет функционирвать
					словно главная дорога, а ветка будет словно лополнительная - второстепенная дорога - обьезд, где
					все сделают, а потом, после тестов, добавят наработки в проект.

			*/

			/*
					 Установка:

					 1) Ubuntu:
					 			Проверить: 	$ git --version 
					 			Установить: $ sudo apt-get install git

					 2) Mac:
					 			Проверить          :	$ xcode-select -p
					 			Если предупреждение: 	$ xcode-select --install
					 			Проверить git      :  $ git --version
					 			Обновить  git      :	$ brew install git
					
					 3) UNIX:
					 			Скачиваем:  https://git-for-windows.github.io/

			*/


			/*
					Настройка:

					Установить Пользователя:
					git config --global user.name "Name Surname"

					Установить почту:
					git config --global user.mail mail@mail.com

					Проверить параметры:
					git config --list

			*/

			/* Создание репозтория 

					Можно клонировать репозиторий, лиюо создать новый и импортировать туда файлы.

				1) Клонировать:
						$ git clone https://github.com/phpmyadmin/phpmyadmin.git

						Если неободимо переименоать папку, следует исп в конце суффикс:
						$ git clone https://github.com/phpmyadmin/phpmyadmin.git  mysql.dуv



				
				2) Создать
					Инициализация (В каталоге появится папка git):
					$ git init

					Добавить файлы (привести их индекированное состояние) (Точка в конце - любой файл)
					$ git add index.php 
					$ git add dir

					После сообщеия о том, какие файлы мы дожны отслеживать, их можно зафиксировать,
					создав новый снимок:
					$ git commit -am 'Первоначальная инициализация Репозитория' 

			*/


			/*	Публикация изменений:


					Состояние git-файлов:
						1) Зафиксированные - файлы сохранены (в git каталоге, где хранится истори правок)
						2) Модифицированные - в файлы рабочего катлога были внесены правки, но изменения не зафиксирваны
						3) Индексрованные - подготовленные для фиксации файлы, которые войдут в следующий коммит

						Схема:
						Имеем домашний - рабочий каталог, для отправки в Базу Проекта сначала индексируем файл, потом
						индексирумый файл отправляем на Базу проекта.
						Для получения файлов с Базы проекта просто считываем его.


						(ПЕРЕХОДИМ В ПАПКУ: cd phpmyadmin)
						
						Внесем изменения: 
						echo "Additional line" >> README

						Проверим изменения:
						git status (Вернет: modified README - подсветка: красная (если неиндексирован), зеленая (если индексирован))

						Узнаем более детальный подробности:
						$ git diff 

						Подготовим изменение (перевеем файл в индексированное состояние):
						$ git add README

						Просмотр изменения в индексированном файле (суффикс cache):
						$ git diff --cached


						Все, что проиндексировано, можно зафиксировать - перенести в локальную БД в .git каталог:
						-m - комментарий, если не указать, откроется редактор
						$ git commit -m "Изменение в README-файле" // Проверить фиксацию: git status

						Команда add часто следует перед commit, поэтому есть их обьединенный вариант:
						$ git commit -am "Изменение в README-файле"
						===
						$ git add .
						$ git commit -m "Изменение в README-файле"
						


						История изменений (-т - кол-во изменений, которые должны быть выведены):
						git log -n 3
						git log -n 3 -p //(Для детальной информации)
			
			*/

			/*  Игнорирование файлов

					Все, что помещается в репозиторий, хранится в истории проекта, если при помощи
					команды git commit  оказался зафиксирвоан файл размером 500 МБ, то его удаление
					не приведет к его удлаению из истории, поэтому приклонировании репозитория, пользо-
					ватли будут вынуждены качать этот файл.

					Для игнорирования таких файлов служит конфиурационный файл .gitignore, который по-
					мещаестся в корень проекта. Внутри происываются шаблоны. Файлы, удовлетворяющие им
					игнорируются git:
						log/*						// Игнорировать все, что фв папке log
						~*							// которые начинаются с тильды (~),
						doc/** /*.txt 	// а так же все txt-файлы во всех подкаталогах каталога doc

			*/

			/*  Откат по истории проекта

					Отчет команды git log снабжает каждый комеентарий конрольной суммой SHA-1,
					которая идентифицирует commit. Контрольна сумма длинна, поэтому в командах 
					можно указывать лишь первые две цифры контрольной суммы, git самостоятельно
					восстановить недостающие символы.

					Git для удобства исп указатели на commitы, один из самых частоиспользуемых: 
					HEAD,который указыает на текущий коммит. Перемещая его, можно передвигаться 
					по истории проекта.
					Чтобы перемещать указатель служит команда: git reset.

					(Смотри фото ИЗМЕНЕНИЕ ФАЙЛА).
					
					// Создать файл (в WINDOWS не работает)
						$ git touch file.txt
					// Проиндексировать его
						$ git add .
					// Сделать коммит
						$ git commit -am "adding file.txt"

					// Удалить все изменения еще непроиндексированного файла:
						$ git clean -f

					// Откатить индексированный файл на стадию до индексации 
					 $ git reset HEAD file.txt
					 или
					 $ git reset 592f611180dl049529e3061dc318077c45992feb file.txt
					 или
					 $ git reset 592f6111 file.txt


					// Удалить текущеие изменения для Индексируемого файла.
					 $ git checkout -f

					 // Режимы работы git - reset (по умолчаию mixed):
					 	--mixed - откат до коммита без удаленияистории изменений, история помещается в НЕПОДГОТОВЛЕННОЕ состояние
					 	--soft  - откат до коммита без удаленияистории изменений, история помещается в ПОДГОТОВЕННОЕ состояние
					 	--hard  - откат до коммита с удалением истории изменений

			*/

			/*  Метки:

					История комитов может сотоять из тысяч коммитов.
					Для облегчения поиска предусмотрена подсистема меток(тегов).

					Просмотр меток:
					$ git tag

					Фильтрация по шаблону (-l ?):
					$ git tag -l 'RELEASE_3_0_*'

					Создать свою метку (-a):
					$ git tag -a v1.3.10 -m 'Система стабильна'
					
					Узнать всю информацию о коммите.
					$ git show vl.3.10 

			*/

			/*  Ветки:
					
					Git отличается от систем резервного копирования тем, что позволяет создавать ветки,
					которые служат основой комнадной работы.
					После завершения работы с отдельными ветками, можно результаты обьединить в основную ветку:
					$ git merge

					Сразу после создания прокта появляется основная ветка master.

					Посмотреть ветки можено так:
					$ git branch 

					Создать ветку можно, указав после branch название:
					$ git branch new_test_branch
					
					Переименовать ветку
					$ git branch -m old_name new_name

					Удалить ветку:
					$ git branch -D blog

					Для переключения на новую ветку слеует исп checkout
					$ git checkout new_test_branch

					Создать ветку и переключиться на нее :
					$ git checkout -b blog

					Пример:
						Создадим ветку blog и закоммитим файл blog.txt, затем в ветке master закоммитим 
						файл master.txt, затем ветка blog обьединяется с master:

							git branch
							git touch blog.txt
							git add .
							git commit -am "Новый файл blog.txt"

							git checkout master
							git touch master.txt
							git add .
							git commit -am "Новый файл master.txt"
							
							git merge blog 


					Посмотреть изменение веток при их слиянии в одну можно с использованием:
					git log --graph
					
			*/

			/*
					
					Разрешение конфликтов.

					Допустим в ветке master и blog работают над файлом blog.php.
					Содержание master:
					<?php 
						echo 'Hello World';

					Содерание blog^
					<?php
						session_start();
						echo 'Hello World';

					При попытки слияния git выдаст ошибку:
						Auto-merging blog.php
						CONFLICT (add/add): Merge conflict in blog.php
						Automatic merge failed; fix conflicts and then commit the result.
					При этом он исправит файл и вставит туда пробелмное место из 2х веток, чтобы мы могли выбрать сами:
					<?php 
						<<<<<<< HEAD                 // Начало конфликта
							echo "Hello, world!"; 		// Первый Вариант (master branch)
						=======													// Разделитель
							session_start (); 				// Второй Вариант (master branch)
							echo "Hello, world!"
						>>>>>>> blog 								// Конец конфликта

			*/
			

			/*
					Удаленная работа с Git

					Современная разработка предполагает, что каждый работет на своем компе, 
					а общий репозиторий располагается гле-то в общес сетевом хранилише.

					Примером такого хранилища может служить GitHub

					Закрыь проект от посторонних - платная услуга, а так он бесплтный до 1Гб, вроде.

					Для работы требуется ввести свой SSH открытый ключ в раздел SSH Key: https://gitbub.com/settings/profile

					Можно создать проект либо с 0, либо с исп готового репозитория (Это предложит GitHub):
					…or create a new repository on the command line
					…or push an existing repository from the command line
					…or import code from another repository
					
					Певрый метод (надо подключать ключ, иначе не сработает): 
						echo "# test" >> README.md
						git init
						git add README.md
						git commit -m "first commit"
						git remote add origin git@github.com:USER/test.git
						git push -u origin master
                

          Получить изменения:
						
						После того как проект разврнут на репозитории, его изменения можно получить:

						git clone git@github.com:USER/test.git anothertest

						После выполения команды проект будет существовать в 2х папках:
						test и anothertest
						
						Скачать изменеия:
						git pull origin master 

						Внести изменения (В репозиторий->ветку) Не получится, если сначала не сказали изменения:
						git push git@github.com:USER/test.git master
						git push // Если 1 рпозиторий и манипулирем над master
			*/
			
			/*
					Развертывание сетевого Git:

					Для развертывания git на удаленном сервере host.ru? следует выполить его установку,
					установить SSH-СЕРВЕР sshd и завести пользователя git. В домашнем катологе следует 
					пописать все публиные ключи пользователей, которые должны получить доступ к Git 
					репозиториям.

					После этого можо развернуть пустой репозиторий, создав папку:
					text.git с владельцем git:
						$ cd ~
						$ mkdir text.git
						$ chown git:git text.git 
					Переходим впапку text.git  и разворачиваем пустой репозиторий:
						$ cd text.git
						$ git --bare init 

					Теперь на рабочей станции следует инициализировать проект

			*/

?>