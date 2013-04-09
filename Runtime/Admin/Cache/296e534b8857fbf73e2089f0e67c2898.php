<?php if (!defined('THINK_PATH')) exit();?><script src="__PUBLIC__/dwz/js/baidumap.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	try{
		initialize();
	}catch(e){
		
	}
	
	new AjaxUpload('#upload_button', {
	    action: APP+'/Xheditor/avatarUpload',
	    name: 'images',
	    onSubmit : function(file , ext){
	        if (ext && /^(jpg|png|jpeg|gif)$/.test(ext)){
	            /* Setting data */
	            this.setData({
	            'ext': ext
	            });
	            this.disable();
	        } else {
	            return false;
	        }

	    },
	    onComplete : function(file,response){
	    	var data=eval("("+response+")");
	    	uploadOne('img','header',data,true);
	        this.enable();
	    }
	});
	
	new AjaxUpload('#license_button', {
	    action: APP+'/Xheditor/avatarUpload',
	    name: 'images',
	    onSubmit : function(file , ext){
	        if (ext && /^(jpg|png|jpeg|gif)$/.test(ext)){
	            /* Setting data */
	            this.setData({
	            'ext': ext
	            });
	            this.disable();
	        } else {
	            return false;
	        }

	    },
	    onComplete : function(file,response){
	    	var data=eval("("+response+")");
	    	$('input[name="license"]').val(data.msg.relpath);
	    	$('#license_img').attr('src',data.msg.url).show();
	        this.enable();
	    }
	});
});
</script>
<div class="pageContent">
	<form method="post" action="__URL__/insert/navTabId/__MODULE__" class="pageForm required-validate" enctype="multipart/form-data" onsubmit="return iframeCallback(this, dialogAjaxDone)">
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>商号：</label>
				<input type="text" class="required" minlength="2" name="name">
			</div>
			
			<div class="unit">
				<label>别名：</label>
				<input type="text" minlength="2" name="b_name">
			</div>
			
			<div class="unit">
				<label>会员：</label>
				<input type="hidden" name="uid" group="member" field="id">
				<input class="required" name="member_name" type="text" readonly="readonly" group="member" field="name"/>
				<a class="btnLook" href="<?php echo U('Member/lookUp/group/member/dialogId/'.MODULE_NAME.'_'.ACTION_NAME);?>" target="dialog" rel="member_lookup">查找带回</a>
			</div>
			
			 <div class="unit">
				<label>分类：</label>
				<SELECT name="cid" class="combox">
					<option value="">无</option>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><?php $n = (substr_count($vo['path'],',') - 1) * 24 + 3 ?>
						<option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"])  ==  $_REQUEST['cid']): ?>selected="selected"<?php endif; ?>><?php echo str_pad('∟',$n,'&nbsp;',STR_PAD_LEFT);?><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</SELECT>
			</div>
			
			<div class="unit">
				<label>地区：</label>
				<SELECT name="rid" class="combox">
					<option value="">无</option>
					<?php if(is_array($region)): $i = 0; $__LIST__ = $region;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><?php $n = (substr_count($vo['path'],',') - 1) * 24 + 3 ?>
						<option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"])  ==  $_REQUEST['rid']): ?>selected="selected"<?php else: ?><?php if(($releasedata["region"])  ==  $vo['id']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo str_pad('∟',$n,'&nbsp;',STR_PAD_LEFT);?><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</SELECT>
			</div>
            
            <div class="unit">
				<label>排序：</label>
				<input type="text" class="digits textInput valid" name="sort">
			</div>
			
			<div class="unit">
				<label>企业名称：</label>
				<input type="text" name="companyname">
			</div>
			
			<div class="unit">
				<label>法人代表：</label>
				<input type="text" name="legal">
			</div>
			
			<div class="unit">
				<label>营业执照有效期：</label>
				<input type="text" name="validity" class="date" readonly="true" format="yyyy-MM-dd" value="<?php echo toDate(time());?>" />
				<a class="inputDateButton" href="javascript:;">选择</a>
			</div>
			
			<div class="unit">
				<label>营业执照：</label>
				<input type="hidden" name="license" id="license">
				<div style="float: left;">
				<img id="license_img" width="100" height="100" style="margin-left:5px; display:none;"/>
                <div class="button" id="license_button"><div class="buttonContent"><button type="button">上传</button></div></div>
                </div>
			</div>
			
			<div class="unit">
				<label>负责人姓名：</label>
				<input type="text" name="fz_name">
			</div>
			<div class="unit">
				<label>负责人地址：</label>
				<input type="text" name="fz_address">
			</div>
			<div class="unit">
				<label>负责人电话：</label>
				<input type="text" name="fz_tel">
			</div>
			<div class="unit">
				<label>负责人手机：</label>
				<input type="text" name="fz_phone">
			</div>
			<div class="unit">
				<label>负责人邮箱：</label>
				<input type="text" name="fz_mail">
			</div>
			<div class="unit">
				<label>传真：</label>
				<input type="text" name="fax">
			</div>
			
    		<div class="unit">
				<label>预约电话：</label>
				<input type="text" class="tel" name="tel">
			</div>

            <div class="unit">
                <label>营业时间：</label>
                <input type="text" name="opening">
            </div>

			<div class="unit">
				<label>商家类型：</label>
				<input type="text" class="type" name="type">
			</div>
			<div class="unit">
				<label>商家特色：</label>
				<input type="text" class="characteristic" name="characteristic">
			</div>
            <div class="unit">
                <label>服务范围：</label>
                <input type="text" class="services" name="services">
            </div>
			
			<div class="unit">
				<label>商家自我签名：</label>
				<input type="text" class="textInput" name="signature" id="signature" style="width:330px;">
			</div>
            
            <div class="unit">
				<label>地址：</label>
				<input type="text" class="required textInput" name="address" id="address" style="width:330px;"><input type="button" value="标记" onClick="codeAddress()"><input onClick="showMarker();" type="button" value="显示标记"/>
			</div>
			
			<div class="unit">
				<label>地图：</label>
				<div id="map_canvas"></div>
			</div>
			
            <div class="unit">
                <label>地图属性：</label>
			      <div class="fl"><span>经度：</span><input name="longitude" type="text" id="longitude" value="" readonly="readonly" class="w70"/></div>
			      <div class="fl ml10"><span>纬度：</span><input name="latitude" type="text" id="latitude" value="" readonly="readonly" class="w70"/></div>
			      <div class="fl ml10"><span>缩放级别：</span><input name="zoom" type="text" id="zoom" value="" readonly="readonly" class="w70"/></div>
            </div>
            
          	<div class="unit">
				<label>商号LOGO：</label>
				<input type="hidden" name="header" id="header">
				<div style="float: left;">
				<img id="img" width="100" height="100" style="margin-left:5px; display:none;"/>
                <div class="button" id="upload_button"><div class="buttonContent"><button type="button">上传</button></div></div>
                </div>
			</div>
			
			<div class="unit">
				<label>品牌商家：</label>
				<SELECT name="isbrand" class="combox">
					<option value="0">否</option>
					<option value="1">是</option>
				</SELECT>
			</div>
			
			<div class="unit">
				<label>拍摄实景：</label>
				<SELECT name="real_scene" class="combox">
					<option value="0">否</option>
					<option value="1">是</option>
				</SELECT>
			</div>
            			
            <div class="unit">
				<label>资质认证：</label>
                <label class="radioButton"><input type="radio" name="qualifications" value="0" checked="checked">未验证</label>
                <label class="radioButton"><input type="radio" name="qualifications" value="1">已验证</label>
			</div>
            
            <div class="unit">
				<label>保证金：</label>
                <label class="radioButton"><input type="radio" name="security" value="0" checked="checked">未验证</label>
                <label class="radioButton"><input type="radio" name="security" value="1">已验证</label>
			</div>
			
			<div class="unit">
				<label>入驻时间：</label>
				<input type="text" name="addtime" class="date" readonly="true" format="yyyy-MM-dd HH:mm:ss" value="<?php echo toDate(time());?>" />
				<a class="inputDateButton" href="javascript:;">选择</a>
			</div>
			
			<div class="unit">
				<label>状态：</label>
				<SELECT name="status" class="combox">
					<option value="1">启用</option>
					<option value="0">禁用</option>
				</SELECT>
			</div>

		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>

</div>