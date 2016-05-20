<?php

header("content-type:text/html;charset=utf-8");

date_default_timezone_set("PRC");

if(!isset($_SESSION)){
    session_start();
}

define("ROOT",dirname(__FILE__));

//载入配置
require_once "./config/smarty.config.php";
require_once "./config/db.config.php";
require_once "./config/web.config.php";

//载入类
require_once "./includes/db.class.php";
require_once "./includes/db_function.class.php";
