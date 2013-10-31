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
 * Since:  v1.0.0
 * GitHub: https://github.com/shines77/EasyPHP
 * (PHP 5.0(+) and mysql 5.1(+))
 */

defined('EZ_GUID') OR exit('No direct script access allowed.');

$self_script_file = pathinfo(__FILE__, PATHINFO_BASENAME);

/**
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('NDS')) {
	if (DIRECTORY_SEPARATOR == '/')
		define('NDS', '\\');
	else
		define('NDS', '/');
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

define('SYS_FOLDER', $sys_folder);
define('APP_FOLDER', $app_folder);
define('MVC_FOLDER', $mvc_folder);

/**
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

if (0) {
// Set the current directory correctly for CLI requests
if (defined('STDIN')) {
	chdir(dirname(__FILE__));
}

if (($_temp = realpath($sys_folder)) !== FALSE) {
	$sys_dir = $_temp.DS;
}
else {
	// Ensure there's a trailing slash
	$sys_dir = rtrim($sys_folder, '\\');
	$sys_dir = rtrim($sys_dir, '/').DS;
}

// Is the system path correct?
if (!is_dir($sys_dir)) {
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your system folder path does not appear to be set correctly.<br/><br/>Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
	exit(3);	// EXIT_* constants not yet defined; 3 is EXIT_CONFIG.
}
}

$sys_dir = get_realpath($sys_folder, 'sys', 'system folder path', $self_script_file);

define('SYS_DIR', $sys_dir);

// Path to the system folder
define('SYS_PATH', str_replace('\\', '/', $sys_dir));

// Name of the "system folder"
define('SYS_DIR_NAME', trim(strrchr(trim(SYS_PATH, '/'), '/'), '/'));

/**
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */

if (0) {
if (($_temp = realpath($app_folder)) !== FALSE) {
	$app_dir = $_temp.DS;
}
else {
	// Ensure there's a trailing slash
	$app_dir = rtrim($app_folder, '\\');
	$app_dir = rtrim($app_dir, '/').DS;
}

// Is the system path correct?
if (!is_dir($app_dir)) {
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your application folder path does not appear to be set correctly.<br/><br/>Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
	exit(3);	// EXIT_* constants not yet defined; 3 is EXIT_CONFIG.
}
}

$app_dir = get_realpath($app_folder, 'app', 'application folder path', $self_script_file);

define('APP_DIR', $app_dir);

// Path to the application folder
define('APP_PATH', str_replace('\\', '/', $app_dir));

// Name of the "application folder"
define('APP_DIR_NAME', trim(strrchr(trim(APP_PATH, '/'), '/'), '/'));

/**
 * MVC path
 */
$mvc_dir = get_realpath($mvc_folder, 'mvc', 'MVC folder path', $self_script_file);

define('MVC_DIR', $mvc_dir);

// Path to the application folder
define('MVC_PATH', str_replace('\\', '/', $mvc_dir));

// Name of the "application folder"
define('MVC_DIR_NAME', trim(strrchr(trim(MVC_PATH, '/'), '/'), '/'));

// whether display env debug info
$show_env_info = 1;

if ($show_env_info) {
	DebugPrint("EZ_APPNAME: ".EZ_APPNAME);
	DebugPrint("EZ_VERSION: ".EZ_VERSION);
	DebugPrint("EZ_RELEASE: ".EZ_RELEASE);

	DebugPrint("");

	DebugPrint("EZ_GUID: ".EZ_GUID);
	DebugPrint("EZ_DEBUG: ".EZ_DEBUG);
	DebugPrint("EZ_ENV_MODE: ".EZ_ENV_MODE);

	DebugPrint("");

	DebugPrint("FC_NAME: ".FC_NAME);
	DebugPrint("FC_PATH: ".FC_PATH);
	DebugPrint("BASE_PATH: ".BASE_PATH);

	DebugPrint("");

	DebugPrint("SYS_FOLDER: ".SYS_FOLDER);
	DebugPrint("APP_FOLDER: ".APP_FOLDER);
	DebugPrint("MVC_FOLDER: ".MVC_FOLDER);

	DebugPrint("");

	DebugPrint("SYS_DIR: ".SYS_DIR);
	DebugPrint("APP_DIR: ".APP_DIR);
	DebugPrint("MVC_DIR: ".MVC_DIR);

	DebugPrint("");

	DebugPrint("SYS_PATH: ".SYS_PATH);
	DebugPrint("APP_PATH: ".APP_PATH);
	DebugPrint("MVC_PATH: ".MVC_PATH);

	DebugPrint("");

	DebugPrint("SYS_DIR_NAME: ".SYS_DIR_NAME);
	DebugPrint("APP_DIR_NAME: ".APP_DIR_NAME);
	DebugPrint("MVC_DIR_NAME: ".MVC_DIR_NAME);

	DebugPrint("");

	DebugPrint("DIRECTORY_SEPARATOR: ".DS);
	DebugPrint("NON_DIRECTORY_SEPARATOR: ".NDS);

	DebugPrint("");

	//phpinfo();
}

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

/**
 * rtrim_path()
 * @param $path
 * @param $ds_list
 * @return string
 */
function rtrim_path($path, $ds_list = '') {
	if ($ds_str == '') {
		$path = rtrim($path, '/\\');
	}
	else {
		$path = rtrim($path, $ds_list);
	}
	return $path;
}

/**
 * check_path()
 * @param $path
 * @param $default
 * @param $ds_str
 * @return string
 */
function check_path($path, $default, $ds_str = DS) {
	if (empty($path))
		$path = $default;

	if (($_temp = realpath($path)) !== FALSE) {
		$path = $_temp.$ds_str;
	}
	else {
		$path = rtrim($path, '/\\').$ds_str;
	}
	return $path;
}

/**
 * get_realpath()
 * @param unknown $path
 * @param unknown $default
 * @param unknown $pathname_info
 * @param unknown $script_file
 * @param string $ds_str
 * @return string
 */
function get_realpath($path, $default, $pathname_info, $script_file, $ds_str = DS) {
	if (empty($path))
		$path = $default;

	if (($_temp = realpath($path)) !== FALSE) {
		$real_path = $_temp.$ds_str;
	}
	else {
		// Ensure there's a trailing slash
		$real_path = rtrim($path, '/\\').$ds_str;
	}

	// Is the system path correct?
	if (!is_dir($real_path)) {
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Error: Your [<b>'.$pathname_info.'</b>] does not appear to be set correctly.<br/><br/>Please open the following file and correct this: <b>'.$script_file.'</b> .';
		exit(3);	// EXIT_* constants not yet defined; 3 is EXIT_CONFIG.
	}
	return $real_path;
}

?>
