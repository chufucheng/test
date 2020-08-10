<?php
/**
 * Created by PhpStorm.
 * User: cfc41
 * Date: 2020/8/10
 * Time: 10:17
 */
class Server
{
    public $port;

    public $ip;

    public $server;

    public function __construct($ip = '0.0.0.0', $port)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->creteSocket(); //创建一个通讯节点
    }

    public function listen($callback)
    {
        if (!is_callable($callback)){
            throw new Exception('不是闭包, 请传递正确参数');
        }

        while (true) {
            $client = socket_accept($this->server);//等待客户端接入, 返回的是客户顿连接
            $buf = socket_read($client, 1024); //读取客户端内容
            //请求过滤
            if (empty($this->checkRule("/GET\s(.*?)\sHTTP\/1.1/i", $buf))) {
                socket_close($client);
                return;
            }
            //响应
            $response = call_user_func($callback, $buf); //回调$callback函数
            $this->response($response, $client);
            usleep(1000);
            socket_close($client);
        }
    }

    public function creteSocket()
    {
        $this->server = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        //bind
        socket_set_option($this->server, SOL_SOCKET, SO_REUSEADDR, 1); //复用还处于 TIME_WAIL
        socket_bind($this->server, $this->ip, $this->port);
        socket_listen($this->server); //开始监听
    }

    /**
     * 协议过滤
     * @param $reg
     * @param $buf
     * @return bool
     */
    public function checkRule($reg, $buf)
    {
        if (preg_match($reg, $buf, $matches)) {
            return $matches;
        }
        return false;
    }

    public function request()
    {

    }

    public function response($content, $client)
    {
        //返回数据给客户端, 响应处理
        $string = "HTTP/1.1 200 OK \r\n";
        $string.="Content-Type: text/html;charset=utf-8\r\n";
        $string.="Content-Length: ".strlen($content)."\r\n\r\n";
        socket_write($client, $string . $content);
    }
}