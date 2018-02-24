<?php

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

//$config['db']['host'] = 'localhost';
//$config['db']['user'] = 'root';
//$config['db']['pass'] = '123';
//$config['db']['dbname'] = 'slimrestful';

$config['db'] = [
    'meta' => [
        'entity_path' => [
            'app/src/Entity'
        ],
        'auto_generate_proxies' => true,
        'proxy_dir' =>  __DIR__.'/../cache/proxies',
        'cache' => null,
    ],
    'connection' => [
        'driver'   => 'pdo_mysql',
        'host'     => 'localhost',
        'dbname'   => 'your-db',
        'user'     => 'your-user-name',
        'password' => 'your-password',
    ]
];