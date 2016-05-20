<?php

/* 定义服务器的绝对路径 */
define('BASE_PATH','/usr/share/nginx/zypc/');

/* 定义Smarty目录的绝对路径 */
define('SMARTY_PATH','Smarty/');

/* 加载Smarty类库文件 */
require BASE_PATH.SMARTY_PATH.'Smarty.class.php';

/* 实例化一个smarty对象 */
$smarty = new Smarty;

/* 定义各个目录的路径 */
$smarty->template_dir = BASE_PATH.'templates/';
$smarty->compile_dir = BASE_PATH.'templates_c/';
$smarty->cache_dir = BASE_PATH.'cache/';
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';
