<?php
return [
    // 应用调试模式
    'app_debug'              => false,
    //修改默认常量配置
    'view_replace_str'  => [
        '__IMG__' => '/static/img'
    ],
    //数据库配置
    'database'               => [
        // 数据库类型
        'type'            => 'mysql',
        // 数据库连接DSN配置
        'dsn'             => '',
        // 服务器地址
        'hostname'        => '127.0.0.1',
        // 数据库名
        'database'        => 'ygysvip',
        // 数据库用户名
        'username'        => 'root',
        // 数据库密码
        'password'        => '',
        // 数据库连接端口
        'hostport'        => ''
   ],

];