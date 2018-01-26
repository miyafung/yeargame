<?php
return array(
    //'配置项'=>'配置值'
    'DB_TYPE'                   =>  'mysql',                //数据库类型
    'DB_HOST'                   =>  'localhost',            //服务器地址
    'DB_NAME'                   =>  'opticres_game',          //数据库名
    'DB_USER'                   =>  'opticres',                 //用户名
    'DB_PWD'                    =>  'Afeiliu123',             //密码
    'DB_PORT'                   =>  '3306',                 //端口
    'DB_PREFIX'                 =>  '',                     //数据库表前缀
    'DB_CHARSET'                =>  'utf8',                 //字符集
    /*
    'DB_TYPE'                   =>  'mysql',                //数据库类型
    'DB_HOST'                   =>  'localhost',            //服务器地址
    'DB_NAME'                   =>  'opticres_test',          //数据库名
    'DB_USER'                   =>  'opticres_test',                 //用户名
    'DB_PWD'                    =>  'test123',             //密码
    'DB_PORT'                   =>  '3306',                 //端口
    'DB_PREFIX'                 =>  'opticresen_',                     //数据库表前缀
    'DB_CHARSET'                =>  'utf8',                 //字符集
    */
    
    
    
    //模块
    'MODULE_ALLOW_LIST'         =>  array('Home','Admin'),
    'DEFAULT_MODULE'            =>  'Home',
    
    //布局
    //'LAYOUT_ON'                 =>  true,
    //'LAYOUT_NAME'               =>  'layout',
    
    //其他配置
    'URL_CASE_INSENSITIVE' => true,// 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'                 =>  2,                      //URL模式：Rewrite
    'TOKEN_ON'                  =>  true,                   //开启表单令牌
    'DEFAULT_FILTER'            =>  'htmlspecialchars,trim', //默认过滤函数
    //'SHOW_PAGE_TRACE'           =>  true,                   //显示调试信息
    'URL_ROUTER_ON'             =>  true,                   //开启路由
);