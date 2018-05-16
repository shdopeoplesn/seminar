<?php
/** 環境設定檔
 * 有關 PHP 與專案整體運作的設定可直接定義在此檔案
 * 有關專案的設定，請定義在 config 目錄下對應的檔案
 */

// 定義專案根目錄：務必定義絕對路徑，避免網站非獨立網址或 PHP 檔案在不同層子目錄時造成找不到路徑的問題
define("PROJECT_ROOT", 'L:/UniServerZ/www/seminar');
// define("PROJECT_ROOT", 'L:/UniServerZ/www/seminar');
// define("PROJECT_ROOT", 'C:/WebSites/seminor');

// 設定套件載入目錄與使用套件
require_once PROJECT_ROOT . '/vendor/autoload.php';
// require __DIR__ . '/vendor/autoload.php';
// use Tracy\Debugger;
// Debugger::enable();

// 時間相關設定
date_default_timezone_set('Asia/Taipei');	// 設定為台灣時區
$nowDate=date('Y-m-d');

// 定義專案環境存放目錄
define("CONFIG_FOLDER", PROJECT_ROOT .'/'. "config");

/**
 * config()
 * 未找到指定的設定檔，回傳: false (boolen)
 * 僅找到指定的父結點設定，未指定子節點，回傳: 空字串
 * 不存在的設定，回傳: NULL
 * 找到指定的設定，回傳: string
 * 使用方式：<?php echo config('settings.titleC');?>
 * 使用方式說明：抓取 config 目錄下 settings.php 當中定義的 titleC 變數內容
 */
function config($para)
{
    $part = explode( '.', $para );
    $path = CONFIG_FOLDER.'/'.$part[0].'.php';
    if ( file_exists($path) ) { // 確認參數檔存在
        $value = include($path);
        if ( !isset($value[$part[1]]) ) return NULL; // 確認參數存在
        // 尋找對應參數
        if ( !is_array($value[$part[1]]) || ( is_array($value[$part[1]]) && !isset($part[2]) ) ) // 可回傳索引式陣列
            return $value[$part[1]];
        else
            return $value[$part[1]][$part[2]];
    }
}