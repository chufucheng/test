<?php
/**
 * Created by PhpStorm.
 * User: tal
 * Date: 2019-09-02
 * Time: 19:19
 */
//echo '<a href="index.php">返回</a><br/>';
    //实例化redis

    $redis = new Redis();
echo 'qqqq';
    //redis配置
    $host = '127.0.0.1';
    $port = 6379;

    //连接redis

    $redis->connect($host,  $port);

    //设置值
    $redis->set('name', 'haimeimei');

    //获取值

    $list = $redis->get('name');

    var_dump($list);
