# Final task for MEDIASOFT

- [Описание проекта](#project)
- [Начало](#begin)
- [SELECT](#select)
- [INSERT](#insert)
- [UPDATE](#update)
- [DELETE](#delete)
- [ORDERBY](#orderby)
- [WHERE](#where)
- [LIMIT](#limit)






## Описание проекта
<a name="project"></a> 

Проект разрабатывался на версии PHP 8.2.1.

Была разработана обёртка для работы с разными СУБД в едином формате.

Был создан массив, в котором задавалась конфигурация соединения: тип бд, логин, пароль, хост, имя базы.

При создании экземпляра класса создается подключение, при вызове цепочки методов внутри объекта ведется генерация запроса, при вызове execute запрос отправляется на сервер и непосредственно выполняется.

Реализованы базовые методы CRUD.

## Начало
<a name="begin"></a> 

Для начала работы с БД используется querry builder:

```php
use DB\MyQueryBuilder;

require_once 'autoload.php';
```

Также передать данные в переменную $config:

```php
[

    'DB_DRIVER'       => 'pgsql', 

    'DB_HOST'       => '127.0.0.1', 

    'DB_PORT'       => port db, 

    'DB_NAME'   =>  name db, 
    
    'DB_USER'   => username db, 

    'DB_PASSWORD'   => user password db,
];
```

Для построения запросов, необходим следующий код для создания объекта:

```php
$db = new MyQueryBuilder($config);
```

Конструкция для выполнения запроса и получения результата:

```php
$result = $db->execute();

dd($result);
```

## SELECT
<a name="select"></a> 

Вывод для всех полей с таблицы: 

```php
$db->select()->from('table');
```

Конкретные поля с таблицы:

```php
$db->select(['DB_field_1', 'DB_field_2'])
```

## INSERT
<a name="insert"></a>

При помощи метода insertInto добавляются в таблицу данные

```php
    $db
    ->insertInto('table', [
        'DB_field_1' => 'value_1',
        'DB_field_2' => 'value_2',
        ]);
```

## UPDATE
<a name="update"></a>

```php
    $db
    ->update('table',
        ['DB_field_1' => 'value_1',
         'DB_field_2' => 'value_2',
        ])
    ->where('table.DB_field_1', '=', value_1);
```

## DELETE
<a name="delete"></a>

```php
    $db
    ->delete()
    ->from('table')
    ->where('DB_field_1', '=', value_1);
```

## ORDERBY
<a name="orderby"></a>

```php
$db
    ->select()
    ->from('table')
    ->orderBy('DB_field_1', 'DESC'); // ASC or DESC
```

## WHERE

```php
    $db->select()->from('table')->where('DB_field_1', '=', value_1);
```

Следующая новая условная созданная конструкции с помощью метода WHERE будет автоматически добавлен оператор AND. Для оператора OR необходимо отдельно создавать с методом orWhere

```php
    $db
    ->select()
    ->from('table')
    ->where('DB_field_1', '=', value_1)
    ->where('DB_field_2', '=', value_2);
```

## LIMIT
<a name="limit"></a>

Ограничение строк в таблице:

```php
$db
    ->select()
    ->from('table')
    ->limit(4);
```

Конкретное количество записей, которая начинается с конкретного номера

```php
$db
    ->select()
    ->from('table')
    ->limit(4, 2); 
```


