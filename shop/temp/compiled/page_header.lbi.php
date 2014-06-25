<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>
<div class="mod_hd">
    <div class="grid_c1">
        <div class="mod_logo s_logo"><span class="hide">电子项圈</span></div>
    </div>
</div>
<div class="mod_toolbar">
    <div class="grid_c1 clear">
        <ul class="mod_toolbar_nav">
            <li><a href="index.html">首页</a></li>
            <li><a href="topic.html">专题</a></li>
            <li><a href="download.html">APP下载</a></li>
            <li><a href="vip.html">会员卡</a></li>
            <li><a href="shop/" class="selected">电子项圈</a></li>
            <li><a href="forum/forum.php">论坛</a></li>
            <li class="last"><a href="contact.html">联系我们</a></li>
        </ul>
        <div class="mod_toolbar_info">
            <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js,utils.js')); ?>
            <?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
            <div class="Carta" id="ECS_CARTNUM"><?php 
$k = array (
  'name' => 'cart_num',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
        </div>
    </div>
</div>
