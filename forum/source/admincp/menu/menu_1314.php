<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

if($isfounder) {
		if(getgpc('action') != 'plugins'){
				loadcache('adminmenu');
				$plugin_menu = $_G['cache']['adminmenu'];
				$spluginlist = array();
				$query = DB::query("SELECT * FROM ".DB::table('common_plugin')." WHERE available = 1 AND (`copyright` like '1314%' OR `identifier` like 'study_%' OR `identifier` like 'addon_%' OR `identifier` like 'zzbuluo_%' OR `identifier` like 'freeaddon_%' OR `name` like '%1314%') ");
				while($result = DB::fetch($query)){
						$spluginlist[] = $result['pluginid'];
				}
				
				if(file_exists(DISCUZ_ROOT.'./source/admincp/1314/study_client.lock')){
						$topmenu[1314] = '1314_recommend';
						$menu['1314'] = array(
							array('slang_recommend', '1314_recommend'),
							array('slang_discuz', '1314_discuz'),
							array('slang_support', '1314_support'),
							array('slang_halt', '1314_halt'),
						);
				
						foreach($plugin_menu as $menuid => $row){
								$pluginid = str_replace('plugins&operation=config&do=', '', $row['url']);
								if(in_array($pluginid, $spluginlist)){
										$menu['1314'][]= array('[1314]'.str_replace(array('[1314]', '1314'), array('', ''), $row['name']), "plugins_config_{$pluginid}");
								}
						}
				}elseif(cloudaddon_admin()){
						$topmenunew = array();
						foreach($topmenu as $key => $value){
								if($key == 'plugin'){
										$topmenunew[1314] = '1314_plugins';
								}else{
										$topmenunew[$key] = $value;
								}
						}
						$topmenu = $topmenunew;
						$menu['1314'] = array(
							array('slang_addons', '1314_addons'),
							array('slang_plugins', '1314_plugins'),
						);
						
						foreach($plugin_menu as $menuid => $row){
								$pluginid = str_replace('plugins&operation=config&do=', '', $row['url']);
								if(in_array($pluginid, $spluginlist)){
										$menu['1314'][]= array('[1314]'.str_replace(array('[1314]', '1314'), array('', ''), $row['name']), $row['action']);
								}
						}
						
						foreach($plugin_menu as $menuid => $row){
								$pluginid = str_replace('plugins&operation=config&do=', '', $row['url']);
								if(!in_array($pluginid, $spluginlist)){
										$menu['1314'][]= array($row['name'], $row['action']);
								}
						}
				}
		}
}

?>