<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,index.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="s_bd">
        <div class="grid_c1">
            <div class="s_banner">
                <img src="../imgs/shop/1.jpg" alt=""/>
            </div>
            <div class="s_nav clear">
                <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
                <!-- <a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?>target="_blank" <?php endif; ?> <?php if ($this->_var['nav']['active'] == 1): ?> class="selected"<?php endif; ?>><?php echo $this->_var['nav']['name']; ?><span></span></a> -->
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
                 <a href="<?php echo $this->_var['cat']['url']; ?>" <?php if ($this->_var['cat']['opennew'] == 1): ?>target="_blank" <?php endif; ?> <?php if ($this->_var['cat']['active'] == 1): ?> class="selected"<?php endif; ?>><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a>
                 
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            </div>
            <div class="s_goods">
                <?php if ($this->_var['best_goods']): ?>
                <ul class="clear">
                  <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                  <li>
                        <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a>
                        <h2 class="s_goods_tit"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['short_style_name']; ?></a></h2>
                        <div class="s_goods_stit">ORANGE</div>
                        <p class="s_goods_price">
                            <?php if ($this->_var['goods']['promote_price'] != ""): ?>
                            <?php echo $this->_var['goods']['promote_price']; ?>
                            <?php else: ?>
                            <?php echo $this->_var['goods']['shop_price']; ?>
                            <?php endif; ?>
                        </p>
                        <div class="s_goods_action">
                            <a class="s_goods_buy" href="<?php echo $this->_var['goods']['url']; ?>">立即购买</a>
                            <!-- <a class="s_goods_buy" href="javascript:addToCart(<?php echo $this->_var['goods']['id']; ?>)">立即购买</a> -->
                        </div>
                    </li>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
                <?php endif; ?>
                
            </div>
        </div>
    </div>






<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>
