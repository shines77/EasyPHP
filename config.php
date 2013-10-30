<?php
/**
 * config.php
 *
 * Define EasyPHP configure settings
 *
 * =============================================
 *  EasyPHP, a easy and fast mvc php framework.
 * =============================================
 * Author: shines77 (gz_shines@msn.com)
 * Modify: 2013-10-30, Wednesday
 * Since:  ver 1.0.0
 * GitHub: https://github.com/shines77/EasyPHP
 * (PHP 5.0 + mysql 5.1)
 */

$GLOBALS['G_EZPHP'] = array (
	// 是否为调试模式, TRUE为调试模式, FALSE为非调试模式
	'debug' => TRUE,
	
	// 数据库连接配置
	'db' => array (
		'driver' => 'mysql',		// 驱动类型
		'host' => 'localhost',		// 数据库地址
		'port' => 3306,				// 端口
		'login' => 'root',			// 用户名
		'password' => '',			// 密码
		'database' => '',			// 库名称
		'prefix' => '',				// 表前缀
		'persistent' => FALSE,		// 是否使用长链接
	),
	
	'test' => 1
);

?>