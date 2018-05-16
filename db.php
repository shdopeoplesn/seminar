<?php
require_once("config.php");	                //載入環境設定檔
//avoid declare twice
if(defined('PDO_HOSTNAME') == false || defined('PDO_HOSTNAME') == false
|| defined('PDO_HOSTNAME') == false || defined('PDO_HOSTNAME') == false){
	define("PDO_HOSTNAME", config('database.host'));
	define("PDO_DATABASE", config('database.dbname'));
	define("PDO_USERNAME", config('database.user'));
	define("PDO_PASSWORD", config('database.pwd'));
}
$hostname = config('database.host');
$database = config('database.dbname');
$username =  config('database.user');
$password = config('database.pwd');

// 傳統 mysql 連結方式
$link=mysql_connect($hostname, $username, $password);
mysql_select_db($database, $link);
mysql_query("SET NAMES 'utf8'");

/**
 * 使用套件 usmanhalalit/pixie 進行 PDO 連結資料庫
 * Pixie Query Builder 官網：https://github.com/usmanhalalit/pixie
 * 使用範例：
 * new \Pixie\Connection('mysql', $config, 'QB');
 * $query = QB::table('session')->select(['category', 'abbr', 'session_title'])
 * ->where('category','=', $category);
 * $answer=$query->get();
 * 
 * echo $answer[0]->abbr."<br />";
 * echo $answer[0]->session_title."<br />";
 */
$config = array(
    'driver'    => 'mysql',                         // Db driver
    'host'      => $hostname,
    'database'  => $database,
    'username'  => $username,
    'password'  => $password,
    'charset'   => 'utf8',                          // Optional
    'collation' => 'utf8_unicode_ci',               // Optional
    'prefix'    => '',                              // Table prefix, optional
    'options'   => array(                           // PDO constructor options, optional
        PDO::ATTR_TIMEOUT => 5,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,  //設定錯誤訊息提醒方式，正式機可關閉
    ),
);
