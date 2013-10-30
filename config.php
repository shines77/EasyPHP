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
 * (PHP 5.0(+) and mysql 5.1(+))
 */

defined('EZ_GUID') OR exit('No direct script access allowed.');

$GLOBALS['G_EZPHP'] = array (
		
	// 是否为调试模式, TRUE为调试模式, FALSE为非调试模式
	'debug' => TRUE,

	// EasyPHP运行模式, 有三种状态, 不同的状态决定了不同的错误报告(error reporting)级别
	
	// 'develop': 开发模式, 用于开发, 最高的错误报告等级
	// 'testing': 测试模式, 用于测试, 中等的错误报告等级
	// 'release': 发行模式, 用于发行, 最轻量级的错误报告等级
	'mode' => 'develop',
	
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

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same directory
 * as this file.
 */
$sys_dir = 'sys';

/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * folder than the default one you can set its name here. The folder
 * can also be renamed or relocated anywhere on your server. If
 * you do, use a full server path. For more info please see the user guide:
 * http://codeigniter.com/user_guide/general/managing_apps.html 
 *
 * NO TRAILING SLASH!
 */
$app_dir = 'app';

/*
 *---------------------------------------------------------------
 * VIEW FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want to move the view folder out of the application
 * folder set the path to the folder here. The folder can be renamed
 * and relocated anywhere on your server. If blank, it will default
 * to the standard location inside your application folder. If you
 * do move this, use the full server path to this folder.
 *
 * NO TRAILING SLASH!
 */
$view_dir = '';

?>
