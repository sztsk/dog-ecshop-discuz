<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp_cloudaddons.php 33369 2013-06-03 05:00:29Z andyzheng $
 */
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}


require_once libfile('function/cloudaddons');

function cloudaddon_stat($plugin, $action){
	global $_G;
	$_statInfo = array();
	$_statInfo['pluginName'] = $plugin['identifier'];
	$_statInfo['pluginVersion'] = $plugin['version'];
	require_once DISCUZ_ROOT.'./source/discuz_version.php';
	$_statInfo['bbsVersion'] = DISCUZ_VERSION;
	$_statInfo['bbsRelease'] = DISCUZ_RELEASE;
	$_statInfo['timestamp'] = TIMESTAMP;
	$_statInfo['bbsUrl'] = $_G['siteurl'];
	$_statInfo['SiteUrl'] = 'http://localhost/dw_forum/';
	$_statInfo['ClientUrl'] = 'http://localhost/dw_forum/';
	$_statInfo['SiteID'] = 'BDB12B0A-A208-D9FE-8A77-085E6C1B285B';
	$_statInfo['bbsAdminEMail'] = $_G['setting']['adminemail'];
	$_statInfo['action'] = $action;
	$_statInfo = base64_encode(serialize($_statInfo));
	$_md5Check = md5($_statInfo);
	$StatUrl = 'http://addon.1314study.com/stat.php';
	$_StatUrl = $StatUrl.'?info='.$_statInfo.'&md5check='.$_md5Check;
	cpmsg('<p style="font-size:20px;margin-bottom:10px;">&#x9875;&#x9762;&#x52A0;&#x8F7D;&#x4E2D;&#xFF0C;&#x8BF7;&#x7A0D;&#x7B49;...</p><p><img src="source/admincp/1314/images/loader.gif" width="150" height="13"/></p><script type="text/javascript">location.href="'.$_StatUrl.'";</script>', '', 'succeed');
}

function cloudaddon_admin(){
		global $_SERVER;
		$key = array('HTTP_HOST', 'SERVER_ADDR', 'REMOTE_ADDR');
		$local = array('localhost', 'local', '127.0.0.1');
		foreach($key as $v){
				if(in_array($_SERVER[$v], $local)){
						return false;
				}
		}
		return true;
}
?>
