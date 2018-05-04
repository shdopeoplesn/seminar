<?php
require __DIR__ . '/vendor/autoload.php';
use Tracy\Debugger;
Debugger::enable();

require_once("db.php");	                //載入環境設定檔
require_once("config.php");	                //載入環境設定檔
date_default_timezone_set('Asia/Taipei');	// 設定為台灣時區
header("Content-Type:text/html; charset=utf-8");

$category="11";
echo "<h1>設定要抓取的領域</h1>";
echo $category."<br />";

//// 作法1：抓取設定檔中的領域
// echo "<h1>抓取設定檔定義的領域</h1>";
// $session = config('settings.session');

//// $i = 0;
//// foreach ($session as $key => $value) {
////     if (!is_array($value)) 
////         echo ++$i." -> [".$key."]".$value."<br />";
//// }
//// echo "<br>";

// $catno = 1;
// foreach ($session as $key => $value) {
//     if (!is_array($value) and $category==$catno++) {
//         $sessionabbr=$key;
//         $sessiontitle=$value;
//     }
    
// }
// echo $sessionabbr."<br />";
// echo $sessiontitle."<br />";

//// 作法2：抓取資料庫中的領域

//// 抓取設定檔中的資料庫設定
//$hostname = config('database.host'); 
//$database = config('database.dbname'); 
//$username = config('database.user'); 
//$password = config('database.pwd'); 

// echo "<h1>利用原生 PDO 抓取資料表中定義的領域</h1>";

//// 連結資料庫
 try{
     $db=new PDO("mysql:host=".PDO_HOSTNAME.";
                 dbname=".PDO_DATABASE, PDO_USERNAME, PDO_PASSWORD,
                 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); //設定編碼
                
     //echo '連線成功'."<br />";
     $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //設定錯誤訊息提醒方式，正式機可關閉
     $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

     $sql = "Select category, abbr, session_title from `session` where category = ?";
     $sth = $db->prepare($sql);
     $sth->execute(array($category));
     $row = $sth->fetch();

     echo $row["abbr"]."<br />";
     echo $row["session_title"]."<br />";

    //// $sql = "Select category, abbr, session_title from `session`";
    //// $result = $db->query($sql);
    //// while($row=$result->fetch(PDO::FETCH_OBJ)){
    ////     //PDO::FETCH_OBJ 指定取出資料的型態
    ////     echo $row->category.":".$row->abbr.":".$row->session_title."<br />";
    //// }

    //// $sql = "Select category, abbr, session_title from `session`";
    //// $sth = $db->prepare($sql);
    //// $sth->execute();
    //// while ($row = $sth->fetch()) {
    ////      echo $row["category"].":".$row["abbr"].":".$row["session_title"]."<br />";
    //// }

    $db = null; //結束與資料庫連線
 } 
 catch(PDOException $e){
     //error message
     echo $e->getMessage(); 
 }

//// 透過套件 PDOx 抓取資料庫中的領域
// echo "<h1>透過套件 PDOx 抓取資料庫中的領域</h1>";
// echo "<p>用法請參考 <a target='_blank' href='https://github.com/izniburak/PDOx/blob/master/DOCS.md'>PDOx 說明文件</a></p>";
// $config = [
// 	'host'		=> $hostname,
// 	'driver'	=> 'mysql',
// 	'database'	=> $database,
// 	'username'	=> $username,
// 	'password'	=> $password,
// 	// 'charset'	=> 'utf8',
// 	'collation'	=> 'utf8_unicode_ci',
// 	// 'prefix'	 => ''
// ];

// $db = new \Buki\Pdox($config);

// $records = $db->select('category, abbr, session_title')
//         ->table('session')
// 		->where('category', '=', $category)
// 		    // ->orderBy('category', 'asc')
//          // ->limit(20)
//          // ->getAll();
// 		->get();

// echo $records->abbr."<br />";
// echo $records->session_title."<br />";

//// var_dump($records);
//// echo count($records);

//// 透過套件 fpdo/fluentpdo 抓取資料庫中的領域
// echo "<h1>透過套件 fpdo/fluentpdo 抓取資料庫中的領域</h1>";
// echo "<p><a target='_blank' href='http://envms.github.io/fluentpdo/'>FluentPDO 官網</a></p>";
// echo "<p>用法請參考 <a target='_blank' href='https://www.sitepoint.com/getting-started-fluentpdo/'>FluentPDO 快速上手</a></p>";

// $pdo=new PDO("mysql:host=".$hostname.";dbname=".$database, $username, $password);
// $fpdo = new FluentPDO($pdo);
// $query = $fpdo->from('session')
//             ->where('category = ?', $category)
//             ->select(NULL)
//             ->select(['category', 'abbr', 'session_title'])
//             // ->orderBy('published_at DESC')
//             // ->limit(1)
//             ;
// $row=$query->fetch();
// echo $row["abbr"]."<br />";
// echo $row["session_title"]."<br />";

// echo "<br />";
//// var_dump($row);
//// foreach ($query as $row) {
////     echo "$row[abbr]<br />";
////     echo "$row[session_title]<br />";
//// }

// 透過套件 usmanhalalit/pixie 抓取資料庫中的領域
echo "<h1>透過套件 usmanhalalit/pixie 抓取資料庫中的領域</h1>";
echo "<p><a target='_blank' href='https://github.com/usmanhalalit/pixie'>Pixie Query Builder 官網</a></p>";

// Create a connection, once only.
$config = array(
    'driver'    => 'mysql',             // Db driver
    'host'      => $hostname,
    'database'  => $database,
    'username'  => $username,
    'password'  => $password,
    'charset'   => 'utf8',              // Optional
    'collation' => 'utf8_unicode_ci',   // Optional
    'prefix'    => '',                  // Table prefix, optional
    'options'   => array(               // PDO constructor options, optional
        PDO::ATTR_TIMEOUT => 5,
        PDO::ATTR_EMULATE_PREPARES => false,
    ),
);

new \Pixie\Connection('mysql', $config, 'QB');

$query = QB::table('session')->select(['category', 'abbr', 'session_title'])
->where('category','=', $category);
$answer=$query->get();

echo $answer[0]->category."<br />";
echo $answer[0]->abbr."<br />";
echo $answer[0]->session_title."<br />";
// var_dump($answer);
// echo "<br />";