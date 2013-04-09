<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<div class="panel" defH="90">
		<h1>模板配置</h1>
		<div>
            <form method="post" action="__URL__/save/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone)">
                <div class="pageFormContent">
                    <div class="unit">
                        <label>选择模板：</label>
                        <select  class="combox" name="tpl">
                            <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): ++$i;$mod = ($i % 2 )?><?php if(($v != '.') and ($v != '..')): ?><option value="<?php echo ($v); ?>" <?php if(($v)  ==  $currtpl): ?>selected="selected"<?php endif; ?>><?php echo ($v); ?></option><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
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
	</div>
	
	<div style="clear:both;"></div>
</div>