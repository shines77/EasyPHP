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
 * (PHP 5.0 + mysql 5.1)
 */

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

DebugPrint("EZ_APPNAME: ".EZ_APPNAME);
DebugPrint("EZ_VERSION: ".EZ_VERSION);

DebugPrint("EZ_DEBUG: ".EZ_DEBUG);
DebugPrint("DIRECTORY_SEPARATOR: ".DS);

/**
 * Dump()
 * @param unknown $vars
 * @param string $format
 * @param string $trace
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
 * @param unknown $info
 * @param string $format
 * @param string $trace
 */
function DebugPrint($info, $format = 'br', $trace = TRUE) {
	if (EZ_DEBUG != TRUE) return;
	$content = Dump($info, $format, $trace);
	echo $content;
}
?>