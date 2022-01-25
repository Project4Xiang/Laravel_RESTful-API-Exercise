# Laravel - RESTful API Exercise
練習建置RESTful API (以股市資訊(如:股價)做為資料集)。
# About Laravel<a name = "about"></a>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# About Project
### 資料表結構
#### 1. stock_list <br>

|  Name	 |  Type  |  Indexes |  Default |  Extra | Comment |
| :----: | :----: | :----: | :----: | :----: | :----: |
|   id   |   int  |  PRIMARY  |        -        |  AUTO_INCREMENT  |  -  |
|   no   |   int  |   unique  |        -        |     -     |     股票編號     |
|  name  | varchar|     -     |        -        |     -     |     股票名稱     |
|  date  |   date |     -     |current_timestamp|     -     |     更新日期     |

#### 2. stock_info <br>

|  Name	       |  Type  |  Indexes |  Default |  Extra |  Comment |
| :----:       | :----: | :----: | :----: | :----: | :----: |
|   id         | int |  PRIMARY  |        -        |  AUTO_INCREMENT  |  -  |
| stock_id     | int |   -  |        -        |     -     |POST資料中股票編號(no)對應stock_list表中id|
|  shares      | int |     -     |        -        |     -     |     成交股數    |
|  amount      | int |     -     |        -        |     -     |     成交金額    |
|opening_price | double |     -     |        -        |     -     |     開盤價   |
|closing_price | double |     -     |        -        |     -     |     收盤價   |
|highest       | double |     -     |        -        |     -     |     最高價   |
|lowest        | double |     -     |        -        |     -     |     最低價   |
|diff          | double |     -     |        -        |     -     |   漲跌價差   |
|volume        | double |     -     |        -        |     -     |   成交筆數   |
|date          | date |     -     |current_timestamp|     -     |      日期      |

# Getting Started <a name = "getting_started"></a>

(在Windows環境下可使用[XAMPP](#https://www.apachefriends.org/zh_tw/download.html)直接架設執行環境，預設RDBMS為MySQL)
## Prerequisites

```
php>=8.0.0
laravel>=8.7.5
composer
...
```
## Run Project
於專案根目錄(與artisan同層)執行以下指令：

```
php artisan serve

option:
--port XXXX (預設:8000)
```
<br>

# 測試RESTful API
```
GET
127.0.0.1:8000/api/stocklist ---> 取得stock_list表中所有資料
127.0.0.1:8000/api/stocklist/{no} ---> 取得stock_list表中no符合{no}的所有資料
127.0.0.1:8000/api/stocklist/{no}/{date} ---> 取得stock_list表中no符合{no}且date符合{date}的所有資料
-------------------------------------------------------------------------------------
127.0.0.1:8000/api/stockinfo ---> 取得stock_info表中所有資料
127.0.0.1:8000/api/stockinfo/{no} ---> 取得stock_info表中no符合{no}的所有資料
127.0.0.1:8000/api/stockinfo/{no}/{date} ---> 取得stock_info表中no符合{no}且date符合{date}的所有資料
```
```
POST(以Postman為例:Body->form-data->輸入資料範例如下)
127.0.0.1:8000/api/stocklist ---> 新增資料至sotck_list

Example:
{
    "no": "2330",
    "name": "台積電"
}
return:
{
    "no": "2330",
    "name": "台積電",
    "id": 1
}
-------------------------------------------------------------------------------------
127.0.0.1:8000/api/stockinfo ---> 新增資料至sotck_info

Example:
{
    "no": "2330",
    "shares": "123456",
    "amount": "123456",
    "opening_price": "12",
    "closing_price": "123",
    "highest": "123",
    "lowest": "12",
    "diff": "111",
    "volume": "12345678",
    "date": "2022-01-11"
}
return:
{
    "shares": "123456",
    "amount": "123456",
    "opening_price": "12",
    "closing_price": "123",
    "highest": "123",
    "lowest": "12",
    "diff": "111",
    "volume": "12345678",
    "date": "2022-01-11",
    "stock_id": 1,
    "id": 1
}
```

```
PATCH(以Postman為例:Body->form-data->輸入資料範例如下)
127.0.0.1:8000/api/stocklist/{id} ---> 修改sotck_list表中id符合{id}的資料

Example:
{
    "name": "台積電_test"
}
return:
Update Success

{
    "no": "2330",
    "name": "台積電_test",
    "id": 1
}
-------------------------------------------------------------------------------------
127.0.0.1:8000/api/stockinfo/{id} ---> 修改sotck_info表中id符合{id}的資料

Example:
{
    "shares": "1234567"
}

return:
{
    "shares": "1234567",
    "amount": "123456",
    "opening_price": "12",
    "closing_price": "123",
    "highest": "123",
    "lowest": "12",
    "diff": "111",
    "volume": "12345678",
    "date": "2022-01-11",
    "stock_id": 1,
    "id": 1
}
```

```
DELETE
127.0.0.1:8000/api/stocklist/{id} ---> 刪除sotck_list表中id符合{id}的資料

return:
Delete Success
-------------------------------------------------------------------------------------
127.0.0.1:8000/api/stockinfo/{id} ---> 刪除sotck_info表中id符合{id}的資料

return:
Delete Success
```

# 常用指令 <a name = "usage"></a>
使用 composer 安裝 laravel
```
composer global require "laravel/installer"
```

當新建 controller 後使用 dump-autoload，重新產生 autoload 檔
```
php artisan dump-autoload
```

查詢 Route 列表
```
php artisan route:list
```
創建新的Controller
```
php artisan make:controller [Controller Name]

option:
--resource : 建立基礎CRUD的Function
--invokable : 建立只有單個方法的控制器
```

創建新的middleware
```
php artisan make:middleware [Middleware Name]
```

創建新的Model
```
php artisan make:model [Model Name]
```

創建新的Model以及migration
```	
php artisan make:model [Model Name] --migration
```

修改資料庫結構(database/migrations/xxx.php)後，執行 migrate:make 產生資料庫遷移檔
```
php artisan migrate:make
```

執行資料庫遷移檔
```
php artisan migrate
```

退回上一次的資料庫遷移動作
```
php artisan migrate:rollback
```