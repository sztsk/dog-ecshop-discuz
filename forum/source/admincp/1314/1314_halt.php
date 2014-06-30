<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
if(submitcheck('confirmed')){
	@unlink(DISCUZ_ROOT.'./source/admincp/1314/study_client.lock');
	cpmsg('slang_halt_success', 'action=index', 'succeed');
}else{
	cpmsg('slang_halt_tip', 'action=1314&operation=halt', 'form');
}
?>
