<?php
// +----------------------------------------------------------------------
// | Author: jvfnet
// +----------------------------------------------------------------------

// 定义ThinkPHP框架路径
define('THINK_PATH', './ThinkPHP');
//定义项目名称和路径
define('APP_NAME', 'Index');
define('APP_PATH', './Index');
define('ROOT_PATH', str_replace("\\", '/', dirname(__FILE__)));
define('RUNTIME_PATH','./Runtime/Index/');
define('STRIP_RUNTIME_SPACE', false);
//如果没安装，跳转到安装
if (!file_exists( ROOT_PATH."/Public/install.lock" ) ){
	header( "Location:./install/index.php" );
}

// 加载框架入口文件
require(THINK_PATH."/ThinkPHP.php");
//实例化一个网站应用实例
App::run();
?>