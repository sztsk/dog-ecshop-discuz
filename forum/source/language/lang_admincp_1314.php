<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 */

require_once libfile('function/cloudaddon');

$charset = strtoupper(CHARSET);
if($charset == 'GBK') {
	$charset = 'SC_GBK';
} elseif($charset == 'BIG5') {
	$charset = 'TC_BIG5';
} elseif($charset == 'UTF-8') {
	if($_G['config']['output']['language'] == 'zh_cn') {
		$charset = 'SC_UTF8';
	} elseif ($_G['config']['output']['language'] == 'zh_tw') {
		$charset = 'TC_UTF8';
	}
} else {
	$charset = '';
}

define(CURRENT_LANG_1314, $charset);

include DISCUZ_ROOT.'./source/admincp/1314/language/lang_admincp_1314'.(CURRENT_LANG_1314 ? '.'.CURRENT_LANG_1314 : '').'.php';

if(file_exists(DISCUZ_ROOT.'./source/admincp/1314/study_client.lock')){
	$extend_lang['header_1314'] = '1314';
}

$GLOBALS['admincp_actions_normal'][] = '1314';

?>