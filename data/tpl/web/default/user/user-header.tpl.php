<?php defined('IN_IA') or exit('Access Denied');?><div class="we7-page-title">用户管理 </div>
<ul class="we7-page-tab">
	<li <?php  if($action == 'display' && ($_GPC['type'] == 'display' || $_GPC['type'] == '')) { ?> class="active"<?php  } ?>><a href="<?php  echo url('user/display')?>">用户管理</a></li>
	<li <?php  if($_GPC['type'] == 'check') { ?> class="active"<?php  } ?>><a href="<?php  echo url('user/display', array('type' => 'check'))?>">审核用户</a></li>
	<li <?php  if($_GPC['type'] == 'recycle') { ?> class="active"<?php  } ?>><a href="<?php  echo url('user/display', array('type' => 'recycle'))?>">用户回收站</a></li>
	<li <?php  if($action == 'fields') { ?>class="active"<?php  } ?>><a href="<?php  echo url('user/fields/display');?>">用户属性设置</a></li>
	<li <?php  if($action == 'registerset') { ?>class="active"<?php  } ?>><a href="<?php  echo url('user/registerset');?>">用户注册设置</a></li>
</ul>