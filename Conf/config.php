<?php
$config	= array(
    'URL_MODEL'=>1, // 如果你的环境不支持PATHINFO 请设置为3
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'192.168.1.186',
	'DB_NAME'=>'leho',
	'DB_USER'=>'root',
	'DB_PWD'=>'111111',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'lh_',
	'SITE_KEY'=>'cH3j029Q9F7z3fa7aD1z1baFfZ8Lega37pcG4p4C0m7n78eI7Z7Lb88Pes336ccw',
	//'APP_DEBUG'=>true,	//调试模式开关

	'VAR_PAGE'=>'pageNum',
	'DATA_CACHE_TABLE'=>'cache',
	'TOKEN_ON'              => false,     // 关闭令牌验证
	'APP_PLUGIN_ON'=>true,
	'LANG_SWITCH_ON' =>   true,
	'USER_AUTH_KEY'=>'authId',	// 用户认证SESSION标记
//	'TMPL_STRIP_SPACE'      => true,      //运营时开启
);

return $config;
?>