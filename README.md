Доступ к базе данных с результатами:
--
DB_CONNECTION=mysql
DB_HOST=mysql-227244.srv.hoster.ru
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
Таблицы:
incomes
orders
sales
stocks

Для работы необходимо запустить обработчик очереди
php artisan queue:work

Так как сервер API спонтанным образом выдаёт ошибку HTTP 429 (Too Many Requests)
приходится считывать в заголовке ответа время ожидания до следующего запроса  и ждать (Retry-After + 1) секунд
Считывание из API производится пакетами по 500 записей и записью в БД одним запросом.




