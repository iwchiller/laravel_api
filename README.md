## Проект Laravel для получения и нагнетания в БД данных из JSON API 
### Стек
- PHP 8.3+
- MySQL 5.7+
- Laravel 12+
### Настройки проекта в файле `.env`
**Доступ к БД :**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_api
DB_USERNAME=имя_пользователя
DB_PASSWORD=пароль_пользователя
```
**Параметры доступа к API:**
```env
HTTP_API_URL=http://109.73.206.144:6969/api/
HTTP_API_KEY=E6kUTYrYwZq2tN4QEtyzsbEBk3ie
HTTP_API_PAGE_LIMIT=500
HTTP_API_IS_OVERWRITE_DATA=0
```
`HTTP_API_IS_OVERWRITE_DATA=`
- `1` - приложение запрашивает все данные по сегодняшний день
- `0` - только с последней обработанной даты, обнаруженной в соответствующей таблице БД
### Консольные команды

Для работы необходимо запустить обработчик очереди Laravel
```bash
    php artisan queue:work
```
1. Получаем все данные из всех разделов
```bash
    php artisan app:fetch-api all
    php artisan app:fetch-api 
```
2. Получаем данные из раздела `Sales`
```bash
   php artisan app:fetch-api sales
```
3. Получаем данные из раздела `Orders`
```bash
   php artisan app:fetch-api orders
```
4. Получаем данные из раздела `Incomes`
```bash
   php artisan app:fetch-api incomes
```
5. Получаем данные из раздела `Stocks`
```bash
   php artisan app:fetch-api stocks
```   
   
### Доступ к хостингу с результатами
- https://free5.beget.com/phpMyAdmin
- Логин: `c9166442_laravel`
- Пароль: `1cYX5RhBSaQp`
