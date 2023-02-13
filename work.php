<?php

use DB\MyQueryBuilder;

require_once 'autoload.php';

$config = [

        'DB_DRIVER'       => 'pgsql',

        'DB_HOST'       => '127.0.0.1',

        'DB_PORT'       => 'port',

        'DB_NAME'   => 'table',

        'DB_USER'   => 'postgres',

        'DB_PASSWORD'   => 'password',
];

$db = new MyQueryBuilder($config);

/*
$db
    ->select()
    ->from('table')
    ->orderBy('id', 'DESC');
*/

/*
$db
    ->update('table',
        ['DB_field_1' => 'value_1',
            'DB_field_2' => 'value_2',
        ])
    ->where('table.DB_field_1', '=', value_1);
*/

$result = $db->execute();

dd($result);



