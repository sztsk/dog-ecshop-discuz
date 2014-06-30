<?php

/**
 *	  [Study!] (C)2001-2099 1314Study Inc.
 *	  This is NOT a freeware, use is subject to license terms
 *
 *    $Id: 1314_addon.php 2014-03-27 12:06:59Z zhuge $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
define('STUDYADDONS_ADDON_URL', 'http://addon.1314study.com/index.php');
require_once DISCUZ_ROOT.'./source/discuz_version.php';
$data = 'pid='.$plugin['identifier'].'&siteurl='.rawurlencode($_G['siteurl']).'&sitever='.DISCUZ_VERSION.'/'.DISCUZ_RELEASE.'&sitecharset='.CHARSET.'&pversion='.rawurlencode($plugin[version]);
$param = 'data='.rawurlencode(base64_encode($data));
$param .= '&md5hash='.substr(md5($data.TIMESTAMP), 8, 8).'&timestamp='.TIMESTAMP;
cloudaddon_stat($plugin, 'recommend');
?>
