<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	.nav .nav-tabs-flow {
		border-bottom: 1px solid #ddd;
	}
	.nav-tabs-flow>li {
		float: left;
		margin-bottom: -1px;
		font-size: 12px!important;
	}
	.nav-tabs-flow>li.active>a, .nav-tabs-flow>li.active>a:hover, .nav-tabs-flow>li.active>a:focus {
		color: #555;
		background-color: #fff;
		border: 1px solid #ddd;
		border-bottom-color: transparent;
		cursor: default;
		font-size: 12px!important;
	}
</style>
<div class="we7-page-title">
	<?php  if($do == 'finance_info' || $do == 'account_list' || $do == 'display' || $do == 'register_flow' || $do == 'flow_control') { ?> 流量主<?php  } ?>
	<?php  if($do == 'content_provider') { ?>广告主<?php  } ?>
</div>
<!--<ul class="nav nav-tabs">
	<li<?php  if($do == 'finance_info' || $do == 'account_list' || $do == 'display' || $do == 'register_flow' || $do == 'flow_control') { ?> class="active"<?php  } ?>>
	<a href="<?php  echo url('advertisement/content-provider/account_list');?>">流量主</a>
	</li>
	<li<?php  if($do == 'content_provider') { ?> class="active"<?php  } ?>><a href="<?php  echo url('advertisement/content-provider/content_provider');?>">广告主</a></li>
</ul>-->

<?php  if($do != 'content_provider') { ?>
	<ul class="we7-page-tab">
		<li<?php  if($do == 'account_list' || $do == 'display' || $do == 'register_flow' || $do == 'flow_control') { ?> class="active"<?php  } ?>>
		<?php  if($flow_master_info['status'] == 4 || IMS_FAMILY == 'v') { ?>
		<a href="<?php  echo url('advertisement/content-provider/account_list');?>">流量管理</a>
		<?php  } else if($flow_master_info['status'] != 4) { ?>
		<a href="<?php  echo url('advertisement/content-provider/display');?>">流量管理</a>
		<?php  } ?>
		</li>
		<?php  if(!empty($commission_show) || $flow_master_info['status'] == 4) { ?>
		<li<?php  if($do == 'finance_info') { ?> class="active"<?php  } ?>><a href="<?php  echo url('advertisement/content-provider/finance_info');?>">财务信息</a></li>
		<?php  } ?>
	</ul>
<?php  } ?>
<?php  if($do != 'content_provider') { ?>
	<div class="alert we7-page-alert">
		<div>
			<i class="wi wi-info-sign color-default"></i>
			免费用户默认开通流量主服务，如果要进行关闭，请升级为授权版或商业版。
		</div>
		<div>
			<i class="wi wi-info-sign  color-default"></i>
			免费用户对公众号进行标签设置后，可以对广告进行分成。
		</div>
	</div>
<?php  } ?>
	<?php  if($do == 'display') { ?>
	<div class="panel we7-panel">
		<div class="panel-heading">申请流量主</div>
		<div class="panel-body we7-padding">
			<div class="col-xs-7">
				<span>流量主: <?php  if(empty($flow_master_info['status'])) { ?>未申请<?php  } else { ?><?php  echo $flow_master_info['status_text'];?><?php  } ?></span>
				<?php  if($flow_master_info['status'] == 3 && !empty($flow_master_info['refuse_reason'])) { ?>
				<span class="help-block">
					<strong class="text-danger"><?php  echo $flow_master_info['refuse_reason'];?></strong>
				</span>
				<?php  } ?>
				<span class="help-block">只需简单申请，即可成为流量主，按月获取广告收入。广告资源优质丰富，数据统计精准透明。</span>
			</div>
			<?php  if(is_error($flow_master_info) || (!is_error($flow_master_info) && ($flow_master_info['status'] == 1 || $flow_master_info['status'] == 3))) { ?>
			<div class="col-xs-5">
				<span class="pull-right">
					<a class="btn btn-primary" href="<?php  echo url('advertisement/content-provider/register_flow')?>">申请流量主</a>
				</span>
			</div>
			<?php  } ?>
		</div>
	</div>
	<?php  } ?>
	<?php  if($do == 'register_flow') { ?>
	<div class="panel we7-panel">
		<div class="panel-heading">申请流量主</div>
		<div class="panel-body we7-padding">
			<form action="" method="post" class="we7-form" role="form" enctype="multipart/form-data" id="form1">
				<div class="form-group">
					<label class="col-sm-2 control-label">联系人</label>
					<div class="col-sm-10 form-controls">
						<input type="text" name="linkman" id="linkman" class="form-control" autocomplete="off" value="<?php  echo $flow_master_info['linkman'];?>" placeholder="请输入联系人" />
						<div class="help-block">
							请填写联系人
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">电话</label>
					<div class="col-sm-10 form-controls">
						<input type="text" name="mobile" class="form-control" value="<?php  echo $flow_master_info['mobile'];?>" autocomplete="off" placeholder="请输入电话" />
						<div class="help-block">
							请填写电话
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">联系地址</label>
					<div class="col-sm-10 form-controls">
						<input type="text" name="address" class="form-control" value="<?php  echo $flow_master_info['address'];?>" autocomplete="off" placeholder="请输入联系地址" />
						<div class="help-block">
							请输入联系地址
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">身份证上传</label>
					<div class="col-sm-10 form-controls">
						<input type="file" name="id_card_photo">
						<div class="help-block">
							请上传身份证
						</div>
					</div>
				</div>
				<?php  if(!empty($flow_master_info['id_card_photo'])) { ?>
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-10 form-controls">
						<div class="input-group">
							<img src="<?php  echo $flow_master_info['id_card_photo'];?>?time=<?php  echo time()?>" class="img-responsive img-thumbnail" width="150" />
						</div>
					</div>
				</div>
				<?php  } ?>
				<div class="form-group">
					<label class="col-sm-2 control-label">营业执照上传</label>
					<div class="col-sm-10 form-controls">
						<input type="file" name="business_licence_photo">
						<div class="help-block">
							请上传营业执照
						</div>
					</div>
				</div>
				<?php  if(!empty($flow_master_info['business_licence_photo'])) { ?>
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-10 form-controls">
						<div class="input-group">
							<img src="<?php  echo $flow_master_info['business_licence_photo'];?>?time=<?php  echo time()?>" class="img-responsive img-thumbnail" width="150" />
						</div>
					</div>
				</div>
				<?php  } ?>
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-10 form-controls">
						<input name="submit" type="submit" value="提交" class="btn btn-primary span2 js-register-flow" />
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
					</div>
				</div>
			</form>
		</div>
	</div>
	<script>
		require(['filestyle'], function(){
			$(".form-group").find(':file').filestyle({buttonText: '上传图片'});
		});
		$('.js-register-flow').click(function() {
			linkman = $('input[name="linkman"]').val();
			mobile = $('input[name="mobile"]').val();
			address = $('input[name="address"]').val();
			if (!linkman) {
				util.message('请填写联系人');
				return false;
			}
			if (!mobile) {
				util.message('请填写电话');
				return false;
			}
			if (!address) {
				util.message('请填写联系地址');
				return false;
			}
			return true;
		});
	</script>
	<?php  } ?>
	<?php  if($do == 'account_list') { ?>
	<div class="panel we7-panel">
		<div class="panel-heading">筛选</div>
		<div class="panel-body we7-padding">
			<form action="./index.php" method="get" role="form" class="we7-form">
				<input type="hidden" name="c" value="advertisement">
				<input type="hidden" name="a" value="content-provider">

				<div class="form-group" style="margin-top:20px;margin-left: 40px">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">搜索</label>
					<div class="col-sm-8 col-lg-10 col-xs-12">
						<div class="input-group">
							<input type="hidden" name="type" value="<?php  echo $_GPC['type'];?>">
							<input type="hidden" name="expiretime" value="<?php  echo $_GPC['expiretime'];?>">
							<input type="text" class="form-control <?php  if(empty($_GPC['keyword']) && !empty($_GPC['s_uniacid'])) { ?>hide<?php  } ?>" placeholder="请输入微信公众号名称" name="keyword" id="s_keyword" value="<?php  echo $_GPC['keyword'];?>">
							<input type="text" class="form-control <?php  if(empty($_GPC['s_uniacid'])) { ?>hide<?php  } ?>" placeholder="请输入微信公众号ID" name="s_uniacid" id="s_uniacid" value="<?php  echo $_GPC['s_uniacid'];?>">
							<div class="input-group-btn">
								<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="javascript:;" onclick="$('#s_uniacid').addClass('hide').val('');$('#s_keyword').removeClass('hide');">根据公众号名称搜索</a></li>
									<li><a href="javascript:;" onclick="$('#s_uniacid').removeClass('hide');$('#s_keyword').addClass('hide').val('');">根据公众号ID搜索</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="panel we7-panel">
		<div class="panel-heading">
			详细数据
		</div>
		<div class="table-responsive panel-body ">
			<table class="table table-hover we7-table vertical-middle">
				<col width="110px"/>
				<col width="200px"/>
				<col width="250px"/>
				<?php  if(!empty($commission_show)) { ?>
				<col width='100px'/>
				<?php  } ?>
				<col width="100px"/>
				<col width="100px"/>
				<thead>
				<tr>
					<th class="row-hover" style="width:600px;" colspan="2">公众号<i></i></th>
					<th>标签<i></i></th>
					<?php  if(!empty($commission_show)) { ?>
					<th>累计金额<i></i></th>
					<?php  } ?>
					<th>状态<i></i></th>
					<th class="text-right">管理</th>
				</tr>
				</thead>
				<tbody>
				<?php  if(is_array($list)) { foreach($list as $uni) { ?>
				<?php  if(is_array($uni['details'])) { foreach($uni['details'] as $account) { ?>
				<tr>
					<td>
						<img src="<?php  echo tomedia('headimg_'.$account['acid'].'.jpg');?>?time=<?php  echo time()?>" class="" width="50" height="50"  onerror="this.src='resource/images/gw-wx.gif'" />
					</td>
					<td class="row-hover text-left">
						<div style="font-size:16px;">
							<?php  echo $account['name'];?>
							<br>
							<span class="help-block" style="font-size:13px;">类型:<?php  if($account['level'] == '1') { ?>普通订阅号<?php  } else if($account['level'] == '2') { ?>普通服务号<?php  } else if($account['level'] == '3') { ?>认证订阅号<?php  } else if($account['level'] == '4') { ?>认证服务号/认证媒体/政府订阅号<?php  } ?></span>
						</div>
					</td>
					<td>
						<?php  if($uni['flow_setting_enable'] == 2 && !empty($uni['flow_setting'])) { ?>
						<?php  echo $uni['flow_setting']['ad_tags_str'];?>
						<?php  } else { ?>
						未设置
						<?php  } ?>
					</td>
					<?php  if(!empty($commission_show)) { ?>
					<td>
						<?php  if(!empty($uni['flow_setting']['amount'])) { ?>
						<?php  echo $uni['flow_setting']['amount'];?>
						<?php  } else { ?>
						0
						<?php  } ?>
						元
					</td>
					<?php  } ?>
					<td>
						<?php  if(IMS_FAMILY == 'v' || $uni['flow_setting_enable'] == 2) { ?>
						已开通
						<?php  } else if($uni['flow_setting_enable'] == 1) { ?>
						未开通
						<?php  } ?>
					</td>
					<td>
						<div class="link-group">
							<a href="<?php  echo url('advertisement/content-provider/flow_control', array('uniacid' => $account['uniacid']))?>">
								<?php  if(IMS_FAMILY == 'v' ||$uni['flow_setting_enable'] == 2) { ?>
								设置
								<?php  } else if($uni['flow_setting_enable'] == 1) { ?>
								开通广告联盟
								<?php  } ?>
							</a>
						</div>
					</td>
				</tr>
				<?php  } } ?>
				<?php  } } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="text-right"><?php  echo $pager;?></div>
	<?php  } ?>
	<?php  if($do == 'flow_control') { ?>
	<div class="panel we7-panel">
		<div class="panel-heading">公众号信息</div>
		<div class="panel-body">
			<table class="table table-hover we7-table vertical-middle">
				<col width="110px"/>
				<col />
				<col width="300px"/>
				<?php  if(!empty($commission_show)) { ?>
				<col width='150px'/>
				<?php  } ?>
				<col width="200px"/>
				<thead>
				<tr>
					<th class="row-hover" colspan="2">公众号<i></i></th>
					<th>标签<i></i></th>
					<?php  if(!empty($commission_show)) { ?>
					<th>累计金额<i></i></th>
					<?php  } ?>
					<th class="text-right">管理</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>
						<img src="<?php  echo tomedia('headimg_'.$current_account['acid'].'.jpg');?>?time=<?php  echo time()?>" class="" width="50" height="50"  onerror="this.src='resource/images/gw-wx.gif'" />		
					</td>
					<td class="text-left">
						<div class="" style="font-size:16px;">
							<?php  echo $current_account['name'];?>
							<br>
							<span class="help-block" style="font-size:13px;">类型:<?php  if($current_account['level'] == '1') { ?>普通订阅号<?php  } else if($current_account['level'] == '2') { ?>普通服务号<?php  } else if($current_account['level'] == '3') { ?>认证订阅号<?php  } else if($current_account['level'] == '4') { ?>认证服务号/认证媒体/政府订阅号<?php  } ?></span>
						</div>
					</td>
					<td><?php  if($current_uniaccount['enable'] == 2 && !empty($current_uniaccount['current_tags_str'])) { ?><?php  echo $current_uniaccount['current_tags_str'];?><?php  } else if(empty($current_uniaccount)) { ?>未设置<?php  } ?></td>
					<?php  if(!empty($commission_show)) { ?>
					<td><?php  if(!empty($current_uniaccount)) { ?><?php  echo $current_uniaccount['amount'];?><?php  } else { ?>0<?php  } ?>元</td>
					<?php  } ?>
					<td>
						<div class="link-group">
							<?php  if(IMS_FAMILY != 'v') { ?>
							<?php  if(empty($current_uniaccount['enable']) || $current_uniaccount['enable'] == 1) { ?>
							<a href="#ad-tags" data-toggle="modal">开通</a>
							<?php  } else if($current_uniaccount['enable'] == 2) { ?>
							<a href="javascript:;" class="js-stop-provider" data-uniacid="<?php  echo $_GPC['uniacid'];?>">停止</a>
							<a href="#ad-tags" data-toggle="modal" >设置</a>
							<?php  } ?>
							<?php  } else { ?>
							<a href="#ad-tags" data-toggle="modal" >设置</a>
							<?php  } ?>
						</div>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
	<?php  if(IMS_FAMILY != 'v' && $current_uniaccount['enable'] == 2) { ?>
	<div class="panel we7-panel">
		<div class="panel-heading">
			应用信息
				<span class="pull-right" style="display:none;">
					<a href="">批量设置</a>
				</span>
		</div>
		<div class="panel-body we7-padding">
			<div class="row">
				<?php  if(!empty($modulelist_available)) { ?>
				<?php  if(is_array($modulelist_available)) { foreach($modulelist_available as $list) { ?>
				<div class="col-xs-3">
					<div class="col-xs-2">
						<img src="<?php  echo $list['icon'];?>" width="48" height="48" class="img-rounded">
					</div>
					<div class="col-xs-6">
						<?php  echo $list['title'];?>
						<br>
								<span class="help-block">广告类型:
									<?php  if($list['flow_setting']['enable'] == 2 && !empty($list['flow_setting']['ad_types'])) { ?>
									<?php  if(is_array($list['flow_setting']['ad_types'])) { foreach($list['flow_setting']['ad_types'] as $ad_types) { ?>
										<?php  echo $ad_types;?>
									<?php  } } ?>
									<?php  } else { ?>
										未开通
									<?php  } ?>
								</span>
					</div>
					<div class="col-xs-4">
						<a href="#ad-types" data-toggle="modal" class="js-type-setting" data-module_name="<?php  echo $list['name'];?>" data-uniacid="<?php  echo $_GPC['uniacid'];?>" data-ad_types='<?php  echo $list['ad_types'];?>'>
						<?php  if($list['flow_setting']['enable'] == 2 && !empty($list['flow_setting']['ad_types'])) { ?>
						设置
						<?php  } else { ?>
						开通
						<?php  } ?>
						</a>
					</div>
				</div>
				<?php  } } ?>
				<?php  } else { ?>
				<div class="col-xs-3" style="padding:20px;">暂无可用应用</div>
				<?php  } ?>
			</div>
		</div>
	</div>
	<?php  } ?>
	<div class="modal fade" id="ad-tags">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body" style="text-align:left;">
					<table class="table we7-table vertical-middle we7-form" style="min-width:568px;">
						<thead>
						<tr>
							<th style="width: 100px;" class="text-center">选择</th>
							<th class="text-left">标签</th>
						</tr>
						</thead>
						<tbody>
						<?php  if(!empty($tag_list)) { ?>
						<?php  if(is_array($tag_list)) { foreach($tag_list as $tags) { ?>
						<tr>
							<td colspan="2">
								<label class="label label-info"><?php  echo $tags['title'];?></label>
							</td>
						</tr>
						<?php  if(is_array($tags['items'])) { foreach($tags['items'] as $key => $items) { ?>
						<tr>
							<td class="text-center"><input type="checkbox" id="chk_tag_<?php  echo $key;?>" name="tagids[]" data-name="<?php  echo $items;?>" value="<?php  echo $key;?>" <?php  if(!empty($current_tags[$key])) { ?> checked<?php  } ?>><label>&nbsp;</label></td>
							<td class="text-left"><label for="chk_tag_<?php  echo $key;?>" style="font-weight:normal;" class="name"><?php  echo $items;?></label></td>
						</tr>
						<?php  } } ?>
						<?php  } } ?>
						<?php  } ?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<div class="pull-left js-select-tag-error"></div>
					<input type="hidden" name="tag-select">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button type="button" class="btn btn-primary js-select-tags" data-uniacid="<?php  echo $_GPC['uniacid'];?>">确定</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="ad-types">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body" style="text-align:left;">
					<table class="table we7-table vertical-middle" style="min-width:568px;">
						<thead>
						<tr>
							<th style="width: 50px;" class="text-center">选择</th>
							<th>类型</th>
						</tr>
						</thead>
						<tbody class="js-types-show">

						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="type-select">
					<input type="hidden" name="module_name">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button type="button" class="btn btn-primary js-select-types" data-dismiss="modal" data-uniacid="<?php  echo $_GPC['uniacid'];?>" data-module_name>确定</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(function() {
			$('#ad-types').on('hidden.bs.modal', function () {
				$('#ad-types input[type="checkbox"]').prop('checked', false);
			});
			cloud_module_support_str = '<?php  echo $cloud_module_support_str;?>';
			cloud_module_support_str = $.parseJSON(cloud_module_support_str);
		})
		$(document).on('click', '.js-type-setting', function() {
			var module_name = $(this).data('module_name');
			var uniacid = $(this).data('uniacid');
			var ad_types = $(this).data('ad_types');
			html = '';
			for (var i in cloud_module_support_str[module_name].ad_types) {
				html += '<tr>';
				html += '<td class="text-center">';
				html += '<input type="checkbox" id="chk_type_'+ i +'" name="typeids[]" data-name="' + cloud_module_support_str[module_name].ad_types[i] + '" value="'+ i +'"></td>';
				html += '<td class="text-left"><label for="chk_type_'+ i +'" style="font-weight:normal;" class="name">' +
				cloud_module_support_str[module_name].ad_types[i] + '</label></td></tr>';

			}
			$('.js-types-show').html(html);
			$('.js-select-types').data('module_name', module_name);
			$.post("<?php  echo url('advertisement/content-provider/ad_type_get')?>", {'module_name' : module_name, 'uniacid' : uniacid}, function(data) {
				data = $.parseJSON(data);
				if (data.message.errno == 0) {
					for (var i in data.message.message) {
						$('#chk_type_' + i).prop('checked', true);
					}
				} else {
					util.message(data.message.message, '', 'error');
				}
			});
		});
		$(document).on('click', 'input[name="tagids[]"]', function() {
			checks = $('input[name="tagids[]"]:checked');
			if (checks.length > 0) {
				$('.js-select-tag-error').html('');
			}
		})
		$('.js-select-tags').click(function(){
			var chks = $('input[name="tagids[]"]:checked');
			var tagids = [];
			var uniacid = $(this).data('uniacid');
			if (chks) {
				$.each(chks, function(){
					tagids.push($(this).val());
				});
				$('input[name=tag-select]').val(tagids.join('@'));
			} else {
				$('input[name=tag-select]').val('');
			}
			if (tagids.length == 0) {
				$('.js-select-tag-error').html('请至少选择一个标签');
				return;
			} else {
				$('.js-select-tag-error').html('');
				$(this).attr('data-dismiss', 'modal');
				$.post("<?php  echo url('advertisement/content-provider/flow_control')?>", {'type' : 'tags', 'tagids' : tagids, 'enable' : 2, 'uniacid' : uniacid}, function(data) {
					data = $.parseJSON(data);
					if (data.message.errno == 0) {
						util.message(data.message.message, data.redirect, 'success');
					} else {
						util.message(data.message.message, data.redirect, 'error');
					}
				});
			}
		});
		$('.js-select-types').click(function(){
			var chks = $('input[name="typeids[]"]:checked');
			var typeids = [];
			var module_name = $(this).data('module_name');
			var uniacid = $(this).data('uniacid');
			if (chks) {
				$.each(chks, function(){
					typeids.push($(this).val());
				});
				$('input[name=type-select]').val(typeids.join('@'));
			} else {
				$('input[name=type-select]').val('');
			}
			$.post("<?php  echo url('advertisement/content-provider/flow_control')?>", {'type' : 'types', 'typeids' : typeids, 'enable' : 2, 'module_name' : module_name, 'uniacid' : uniacid}, function(data) {
				data = $.parseJSON(data);
				if (data.message.errno == 0) {
					util.message(data.message.message, data.redirect, 'success');
				} else {
					util.message(data.message.message, data.redirect, 'error');
				}
			});
		});
		$(document).on('click', '.js-stop-provider', function() {
			var uniacid = $(this).data('uniacid');
			$.post("<?php  echo url('advertisement/content-provider/flow_control')?>", {'type' : 'tags', 'enable' : 1, 'uniacid' : uniacid}, function(data) {
				data = $.parseJSON(data);
				if (data.message.errno == 0) {
					util.message(data.message.message, data.redirect, 'success');
				} else {
					util.message(data.message.message, data.redirect, 'error');
				}
			});
		});
	</script>
	<?php  } ?>
	<?php  if($do == 'finance_info') { ?>
	<nav class="navbar navbar-default navbar-static-top we7-margin-vertical" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php  echo url('advertisement/content-provider/finance_info')?>">数据统计</a>
			<ul class="nav navbar-nav navbar-right">
				<li <?php  if($_GPC['type'] == 1) { ?>class="active"<?php  } ?>><a href="<?php  echo url('advertisement/content-provider/finance_info', array('type' => '1'))?>">今日</a></li>
				<li <?php  if($_GPC['type'] == 2) { ?>class="active"<?php  } ?>><a href="<?php  echo url('advertisement/content-provider/finance_info', array('type' => '2'))?>">昨日</a></li>
				<form class="navbar-form navbar-left" role="search" id="form1">
					<input name="c" value="system" type="hidden">
					<input name="a" value="content_provider" type="hidden">
					<input name="do" value="finance_info" type="hidden">
					<?php  echo tpl_form_field_daterange('datelimit', array('start' => date('Y-m-d', $params['starttime']),'end' => date('Y-m-d', $params['endtime'])))?>
				</form>
			</ul>
		</div>
	</nav>
	<div class="panel we7-panel">
		<div class="panel-heading">账户流水</div>
		<div class="panel-body">
			<table class="table we7-table table-hover">
				<thead>
				<tr>
					<th>时间</th>
					<th>广告曝光度</th>
					<th>广告点击量</th>
					<th>收入金额</th>
				</tr>
				</thead>
				<tbody>
				<?php  if(is_array($finance_items)) { foreach($finance_items as $item) { ?>
				<tr>
					<td>
						<?php  echo $item['extra_date'];?>
					</td>
					<td>
						<?php  echo $item['view'];?>
					</td>
					<td>
						<?php  echo $item['click'];?>
					</td>
					<td>
						<?php  echo $item['amount'];?>元
					</td>
				</tr>
				<?php  } } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="text-right"><?php  echo $pager;?></div>
	<script>
		require(['jquery', 'daterangepicker'], function(c, $) {
			$(function() {
				$('.daterange').on('apply.daterangepicker', function(ev, picker) {
					$('#form1')[0].submit();
				});
			});
		});
	</script>
	<?php  } ?>

	<?php  if($do == 'content_provider') { ?>
	<iframe src="<?php  echo $iframe;?>" marginheight="0" marginwidth="0" frameborder="0" width="100%" style="width: 100%; height:1800px;"  allowTransparency="true"></iframe>
	<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>