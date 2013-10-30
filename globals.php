<?php
/**
 * globlas.php
 *
 * Define EasyPHP global define(s)
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

/**
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

require_once 'version.php';
require_once 'config.php';

if (substr(PHP_VERSION, 0, 1) != '5') exit("EasyPHP 框架环境要求 PHP 5.0或5.0以上！");

/**
 * 是否为调试模式
 */
if ($GLOBALS['G_EZPHP']['debug'] == TRUE)
	define('EZ_DEBUG', TRUE);
else
	define('EZ_DEBUG', FALSE);

/**
 * EasyPHP运行模式, 有三种状态, 不同的状态决定了不同的错误报告(error reporting)级别
 *
 * 'develop': 开发模式, 用于开发, 最高的错误报告等级
 * 'testing': 测试模式, 用于测试, 中等的错误报告等级
 * 'release': 发行模式, 用于发行, 最轻量级的错误报告等级
 */
$ezphp_mode = $GLOBALS['G_EZPHP']['mode'];
if (isset($ezphp_mode) && (!is_null($ezphp_mode))) {
	if ($ezphp_mode == 'develop')
		define('EZ_ENV_MODE', 'develop');
	elseif ($ezphp_mode == 'testing')
		define('EZ_ENV_MODE', 'testing');
	elseif ($ezphp_mode == 'release')
		define('EZ_ENV_MODE', 'release');
	else
		define('EZ_ENV_MODE', 'unknown');
}

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

// Set the current directory correctly for CLI requests
if (defined('STDIN')) {
	chdir(dirname(__FILE__));
}

if (($_temp = realpath($sys_dir)) !== FALSE) {
	$sys_dir = $_temp.DS;
}
else {
	// Ensure there's a trailing slash
	$sys_dir = rtrim($sys_dir, DS).DS;
}

// Is the system path correct?
if (!is_dir($sys_dir)) {
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
	exit(3);	// EXIT_* constants not yet defined; 3 is EXIT_CONFIG.
}

define('EZ_SYS_DIR', $sys_dir);
define('EZ_APP_DIR', $app_dir);

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
// Path to the system folder
define('SYS_PATH', str_replace('\\', '/', $sys_dir));

// Name of the "system folder"
define('SYS_DIR', trim(strrchr(trim(SYS_PATH, '/'), '/'), '/'));

DebugPrint("EZ_APPNAME: ".EZ_APPNAME);
DebugPrint("EZ_VERSION: ".EZ_VERSION);
DebugPrint("EZ_RELEASE: ".EZ_RELEASE);

DebugPrint("");

DebugPrint("EZ_GUID: ".EZ_GUID);
DebugPrint("EZ_DEBUG: ".EZ_DEBUG);
DebugPrint("EZ_ENV_MODE: ".EZ_ENV_MODE);

DebugPrint("");

DebugPrint("EZ_SYS_DIR: ".EZ_SYS_DIR);
DebugPrint("EZ_APP_DIR: ".EZ_APP_DIR);

DebugPrint("FC_NAME: ".FC_NAME);
DebugPrint("FC_PATH: ".FC_PATH);

DebugPrint("");

DebugPrint("SYS_PATH: ".SYS_PATH);
DebugPrint("SYS_DIR: ".SYS_DIR);

DebugPrint("DIRECTORY_SEPARATOR: ".DS);

/**
 * Dump()
 * @param $vars
 * @param $format
 * @param $trace
 * @return string
 */
function Dump($vars, $format = 'br', $trace = TRUE) {
	$dump_str = htmlspecialchars(print_r($vars, true));
	if ($format == 'br')
		$output = $dump_str . "<br/>\n";
	elseif ($format == 'div')
		$output = "<div align=left>\n\t<pre>" . $dump_str . "</pre>\n</div>\n";
	else {
		// $format = ''
		$output = $dump_str . " ";
	}	
	return $output;
}

/**
 * DebugPrint()
 * @param $info
 * @param $format
 * @param $trace
 * @return void 
 */
function DebugPrint($vars, $format = 'br', $trace = TRUE) {
	if (EZ_DEBUG != TRUE) return;
	$content = Dump($vars, $format, $trace);
	echo $content;
}
?>
