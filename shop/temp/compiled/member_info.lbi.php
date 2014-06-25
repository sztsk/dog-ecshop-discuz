<?php if ($this->_var['user_info']): ?>
<a href="user.php"><?php echo $this->_var['user_info']['username']; ?></a>
&nbsp;&nbsp;&nbsp;
<a href="flow.php">购物车(2)</a>
 <span>|</span>
 <a href="user.php?act=logout"><?php echo $this->_var['lang']['user_logout']; ?></a>
<?php else: ?>
 <a href="user.php">登录</a>
 <span>|</span>
 <a href="user.php?act=register">注册</a>
<?php endif; ?>