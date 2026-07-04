<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
      li {
          background-color: #f3bec7;
          padding: 5px;
          margin: 5px;
      }
    </style>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-start min-h-screen flex-col">
<b>Консольные команды:</b>
<ul>
   <li><code>php artisan app:fetch-api sales</code></li>
   <li><code>php artisan app:fetch-api orders</code></li>
   <li><code>php artisan app:fetch-api incomes</code></li>
   <li><code>php artisan app:fetch-api stocks</code></li>
   <li><code>php artisan app:fetch-api all</code></li>

</ul>
</body>
</html>
