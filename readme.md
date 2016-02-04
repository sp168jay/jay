## Laravel PHP Framework

下載到自己的電腦測試時：
1）請先準備好 .env 檔，先確認資料庫名稱跟我的不一樣，以免後續產生資料表是有衝突。
   若資料庫名稱相同，請到 phpMyAdmin 新增一個資料庫，把名稱寫到 .env 中。
2）執行 artisan key:generate 產生專案用的 key。然後寫到 .env 中。
3）安裝必需的套件: 到專案目錄下執行 composer install
4）產生資料表：到專案目錄下執行 artisan migrate 
5）產生測試用資料：到專案目錄下執行 artisan db:seed


錯誤訊息：
[Symfony\Component\Debug\Exception\FatalThrowableError]
Fatal error: Class 'CreatePasswordResetsTable' not found

若有以上錯誤，可以執行 composer dump-autoload 來解決。
參考：https://phphub.org/topics/1002



執行 composer dump-autoload 的錯誤訊息：
Warning: Ambiguous class resolution, "CreateUsersTable" was found in both "/home/vagrant/Code/LaravelTest/database/migrations/2016_01_30_011040_create_users_table.php" and "/home/vagrant/Code/LaravelTest/database/migrations/2016_02_04_033508_create_users_table.php", the first will be used.

表示有重覆命名的類別，請修改之前的 users 的類別名稱，詳見本 commit 中的修改。
改完再執行一次～




[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
