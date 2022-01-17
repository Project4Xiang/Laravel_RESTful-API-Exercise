# Laravel - RESTful API Exercise

## Table of Contents

- [About](#about)
- [Getting Started](#getting_started)
- [Usage](#usage)

## About <a name = "about"></a>

### Summary
練習建置RESTful API (以股市資訊(如:股價)做為資料集)。

### Table Structure
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

## Getting Started <a name = "getting_started"></a>

執行專案前，先確定已成功架設好Web Server及RDBMS (本專案預設為MySQL)。<br>
(在Windows環境下可使用[XAMPP](#https://www.apachefriends.org/zh_tw/download.html)直接架設執行環境)
### Prerequisites

```
php>=8.0.0
laravel>=8.7.5
...
```
### Run Project
於專案根目錄(與artisan同層)執行以下指令：

#### 1. 開始執行專案
```
php artisan serve --port XXXX (預設:8000)
```

#### 2. 使用Postman之類的工具測試RESTful API
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

## Usage <a name = "usage"></a>

於專案根目錄(與artisan同層)執行以下指令：

當新建 controller 後使用 dump-autoload，重新產生 autoload 檔

```
php artisan dump-autoload
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