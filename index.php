<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<title>EasyPHP - MVC framework</title>
<meta name="generator" content="editplus">
<meta name="author" content="shines77">
<meta name="keywords" content="EasyPHP">
<meta name="description" content="EasyPHP, a easy and fast mvc php framework.">
</head>
<body>
<?php
/**
 * index.php
 *
 * The Front Controller for handling every request
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

/**
 * 此处的EZ_GUID值无实际意义,只是一个定义而已, 值可以随便取, 但EZ_GUID必须定义!
 * 而且必须在调用任何require或require_once页面之前, 用于所有非执行页面的安全检测.
 */
define('EZ_GUID', '{c8a6006f-3c06-418b-9a9a-f9121311a0c0}');

// The filename of the front controller (this file)
define('FC_NAME', pathinfo(__FILE__, PATHINFO_BASENAME));

// The filepath of the front controller (this file)
define('FC_PATH', str_replace(FC_NAME, '', __FILE__));

// The filepath of the base (this file)
define('BASE_PATH', FC_PATH);

require_once 'globals.php';

?>
This is EasyPHP index page.
</body>
</html>