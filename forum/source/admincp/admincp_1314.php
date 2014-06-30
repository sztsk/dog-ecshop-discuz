<?php

/**
 *	  [Study!] (C)2001-2099 1314Study Inc.
 *	  This is NOT a freeware, use is subject to license terms
 *
 *    $Id: admincp_1314.php 2014-03-27 12:06:59Z zhuge $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

define(STUDY_CLOUD_VER, '1.0.4');

cpheader();

$system_app = array('recommend', 'plugins', 'discuz', 'support', 'halt', 'addons');

if(in_array($operation, $system_app) && file_exists($modfile = libfile("1314/{$operation}", 'admincp'))) {
	include $modfile;
}else{
	cpmsg('slang_system_error', '', 'error');
}

?>