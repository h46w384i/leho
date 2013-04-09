<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
<script src="__PUBLIC__/dwz/js/baidumap.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	try{
	<?php if(($vo["latitude"] != '') AND ($vo["longitude"] != '')): ?>initialize(<?php echo ($vo["latitude"]); ?>,<?php echo ($vo["longitude"]); ?>,<?php echo ($vo["zoom"]); ?>);
	addTags(<?php echo ($vo["latitude"]); ?>,<?php echo ($vo["longitude"]); ?>,"<?php echo ($vo["address"]); ?>","map_canvas",<?php echo ($vo["zoom"]); ?>);
	<?php else: ?> 
	initialize();<?php endif; ?>
	}catch(e){
		
	}
	new AjaxUpload('#upload_button', {
	    action: APP+'/Xheditor/goodsImgLoad',
	    name: 'images',
	    onSubmit : function(file , ext){
	        if (ext && /^(jpg|png|jpeg|gif)$/.test(ext)){
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
	    	insertGoodsImg(data);
	        this.enable();
	    }
	});
	imgBoxdrag();
	
	$('input[name="payment"]').click(function(){
		var type = $('input[name="payment"]:checked').val();
		if(type == 0){
			$('#price').show();
			$('#deposit').hide();
		}else if(type == 1){
			$('#price').hide();
			$('#deposit').show();
		}
	});
});
function selectExpand_group(Id,Gid){
	var url = "__URL__/expand/id/"+ Id +"/gid/"+ Gid;
	$("#expandBox", $.pdialog.getCurrent()).loadUrl(url);
}
</script>
	<form method="post" action="__URL__/update/navTabId/<?php echo (($_REQUEST["module"])?($_REQUEST["module"]):__MODULE__); ?>" class="pageForm required-validate" enctype="multipart/form-data" onsubmit="return iframeCallback(this, dialogAjaxDone)">
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
		<input type="hidden" name="audit" value="<?php echo ($vo["audit"]); ?>">
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>商品标题：</label>
				<input type="text" class="required" name="title" style="width: 385px;" value="<?php echo ($vo["title"]); ?>">
			</div>
            
			<div class="unit">
				<label>商品简略标题：</label>
				<input type="text" class="required" name="short_title" maxlength="20" style="width: 385px;" value="<?php echo ($vo["short_title"]); ?>">
			</div>
            
            <div class="unit">
				<label>分类：</label>
				<SELECT name="cid" class="combox">
					<option value="">无</option>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><?php $n = (substr_count($v['path'],',') - 1) * 24 + 3 ?>
						<option value="<?php echo ($v["id"]); ?>" <?php if(($v["id"])  ==  $vo['cid']): ?>selected="selected"<?php endif; ?>><?php echo str_pad('∟',$n,'&nbsp;',STR_PAD_LEFT);?><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</SELECT>
			</div>
         
			<div class="unit">
				<label>地区：</label>
				<SELECT name="rid" class="combox">
					<option value="">无</option>
					<?php if(is_array($region)): $i = 0; $__LIST__ = $region;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><?php $n = (substr_count($v['path'],',') - 1) * 24 + 3 ?>
						<option value="<?php echo ($v["id"]); ?>" <?php if(($v["id"])  ==  $vo['rid']): ?>selected="selected"<?php endif; ?>><?php echo str_pad('∟',$n,'&nbsp;',STR_PAD_LEFT);?><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</SELECT>
			</div>
			<div class="unit">
				<label>发布商家：</label>
				<input type="hidden" name="promulgator" group="businesses" field="id" value="<?php echo ($vo["promulgator"]); ?>">
				<input name="businesses_name" type="text" readonly="readonly" group="businesses" field="name" value="<?php echo (getParent('Businesses',$vo["promulgator"])); ?>" />
				<a class="btnLook" href="<?php echo U('Businesses/lookUp/group/businesses/dialogId/'.MODULE_NAME.'_'.ACTION_NAME);?>" target="dialog" rel="businesses_lookup">查找带回</a>
			</div>
			<div class="unit">
				<label>排序：</label>
				<input type="text" class="digits textInput valid" name="sort" value="<?php echo ($vo["sort"]); ?>">
			</div>
			
			<div class="unit">
				<label>数量：</label>
				<input type="text" class="digits textInput valid" name="num" value="<?php echo ($vo["num"]); ?>">
			</div>
			
			<div class="unit">
				<label>限购：</label>
				<input type="text" class="digits textInput valid" name="onenum" value="<?php echo ($vo["onenum"]); ?>">
				<span>(单用户购买数量)</span>
			</div>
			
			<div class="unit">
				<label>原价：</label>
				<input type="text" class="number textInput valid" name="original" value="<?php echo ($vo["original"]); ?>">
			</div>
			
			<?php if(C('sysconfig.distribution_goods_open') == 1): ?><div class="unit">
				<label>佣金类型：</label>
				<label class="radioButton"><input type="radio" name="commission_type" value="0" <?php if(($vo["commission_type"])  ==  "0"): ?>checked="checked"<?php endif; ?> />固定</label>
				<label class="radioButton"><input type="radio" name="commission_type" value="1" <?php if(($vo["commission_type"])  ==  "1"): ?>checked="checked"<?php endif; ?> />比例</label>
			</div>
			
			<div class="unit">
				<label>佣金：</label>
				<input type="text" class="number textInput valid" name="commission" value="<?php echo ($vo["commission"]); ?>">
			</div><?php endif; ?>
			
			<div class="unit">
				<label>支付方式：</label>
				<label class="radioButton"><input type="radio" name="payment" value="0" <?php if(($vo["payment"])  ==  "0"): ?>checked="checked"<?php endif; ?> />现价</label>
				<label class="radioButton"><input type="radio" name="payment" value="1" <?php if(($vo["payment"])  ==  "1"): ?>checked="checked"<?php endif; ?> />定金</label>
			</div>
			
			<div class="unit">
				<label id="price" <?php if(($vo["payment"])  ==  "1"): ?>style="display: none;"<?php endif; ?>>现价：</label>
				<label id="deposit" <?php if(($vo["payment"])  ==  "0"): ?>style="display: none;"<?php endif; ?>>定金：</label>
				<input type="text" class="number textInput valid" name="price" value="<?php echo ($vo["price"]); ?>">
			</div>
			
			<div class="unit">
				<label>结束时间：</label>
				<input type="text" name="finishtime" class="date" readonly="true" format="yyyy-MM-dd HH:mm:ss" value="<?php echo ($vo["finishtime"]); ?>" />
				<a class="inputDateButton" href="javascript:;">选择</a>
			</div>
			
			<div class="unit">
				<label><?php echo C("sysconfig.site_couponname");?>前缀：</label>
				<input type="text" name="pre" value="<?php echo ($vo["pre"]); ?>">
			</div>
            
            <div class="unit">
				<label><?php echo C("sysconfig.site_couponname");?>有效期：</label>
				<input type="text" name="starttime" class="date" readonly="true" value="<?php echo ($vo["starttime"]); ?>" />
				<a class="inputDateButton" href="javascript:;">选择</a>
				<span style="float: left;" >&nbsp;～&nbsp;</span>
				<input type="text" name="endtime" class="date" readonly="true" value="<?php echo ($vo["endtime"]); ?>"/>
				<a class="inputDateButton" href="javascript:;">选择</a>
			</div>
            
   			<div class="unit">
				<label>SEO关键字：</label>
				<textarea rows="2" cols="60" name="keywords" class="textInput"><?php echo ($vo["keywords"]); ?></textarea>
			</div>
			
			<div class="unit">
				<label>SEO描述：</label>
				<textarea rows="2" cols="60" name="description" class="textInput"><?php echo ($vo["description"]); ?></textarea>
			</div>
			
			<div class="unit">
				<label>内容：</label>
				<textarea class="editor" name="detail" rows="15" cols="55" tools="mfull"
					upLinkUrl="<?php echo U('Xheditor/fileUpload');?>" upLinkExt="zip,rar,txt" 
					upImgUrl="<?php echo U('Xheditor/upLoadImg');?>" upImgExt="jpg,jpeg,gif,png" 
					upFlashUrl="<?php echo U('Xheditor/fileUpload');?>" upFlashExt="swf"
					upMediaUrl="<?php echo U('Xheditor/fileUpload');?>" upMediaExt="avi">
					<?php echo ($vo["detail"]); ?>
				</textarea>
			</div>
            <div class="unit">
				<label>电话：</label>
				<input type="text" class="required textInput" name="tel" id="tel" style="width:330px;" value="<?php echo ($vo["tel"]); ?>">
			</div>
            <div class="unit">
				<label>地址：</label>
				<input type="text" class="required textInput" name="address" id="address" style="width:330px;" value="<?php echo ($vo["address"]); ?>"><input type="button" value="标记" onClick="codeAddress()"><input onClick="showMarker();" type="button" value="显示标记"/>
			</div>
			<div class="unit">
				<label>地图：</label>
				<div id="map_canvas"></div>
			</div>
            <div class="unit">
                <label>地图属性：</label>
                <div class="fl"><span>经度：</span><input name="longitude" type="text" id="longitude" value="<?php echo ($vo["longitude"]); ?>" readonly="readonly" class="w70"/></div>
                <div class="fl ml10"><span>纬度：</span><input name="latitude" type="text" id="latitude" value="<?php echo ($vo["latitude"]); ?>" readonly="readonly" class="w70"/></div>
                <div class="fl ml10"><span>缩放级别：</span><input name="zoom" type="text" id="zoom" value="<?php echo ($vo["zoom"]); ?>" readonly="readonly" class="w70"/></div>
            </div>
			<div class="unit">
				<label>状态：</label>
				<SELECT name="status" class="combox">
					<option value="1" <?php if(($vo["state"])  ==  "1"): ?>selected="selected"<?php endif; ?>>启用</option>
					<option value="0" <?php if(($vo["state"])  ==  "0"): ?>selected="selected"<?php endif; ?>>禁用</option>
				</SELECT>
			</div>
			
			<div class="unit">
				<label>图片：</label>
				<div style="float: left;">
				<div class="button" id="upload_button"><div class="buttonContent"><button type="button">上传</button></div></div>
				</div>
			</div>
			
			<div class="unit">
				<label>已上传图片：</label>
                <div style="width:475px; float:left">
				<ul id="imgBox">
				<?php if(is_array($ardata)): $i = 0; $__LIST__ = $ardata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vm): ++$i;$mod = ($i % 2 )?><li class="sortableitem">
						<div class="jvf_clos"><span onclick="deleteImg(this);">×</span></div>
						<input type="hidden" name="imgs[]" value="<?php echo ($vm["accessoryid"]); ?>">
						<img src="__ROOT__<?php echo ($vm["thumbnail"]); ?>"/>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
                </div>
                
			</div>
            
            <!-- <div class="unit">
                <label>商品扩展:</label>
                <select name="egid" class="" onchange="selectExpand_group(this.value,<?php echo ($vo["id"]); ?>)">
                    <option value="0">请选择</option>
                    <?php if(is_array($expand_groupList)): $i = 0; $__LIST__ = $expand_groupList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($item["id"]); ?>"  <?php if(($item["id"])  ==  $vo['egid']): ?>selected="selected"<?php endif; ?>><?php echo ($item["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div id="expandBox">
            <?php if(is_array($expand)): $i = 0; $__LIST__ = $expand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$att): ++$i;$mod = ($i % 2 )?><div class="unit">
				<label><?php echo ($att["key"]); ?>：</label>
                <?php if($att['type'] == 0): ?>手动输入
                    <input type="text" name="<?php echo ($att["id"]); ?>" class="textInput" value="<?php echo ($att["val"]); ?>" /><?php endif; ?>
                
                <?php if($att['type'] == 1): ?><div style="width:475px; float:left">
                    <?php if(is_array($att['enum'])): foreach($att['enum'] as $key=>$enum_item): ?>单选
                    <label class="radioButton"><input type="radio" name="<?php echo ($att["id"]); ?>" value="<?php echo ($enum_item); ?>"  <?php if($enum_item == $att['val']): ?>checked="checked"<?php endif; ?> /><?php echo ($enum_item); ?></label><?php endforeach; endif; ?>
                  </div><?php endif; ?>
                
                <?php if($att['type'] == 2): ?><select name="<?php echo ($att["id"]); ?>">
                        <?php if(is_array($att['enum'])): foreach($att['enum'] as $key=>$enum_item): ?>下拉
                        <option value="<?php echo ($enum_item); ?>" <?php if($enum_item == $att['val']): ?>selected="selected"<?php endif; ?>><?php echo ($enum_item); ?></option><?php endforeach; endif; ?>
                    </select><?php endif; ?>
                
                <?php if($att['type'] == 3): ?>文本域
                    <textarea rows="3" cols="55" name="<?php echo ($att["id"]); ?>" class="textInput"><?php echo ($att['val']); ?></textarea><?php endif; ?>
                
                <?php if($att['type'] == 4): ?><div style="width:475px; float:left">
                    <?php if(is_array($att['enum'])): foreach($att['enum'] as $key=>$enum_item): ?>多选
                    <label class="radioButton"><input type="checkbox" name="<?php echo ($att["id"]); ?>[]" value="<?php echo ($enum_item); ?>"  <?php if(in_array($enum_item,$att['val'])): ?>checked="checked"<?php endif; ?> /><?php echo ($enum_item); ?></label><?php endforeach; endif; ?>
                  </div><?php endif; ?>     
                                               
                <?php if($att['type'] == 5): ?>图片域
                    <input type="file"  name="<?php echo ($att["id"]); ?>" class="valid" /> 
                    <?php if($att['val'] != ''): ?><a href="__ROOT__<?php echo ($att["val"]); ?>" target="_blank" >查看</a><?php endif; ?><?php endif; ?>
                
                <?php if($att['type'] == 6): ?>日历控件
                    <input type="text" readonly="true" format="yyyy-MM-dd" class="date textInput readonly valid focus" name="<?php echo ($att["id"]); ?>" value="<?php echo ($att['val']); ?>"><a class="inputDateButton" href="#">选择</a><?php endif; ?>
                
                <?php if($att['type'] == 7): ?>编辑器
                    <textarea id="<?php echo ($att["id"]); ?>"  class="editor" name="<?php echo ($att["id"]); ?>" rows="6" cols="55" tools="mfull" upLinkUrl="<?php echo U('Xheditor/fileUpload');?>" upLinkExt="zip,rar,txt" upImgUrl="<?php echo U('Xheditor/upLoadImg');?>" upImgExt="jpg,jpeg,gif,png" upFlashUrl="<?php echo U('Xheditor/fileUpload');?>" upFlashExt="swf" upMediaUrl="<?php echo U('Xheditor/fileUpload');?>" upMediaExt="avi"><?php echo ($att["val"]); ?></textarea><?php endif; ?>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div> -->
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
	
</div>