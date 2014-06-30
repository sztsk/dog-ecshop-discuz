<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discuz');
block_get('4,5');?><?php include template('common/header'); ?><div id="ct" class="wp cl">
<div class="newry_bbs_top">
    <div class="wp">
        <div id="pt" class="bm cl">
        	<?php if(empty($gid) && $announcements) { ?>
        	<div class="y">
        		<div id="an">
        			<dl class="cl">
        				<dt class="z xw1">公告:&nbsp;</dt>
        				<dd>
        					<div id="anc"><ul id="ancl"><?php echo $announcements;?></ul></div>
        				</dd>
        			</dl>
        		</div>
        		<script type="text/javascript">announcement();</script>
        	</div>
        	<?php } ?>
        	<div class="z">
        		<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a><em>&raquo;</em><a href="forum.php"><?php echo $_G['setting']['navs']['2']['navname'];?></a><?php echo $navigation;?>
        	</div>
        	<div class="z"><?php if(!empty($_G['setting']['pluginhooks']['index_status_extra'])) echo $_G['setting']['pluginhooks']['index_status_extra'];?></div>
        </div> 
    </div>
</div>
<div class="bbs_sldline2"></div>

        <?php if(empty($gid)) { ?>
        <?php echo adshow("text/wp a_t");?>        <?php } ?>
        <?php if(empty($gid)) { ?>
        
        <div class="wp"></div>
        <?php } ?>

            <div class="lay_main">
            <div class="discuz_left">
                <!-- 首页slide star -->
                <div class="forum_focus">
                    <div class="hd">
                        <strong class="spt">最新推荐</strong>
                    </div>
                    <div class="bd" id="forumFocus">
                        <?php block_display('4');?>                        <div class="txt_box">
                            <?php block_display('5');?>                        </div>
                    </div>
                    <script src="template/dog/style/js/forum_fade.js" type="text/javascript" ></script>
                    <script>
                        jQuery(function (jQuery) {
                            var fForumFade = new FForumFade('#forumFocus');

                            fForumFade.init();
                        });
                    </script>
                </div>
                <!-- 首页slide end -->

                <div class="bbs_maintit">
                    <p class="info">
                        <i class="spt"></i>
                        <span class="txt">今日：<?php echo $todayposts;?></span>
                        <span class="txt">昨日：<?php echo $postdata['0'];?></span>
                        <span class="txt">帖子：<?php echo $posts;?></span>
                        <span class="txt">会员：<?php echo $_G['cache']['userstats']['totalmembers'];?></span>
                        <span class="txt">欢迎新会员：<a href="home.php?mod=space&amp;username=<?php echo rawurlencode($_G['cache']['userstats']['newsetuser']); ?>" target="_blank"><?php echo $_G['cache']['userstats']['newsetuser'];?></a></span>
                    </p>
                    <div class="ctrl">
                        <?php if(!empty($_G['setting']['pluginhooks']['index_nav_extra'])) echo $_G['setting']['pluginhooks']['index_nav_extra'];?>
                        <?php if($_G['uid']) { ?><a href="forum.php?mod=guide&amp;view=my" title="我的帖子">我的帖子</a><?php } if(!empty($_G['setting']['search']['forum']['status'])) { ?><a href="forum.php?mod=guide&amp;view=new" title="最新回复">最新回复</a><?php } ?>
                    </div>
                </div>
                <div class="bbs_topnav_box">
                    <!--[diy=bbs_topnav]-->
                    <div id="bbs_topnav" class="area"></div>
                    <!--[/diy]--> 
                </div>


                <?php if(!empty($_G['setting']['pluginhooks']['index_top'])) echo $_G['setting']['pluginhooks']['index_top'];?>
                <?php if(!empty($_G['cache']['heats']['message'])) { ?>
                <div class="bm">
                    <div class="bm_h cl">
                        <h2><?php echo $_G['setting']['navs']['2']['navname'];?>热点</h2>
                    </div>
                    <div class="bm_c cl">
                        <div class="heat z">
                            <?php if(is_array($_G['cache']['heats']['message'])) foreach($_G['cache']['heats']['message'] as $data) { ?>                            <dl class="xld">
                                <dt><?php if($_G['adminid'] == 1) { ?><a class="d" href="forum.php?mod=misc&amp;action=removeindexheats&amp;tid=<?php echo $data['tid'];?>" onclick="return removeindexheats()">delete</a><?php } ?>
                                <a href="forum.php?mod=viewthread&amp;tid=<?php echo $data['tid'];?>" target="_blank" class="xi2"><?php echo $data['subject'];?></a></dt>
                                <dd><?php echo $data['message'];?></dd>
                            </dl>
                            <?php } ?>
                        </div>
                        <ul class="xl xl1 heatl">
                            <?php if(is_array($_G['cache']['heats']['subject'])) foreach($_G['cache']['heats']['subject'] as $data) { ?>                            <li><?php if($_G['adminid'] == 1) { ?><a class="d" href="forum.php?mod=misc&amp;action=removeindexheats&amp;tid=<?php echo $data['tid'];?>" onclick="return removeindexheats()">delete</a><?php } ?>&middot; <a href="forum.php?mod=viewthread&amp;tid=<?php echo $data['tid'];?>" target="_blank" class="xi2"><?php echo $data['subject'];?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>

                <?php if(!empty($_G['setting']['pluginhooks']['index_catlist_top'])) echo $_G['setting']['pluginhooks']['index_catlist_top'];?>
                <div class="fl bm">
                    <?php if(!empty($collectiondata['follows'])) { ?>

                    <?php $forumscount = count($collectiondata['follows']);?>                    <?php $forumcolumns = 4;?>                    <?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?>                    <div class="bm bmw <?php if($forumcolumns) { ?> flg<?php } ?> cl">
                        <div class="bm_h cl">
                            <span class="o">
                                <img id="category_-1_img" src="<?php echo IMGDIR;?>/<?php echo $collapse['collapseimg_-1'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_-1');" />
                            </span>
                            <h2><a href="forum.php?mod=collection&amp;op=my">我订阅的专辑</a></h2>
                        </div>
                        <div id="category_-1" class="bm_c" style="<?php echo $collapse['category_-1']; ?>">
                            <table cellspacing="0" cellpadding="0" class="fl_tb">
                                <tr>
                                    <?php $ctorderid = 0;?>                                    <?php if(is_array($collectiondata['follows'])) foreach($collectiondata['follows'] as $key => $colletion) { ?>                                    <?php if($ctorderid && ($ctorderid % $forumcolumns == 0)) { ?>
                                </tr>
                                <?php if($ctorderid < $forumscount) { ?>
                                <tr class="fl_row">
                                    <?php } ?>
                                    <?php } ?>
                                    <td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
                                        <div class="fl_icn_g">
                                            <a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>" target="_blank"><img src="<?php echo $_G['style']['styleimgdir'];?>/forum<?php if($followcollections[$key]['lastvisit'] < $colletion['lastupdate']) { ?>_new<?php } ?>.gif" alt="<?php echo $colletion['name'];?>" /></a>
                                        </div>
                                        <dl>
                                            <dt><a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>"><?php echo $colletion['name'];?></a></dt>
                                            <dd><em>主题: <?php echo dnumber($colletion['threadnum']); ?></em>, <em>评论: <?php echo dnumber($colletion['commentnum']); ?></em></dd>
                                            <dd>
                                                <?php if($colletion['lastpost']) { ?>
                                                <?php if($forumcolumns < 3) { ?>
                                                <a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($colletion['lastsubject'], 30); ?></a> <cite><?php echo dgmdate($colletion[lastposttime]);?> <?php if($colletion['lastposter']) { ?><?php echo $colletion['lastposter'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                                                <?php } else { ?>
                                                <a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo dgmdate($colletion[lastposttime]);?></a>
                                                <?php } ?>
                                                <?php } else { ?>
                                                从未
                                                <?php } ?>
                                            </dd>
                                            <?php if(!empty($_G['setting']['pluginhooks']['index_followcollection_extra'][$colletion[ctid]])) echo $_G['setting']['pluginhooks']['index_followcollection_extra'][$colletion[ctid]];?>
                                        </dl>
                                    </td>
                                    <?php $ctorderid++;?>                                    <?php } ?>
                                    <?php if(($columnspad = $ctorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
                                </tr>
                            </table>

                        </div>
                    </div>

                    <?php } ?>
                    <?php if(empty($gid) && !empty($forum_favlist)) { ?>
                    <?php $forumscount = count($forum_favlist);?>                    <?php $forumcolumns = $forumscount > 3 ? ($forumscount == 4 ? 4 : 5) : 1;?>                    <?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?>                    <div class="bm bmw <?php if($forumcolumns) { ?> flg<?php } ?> cl">
                        <div class="bm_h cl">
                            <span class="o">
                                <img id="category_0_img" src="<?php echo IMGDIR;?>/<?php echo $collapse['collapseimg_0'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_0');" />
                            </span>
                            <h2><a href="home.php?mod=space&amp;do=favorite&amp;type=forum">我收藏的版块</a></h2>
                        </div>
                        <div id="category_0" style="<?php echo $collapse['category_0']; ?>">
                            <table cellspacing="0" cellpadding="0" class="fl_tb">
                                <tr>
                                    <?php $favorderid = 0;?>                                    <?php if(is_array($forum_favlist)) foreach($forum_favlist as $key => $favorite) { ?>                                    <?php if($favforumlist[$favorite['id']]) { ?>
                                    <?php $forum=$favforumlist[$favorite[id]];?>                                    <?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?>                                    <?php if($forumcolumns>1) { ?>
                                    <?php if($favorderid && ($favorderid % $forumcolumns == 0)) { ?>
                                </tr>
                                <?php if($favorderid < $forumscount) { ?>
                                <tr class="fl_row">
                                    <?php } ?>
                                    <?php } ?>
                                    <td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
                                        <div class="fl_icn_g"<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                         <?php if($forum['icon']) { ?>
                                         <?php echo $forum['icon'];?>
                                         <?php } else { ?>
                                         <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo $_G['style']['styleimgdir'];?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
                                            <?php } ?>

                                        </div>
                                        <dl<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="margin-left: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                            <dt><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></dt>
                                            <?php if(empty($forum['redirect'])) { ?><dd><em>主题: <?php echo dnumber($forum['threads']); ?></em>, <em>帖数: <?php echo dnumber($forum['posts']); ?></em></dd><?php } ?>
                                            <dd>
                                                <?php if($forum['permission'] == 1) { ?>
                                                私密版块
                                                <?php } else { ?>
                                                <?php if($forum['redirect']) { ?>
                                                <a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
                                                <?php } elseif(is_array($forum['lastpost'])) { ?>
                                                <?php if($forumcolumns < 3) { ?>
                                                <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                                                <?php } else { ?>
                                                <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo $forum['lastpost']['dateline'];?></a>
                                                <?php } ?>
                                                <?php } else { ?>
                                                从未
                                                <?php } ?>
                                                <?php } ?>
                                            </dd>
                                            <?php if(!empty($_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]];?>
                                        </dl>
                                    </td>
                                    <?php $favorderid++;?>                                    <?php } else { ?>
                                    <td class="fl_icn" <?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                        <?php if($forum['icon']) { ?>
                                        <?php echo $forum['icon'];?>
                                        <?php } else { ?>
                                        <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo $_G['style']['styleimgdir'];?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <h2><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></h2>
                                        <?php if($forum['description']) { ?><p class="xg2"><?php echo $forum['description'];?></p><?php } ?>
                                        <?php if($forum['subforums']) { ?><p>子版块: <?php echo $forum['subforums'];?></p><?php } ?>
                                        <?php if($forum['moderators']) { ?><p>版主: <span class="xi2"><?php echo $forum['moderators'];?></span></p><?php } ?>
                                        <?php if(!empty($_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]];?>
                                    </td>
                                    <td class="fl_i">
                                        <?php if(empty($forum['redirect'])) { ?><span class="xi2"><?php echo dnumber($forum['threads']); ?></span><span class="xg1"> / <?php echo dnumber($forum['posts']); ?></span><?php } ?>
                                    </td>
                                    <td class="fl_by">
                                        <div>
                                            <?php if($forum['permission'] == 1) { ?>
                                            私密版块
                                            <?php } else { ?>
                                            <?php if($forum['redirect']) { ?>
                                            <a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
                                            <?php } elseif(is_array($forum['lastpost'])) { ?>
                                            <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                                            <?php } else { ?>
                                            从未
                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="fl_row">

                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php if(($columnspad = $favorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <?php echo adshow("intercat/bm a_c/-1");?>                    <?php } ?>
                    <?php if(is_array($catlist)) foreach($catlist as $key => $cat) { ?>                    <?php if(!empty($_G['setting']['pluginhooks']['index_catlist'][$cat[fid]])) echo $_G['setting']['pluginhooks']['index_catlist'][$cat[fid]];?>
                    <div class="bm bmw <?php if($cat['forumcolumns']) { ?> flg<?php } ?> cl">
                        <div class="bm_h cl <?php echo 's'.$cat['fid']; ?>">
                            <!-- 
                            <span class="o">
                                <img id="category_<?php echo $cat['fid'];?>_img" src="<?php echo IMGDIR;?>/<?php echo $cat['collapseimg'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_<?php echo $cat['fid'];?>');" />
                            </span>
                            -->
                            <?php if($cat['moderators']) { ?><span class="y">分区版主: <?php echo $cat['moderators'];?></span><?php } ?>
                            <?php $caturl = !empty($cat['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$cat['domain'].'.'.$_G['setting']['domain']['root']['forum'] : '';?>                            <h2><img src="template/dog/style/images/f_icon.png"><a href="<?php if(!empty($caturl)) { ?><?php echo $caturl;?><?php } else { ?>forum.php?gid=<?php echo $cat['fid'];?><?php } ?>" style="<?php if($cat['extra']['namecolor']) { ?>color: <?php echo $cat['extra']['namecolor'];?>;<?php } ?>"><?php echo $cat['name'];?></a></h2>
                        </div>
                        <div id="category_<?php echo $cat['fid'];?>" style="<?php echo $collapse['category_'.$cat['fid']]; ?>">
                            <div class="table">
                                <ul>
                                <?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { ?>                                    <?php $forum=$forumlist[$forumid];?>                                    <?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?>                                    <li class="t_item">
                                        <div class="img_box">
                                            <?php if($forum['icon']) { ?>
                                            <?php echo $forum['icon'];?>
                                            <?php } else { ?>
                                            <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo $_G['style']['styleimgdir'];?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
                                            <?php } ?>
                                        </div>
                                        <div class="txt_box">
                                            <h2 class="tl">
                                                <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?>
                                            </h2>
                                            <p class="intro">
                                                <?php if($forum['description']) { ?><?php echo $forum['description'];?><?php } ?>
                                            </p>
                                        </div>
                                    </li>
                                <?php } ?>
                                <?php echo $cat['endrows'];?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php echo adshow("intercat/bm a_c/$cat[fid]");?>                    <?php } ?>
                    <?php if(!empty($collectiondata['data'])) { ?>

                    <?php $forumscount = count($collectiondata['data']);?>                    <?php $forumcolumns = 4;?>                    <?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?>                    <div class="bm bmw <?php if($forumcolumns) { ?> flg<?php } ?> cl">
                        <div class="bm_h cl">
                            <span class="o">
                                <img id="category_-2_img" src="<?php echo IMGDIR;?>/<?php echo $collapse['collapseimg_-2'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_-2');" />
                            </span>
                            <h2><a href="forum.php?mod=collection">淘专辑推荐</a></h2>
                        </div>
                        <div id="category_-2" class="bm_c" style="<?php echo $collapse['category_-2']; ?>">
                            <table cellspacing="0" cellpadding="0" class="fl_tb">
                                <tr>
                                    <?php $ctorderid = 0;?>                                    <?php if(is_array($collectiondata['data'])) foreach($collectiondata['data'] as $key => $colletion) { ?>                                    <?php if($ctorderid && ($ctorderid % $forumcolumns == 0)) { ?>
                                </tr>
                                <?php if($ctorderid < $forumscount) { ?>
                                <tr class="fl_row">
                                    <?php } ?>
                                    <?php } ?>
                                    <td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
                                        <div class="fl_icn_g">
                                            <a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>" target="_blank"><img src="<?php echo $_G['style']['styleimgdir'];?>/forum.gif" alt="<?php echo $colletion['name'];?>" /></a>
                                        </div>
                                        <dl>
                                            <dt><a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>"><?php echo $colletion['name'];?></a></dt>
                                            <dd><em>主题: <?php echo dnumber($colletion['threadnum']); ?></em>, <em>评论: <?php echo dnumber($colletion['commentnum']); ?></em></dd>
                                            <dd>
                                                <?php if($colletion['lastpost']) { ?>
                                                <?php if($forumcolumns < 3) { ?>
                                                <a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($colletion['lastsubject'], 30); ?></a> <cite><?php echo dgmdate($colletion[lastposttime]);?> <?php if($colletion['lastposter']) { ?><?php echo $colletion['lastposter'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                                                <?php } else { ?>
                                                <a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo dgmdate($colletion[lastposttime]);?></a>
                                                <?php } ?>
                                                <?php } else { ?>
                                                从未
                                                <?php } ?>
                                            </dd>
                                            <?php if(!empty($_G['setting']['pluginhooks']['index_datacollection_extra'][$colletion[ctid]])) echo $_G['setting']['pluginhooks']['index_datacollection_extra'][$colletion[ctid]];?>
                                        </dl>
                                    </td>
                                    <?php $ctorderid++;?>                                    <?php } ?>
                                    <?php if(($columnspad = $ctorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
                                </tr>
                            </table>

                        </div>
                    </div>

                    <?php } ?>

                </div>



                <?php if(!empty($_G['setting']['pluginhooks']['index_bottom'])) echo $_G['setting']['pluginhooks']['index_bottom'];?>
              </div>  
            </div>

       </div>     
        <?php if($_G['group']['radminid'] == 1) { ?>
        <?php helper_manyou::checkupdate();?>        <?php } ?>
        <?php if(empty($_G['setting']['disfixednv_forumindex']) ) { ?>
        <script>fixed_top_nv();</script>
        <?php } ?>
        
        
        <?php include template('common/footer'); ?>