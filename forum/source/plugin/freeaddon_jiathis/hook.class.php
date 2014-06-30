<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * From www.1314study.com
 */

if(!defined('IN_DISCUZ')) {
   exit('2014062916jCkkDMVhXy');
}

class plugin_freeaddon_jiathis {
		function global_footer() {
		    global $_G;
		    $return = '';
		    $splugin_setting = $_G['cache']['plugin']['freeaddon_jiathis'];
		    $return = $splugin_setting['code'];
		    return $return;
		}
}

?>