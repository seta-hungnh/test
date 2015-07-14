<?php
include("begin.php");

include($cms['tngpath'] . "genlib.php");
include($cms['tngpath'] . "getlang.php");
include($cms['tngpath'] . "$mylanguage/text.php");

tng_db_connect($database_host,$database_name,$database_username,$database_password);
include($cms['tngpath'] . "tngdblib.php");

if(strpos($_SERVER['SCRIPT_NAME'],"/changelanguage.php") === FALSE && (strpos($_SERVER['SCRIPT_NAME'],"/suggest.php") === FALSE || $enttype))
	include($cms['tngpath'] . "checklogin.php");
else {
	$currentuser = $_SESSION['currentuser'];
	$currentuserdesc = $_SESSION['currentuserdesc'];
}
include($cms['tngpath'] . "log.php");
?>