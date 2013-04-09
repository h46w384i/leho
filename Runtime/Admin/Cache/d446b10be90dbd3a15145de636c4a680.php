<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
$(document).ready(function(){
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
});
</script>
<div class="pageContent">
	<form method="post" action="__URL__/update/navTabId/__MODULE__" class="pageForm required-validate" enctype="multipart/form-data" onsubmit="return iframeCallback(this, dialogAjaxDone)">
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" id="advid" />
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>用户帐号：</label>
				<input type="text" class="required" minlength="2" name="name" value="<?php echo ($vo["name"]); ?>">
			</div>
            
			<div class="unit">
				<label>电子邮件：</label>
				<input type="text" class="required email"  name="mail" value="<?php echo ($vo["mail"]); ?>">
			</div>
            
			<div class="unit">
				<label>用户密码：</label>
                <input type="password" id="password" class="alphanumeric" minlength="6" name="password">
			</div>
            
			<div class="unit">
				<label>确认密码：</label>
                <input type="password" class="alphanumeric" minlength="6" name="repassword" equalto="#password">
			</div>
            
    		<div class="unit">
				<label>联系电话或手机：</label>
				<input type="text" class="phone" name="phone" value="<?php echo ($vo["phone"]); ?>">
			</div>
			<div class="unit">
				<label>真实姓名：</label>
				<input type="text" class="textInput" name="realname" value="<?php echo ($vo["realname"]); ?>">
			</div>
			
			<div class="unit">
				<label>生日：</label>
				<input type="text" name="birthday" class="date" readonly="true" format="yyyy-MM-dd" value="<?php echo ($vo["birthday"]); ?>" />
				<a class="inputDateButton" href="javascript:;">选择</a>
			</div>
			
			<div class="unit">
				<label>达人：</label>
				<SELECT name="daren" class="combox">
					<option value="0" <?php if(($vo["daren"])  ==  "0"): ?>selected<?php endif; ?>>否</option>
					<option value="1" <?php if(($vo["daren"])  ==  "1"): ?>selected<?php endif; ?>>是</option>
				</SELECT>
			</div>
            <div class="unit">
				<label>地址：</label>
				<input type="text" class="address" name="address" value="<?php echo ($vo["address"]); ?>">
			</div>
            <div class="unit">
				<label>自我介绍：</label>
				<textarea name="self_introduction" class="editor" rows="6" cols="55" tools="mfull" upLinkUrl="<?php echo U('Xheditor/fileUpload');?>" upLinkExt="zip,rar,txt" upImgUrl="<?php echo U('Xheditor/upLoadImg');?>" upImgExt="jpg,jpeg,gif,png" upFlashUrl="<?php echo U('Xheditor/fileUpload');?>" upFlashExt="swf" upMediaUrl="<?php echo U('Xheditor/fileUpload');?>" upMediaExt="avi"><?php echo ($vo["self_introduction"]); ?></textarea>
			</div>
          	<div class="unit">
				<label>用户头像：</label>
				<input type="hidden" name="header" id="header" value="<?php echo ($vo["header"]); ?>">
				<div style="float: left;">
                <?php if(!empty($vo["header"])): ?><img id="img" width="100" height="100" src="__ROOT__<?php echo ($vo["headerpath"]); ?>" style="margin-left:5px;"/>
                <?php else: ?>
				<img id="img" width="100" height="100" style="margin-left:5px; display:none;"/><?php endif; ?>
                <div class="button" id="upload_button"><div class="buttonContent"><button type="button">上传</button></div></div>
                </div>
			</div>
            
          	<div class="unit">
				<label>注册IP：</label>
				<input type="text" class="textInput" name="regip" value="<?php echo ($vo["regip"]); ?>">
			</div>
            
            <div class="unit">
				<label>邮箱验证：</label>
                <label class="radioButton"><input type="radio" name="mailstatus" value="0" <?php if(($vo["mailstatus"])  ==  "0"): ?>checked="checked"<?php endif; ?>>未验证</label>
                <label class="radioButton"><input type="radio" name="mailstatus" value="1" <?php if(($vo["mailstatus"])  ==  "1"): ?>checked="checked"<?php endif; ?>>已验证</label>
			</div>
            
            <div class="unit">
				<label>手机验证：</label>
                <label class="radioButton"><input type="radio" name="phonestatus" value="0" <?php if(($vo["phonestatus"])  ==  "0"): ?>checked="checked"<?php endif; ?>>未验证</label>
                <label class="radioButton"><input type="radio" name="phonestatus" value="1" <?php if(($vo["phonestatus"])  ==  "1"): ?>checked="checked"<?php endif; ?>>已验证</label>
			</div>
			
			<div class="unit">
				<label>性别：</label>
				<SELECT name="sex" class="combox">
					<option <?php if(($vo["sex"])  ==  "0"): ?>selected<?php endif; ?> value="0">保密</option>
					<option <?php if(($vo["sex"])  ==  "1"): ?>selected<?php endif; ?> value="1">男</option>
					<option <?php if(($vo["sex"])  ==  "2"): ?>selected<?php endif; ?> value="2">女</option>
				</SELECT>
			</div>
            
			<div class="unit">
				<label>状态：</label>
				<SELECT name="status" class="combox">
					<option <?php if(($vo["status"])  ==  "1"): ?>selected<?php endif; ?> value="1">启用</option>
					<option <?php if(($vo["status"])  ==  "0"): ?>selected<?php endif; ?> value="0">禁用</option>
				</SELECT>
			</div>
            
            <!-- <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$att): ++$i;$mod = ($i % 2 )?><div class="unit">
				<label><?php echo ($att["key"]); ?>：</label>
                <?php if($att['type'] == 0): ?>手动输入
                    <input type="text" name="<?php echo ($att["id"]); ?>" class="textInput" value="<?php echo ($att["val"]); ?>" /><?php endif; ?>
                
                <?php if($att['type'] == 1): ?><div style="width:475px; float:left">
                    <?php if(is_array($att['enum'])): foreach($att['enum'] as $key=>$enum_item): ?>单选
                     <label class="radioButton"><input type="radio" name="<?php echo ($att["id"]); ?>" value="<?php echo ($enum_item); ?>" <?php if($enum_item == $att['val']): ?>checked="checked"<?php endif; ?> /><?php echo ($enum_item); ?></label><?php endforeach; endif; ?>
                  </div><?php endif; ?>
                
                <?php if($att['type'] == 2): ?><select name="<?php echo ($att["id"]); ?>">
                        <?php if(is_array($att['enum'])): foreach($att['enum'] as $key=>$enum_item): ?>下拉
                        <option value="<?php echo ($enum_item); ?>" <?php if($enum_item == $att['val']): ?>selected="selected"<?php endif; ?>><?php echo ($enum_item); ?></option><?php endforeach; endif; ?>
                    </select><?php endif; ?>
                
                <?php if($att['type'] == 3): ?>文本域
                    <textarea rows="3" cols="55" name="<?php echo ($att["id"]); ?>" class="textInput"><?php echo ($att['val']); ?></textarea><?php endif; ?>
                
                <?php if($att['type'] == 4): ?><div style="width:475px; float:left">
                    <?php if(is_array($att['enum'])): foreach($att['enum'] as $key=>$enum_item): ?>多选
                    <label class="radioButton"><input type="checkbox" name="<?php echo ($att["id"]); ?>[]" value="<?php echo ($enum_item); ?>" <?php if(in_array($enum_item,$att['val'])): ?>checked="checked"<?php endif; ?> /><?php echo ($enum_item); ?></label><?php endforeach; endif; ?>
                  </div><?php endif; ?>     
                                               
                <?php if($att['type'] == 5): ?>图片域
                    <input type="file"  name="<?php echo ($att["id"]); ?>" class="valid" /> 
                    <?php if($att['val'] != ''): ?><a href="__ROOT__<?php echo ($att["val"]); ?>" target="_blank" >查看</a><?php endif; ?><?php endif; ?>
                
                <?php if($att['type'] == 6): ?>日历控件
                    <input type="text" readonly="true" format="yyyy-MM-dd" class="date textInput valid focus" name="<?php echo ($att["id"]); ?>" value="<?php echo ($att['val']); ?>"><a class="inputDateButton" href="#">选择</a><?php endif; ?>
                
                <?php if($att['type'] == 7): ?>编辑器
                    <textarea id="<?php echo ($att["id"]); ?>"  class="editor" name="<?php echo ($att["id"]); ?>" rows="6" cols="55" tools="mfull" upLinkUrl="<?php echo U('Xheditor/fileUpload');?>" upLinkExt="zip,rar,txt" upImgUrl="<?php echo U('Xheditor/upLoadImg');?>" upImgExt="jpg,jpeg,gif,png" upFlashUrl="<?php echo U('Xheditor/fileUpload');?>" upFlashExt="swf" upMediaUrl="<?php echo U('Xheditor/fileUpload');?>" upMediaExt="avi"><?php echo ($att["val"]); ?></textarea><?php endif; ?>
			</div><?php endforeach; endif; else: echo "" ;endif; ?> -->
            
		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>

</div>