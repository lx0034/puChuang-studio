<?php

class db {
    //数据库连接信息
    private $mysqli;
    private $res;
    
    function __construct()
    {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
        if (mysqli_connect_errno())
        {
            echo "MySQL Connected error!".mysqli_connect_errno().mysqli_connect_error();
            exit();
        }
        $this->mysqli->set_charset('utf8');
        return $this->mysqli;
    }

    public function get_mysqli()
    {
        return $this->mysqli;
    }


    public function query($sql)
    {
        $this->res = $this->mysqli->query($sql);
        return $this->res;
    }

    //字符过滤
    public function escape_string($buf)
    {
        return $this->mysqli->escape_string($buf);
    }
    function __destruct()
    {
        if( is_object($this->res) )
            $this->res->free();
        $this->mysqli->close();
    }
}
