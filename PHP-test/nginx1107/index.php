<?php
/**
 * Created by PhpStorm.
 * User: cfc41
 * Date: 2020/8/10
 * Time: 10:17
 */
    include 'Server.php';

    //http 协议服务
    $server = new Server('0.0.0.0', 9090);


    //正式开始提供服务, 启动服务
    $server->listen(function ($buf) {

        var_dump($buf);
        return 'Hello Word!'; //响应处理, 响应偷 404 202
    });