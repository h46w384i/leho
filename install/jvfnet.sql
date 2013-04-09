-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 03 月 13 日 01:36
-- 服务器版本: 5.1.28
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `leho`
--

-- --------------------------------------------------------

--
-- 表的结构 `jvf_access`
--

CREATE TABLE IF NOT EXISTS `jvf_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `pid` smallint(6) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `jvf_access`
--

INSERT INTO `jvf_access` (`role_id`, `node_id`, `level`, `pid`, `module`) VALUES
(1, 1, 1, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_accessory`
--

CREATE TABLE IF NOT EXISTS `jvf_accessory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `thumbnail_width` int(11) NOT NULL,
  `thumbnail_height` int(11) NOT NULL,
  `path_width` int(11) NOT NULL,
  `path_height` int(11) NOT NULL,
  `origin_width` int(11) NOT NULL,
  `origin_height` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `uploadtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_accessory`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_accessory_relation`
--

CREATE TABLE IF NOT EXISTS `jvf_accessory_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accessoryid` int(11) NOT NULL,
  `relationid` int(11) NOT NULL,
  `table` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `accessoryid` (`accessoryid`),
  KEY `relationid` (`table`,`relationid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_accessory_relation`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_advertising`
--

CREATE TABLE IF NOT EXISTS `jvf_advertising` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` mediumint(8) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` text NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1: 图片 2:flash 3:自定义代码',
  `status` tinyint(4) NOT NULL,
  `url` varchar(255) NOT NULL,
  `click_count` int(11) NOT NULL,
  `desc` text NOT NULL,
  `sort` int(11) DEFAULT '0',
  `adv_start_time` int(11) DEFAULT '0',
  `adv_end_time` int(11) DEFAULT '0',
  `is_vote` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `position_id` (`position_id`),
  KEY `inx_adv_001` (`status`,`position_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 导出表中的数据 `jvf_advertising`
--

INSERT INTO `jvf_advertising` (`id`, `position_id`, `name`, `code`, `type`, `status`, `url`, `click_count`, `desc`, `sort`, `adv_start_time`, `adv_end_time`, `is_vote`) VALUES
(12, 4, '应用中心横幅2', '/Public/upload/img/adv/4fe91e09d6c04.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(11, 4, '应用中心横幅1', '/Public/upload/img/adv/4fe91df96fe39.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(10, 1, '首页中部3', '/Public/upload/img/adv/4fe0521116e44.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(5, 3, '首页底部1', '/Public/upload/img/adv/4fdfe63210069.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(6, 3, '首页底部2', '/Public/upload/img/adv/4fdfe64946c46.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(7, 3, '首页底部3', '/Public/upload/img/adv/4fdfe655c932b.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(8, 1, '首页中部1', '/Public/upload/img/adv/4fe04ff834779.gif', 1, 1, '', 0, '', 0, 0, 0, 0),
(9, 1, '首页中部2', '/Public/upload/img/adv/4fe0500851b51.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(13, 4, '应用中心横幅3', '/Public/upload/img/adv/4fe91e27afe56.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(14, 5, '商城顶部1', '/Public/upload/img/adv/4fed2b1519afc.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(15, 5, '商城顶部2', '/Public/upload/img/adv/4fed2a1c2d897.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(16, 5, '商城顶部3', '/Public/upload/img/adv/4fed2a3929085.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(17, 6, '商街1', '/Public/upload/file/adv/4ff18bdc4a2fa.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(18, 6, '商街2', '/Public/upload/file/adv/4ff18c0666af5.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(19, 6, '商街3', '/Public/upload/file/adv/4ff18c14a3d03.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(20, 6, '商街4', '/Public/upload/img/adv/4ff18c44b6d13.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(21, 7, '查询右1', '/Public/upload/img/adv/5020c3f9206d7.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(22, 7, '查找右2', '/Public/upload/img/adv/5020c40b023a2.jpg', 1, 1, '', 0, '', 0, 0, 0, 0),
(23, 8, '注册页视频', '<embed src="http://player.youku.com/player.php/sid/XMzMyODg4MjM2/v.swf" allowFullScreen="true" quality="high" width="330" height="275" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>', 3, 1, '', 0, '', 0, 0, 0, 0),
(24, 2, '首页顶部', '/Public/upload/img/adv/50a3068c70991.jpg', 1, 1, '', 0, '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_advertising_position`
--

CREATE TABLE IF NOT EXISTS `jvf_advertising_position` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` varchar(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `width` smallint(5) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `is_flash` tinyint(1) NOT NULL DEFAULT '0',
  `flash_style` varchar(60) NOT NULL,
  `style` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `jvf_advertising_position`
--

INSERT INTO `jvf_advertising_position` (`id`, `tagname`, `name`, `width`, `height`, `is_flash`, `flash_style`, `style`) VALUES
(1, 'index_middle', '首页中间广告', 980, 110, 1, 'redfocus', '<script type="text/javascript">\r\ndocument.write(''<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="[adv_position.width]" height="[adv_position.height]"><param name="allowScriptAccess" value="sameDomain"><param name="movie" value="[adv_path]"><param name="quality" value="high"><param name="bgcolor" value="#F0F0F0"><param name="menu" value="false"><param name=wmode value="opaque"><param name="FlashVars" value="pics=[adv_pics]&links=[adv_links]&borderwidth=[adv_position.width]&borderheight=[adv_position.height]&textheight=0"><embed src="[adv_path]" FlashVars="pics=[adv_pics]&links=[adv_links]&borderwidth=[adv_position.width]&borderheight=[adv_position.height]&textheight=0" quality="high" width="[adv_position.width]" height="[adv_position.height]" wmode="opaque" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>'');\r\n</script>'),
(2, 'index_top', '首页顶部', 1036, 286, 0, 'redfocus', '<table cellpadding="0" cellspacing="0">\r\n<tr>\r\n<foreach name="adv_list" item="adv">\r\n<td>{$adv.html}</td>\r\n</foreach>\r\n</tr>\r\n</table>'),
(3, 'index_footer', '首页底部', 980, 110, 1, 'redfocus', '<script type="text/javascript">\r\ndocument.write(''<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="[adv_position.width]" height="[adv_position.height]"><param name="allowScriptAccess" value="sameDomain"><param name="movie" value="[adv_path]"><param name="quality" value="high"><param name="bgcolor" value="#F0F0F0"><param name="menu" value="false"><param name=wmode value="opaque"><param name="FlashVars" value="pics=[adv_pics]&links=[adv_links]&borderwidth=[adv_position.width]&borderheight=[adv_position.height]&textheight=0"><embed src="[adv_path]" FlashVars="pics=[adv_pics]&links=[adv_links]&borderwidth=[adv_position.width]&borderheight=[adv_position.height]&textheight=0" quality="high" width="[adv_position.width]" height="[adv_position.height]" wmode="opaque" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>'');\r\n</script>'),
(4, 'app_top', '应用中心横幅', 730, 176, 1, 'redfocus', '<script type="text/javascript">\r\ndocument.write(''<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="[adv_position.width]" height="[adv_position.height]"><param name="allowScriptAccess" value="sameDomain"><param name="movie" value="[adv_path]"><param name="quality" value="high"><param name="bgcolor" value="#F0F0F0"><param name="menu" value="false"><param name=wmode value="opaque"><param name="FlashVars" value="pics=[adv_pics]&links=[adv_links]&borderwidth=[adv_position.width]&borderheight=[adv_position.height]&textheight=0"><embed src="[adv_path]" FlashVars="pics=[adv_pics]&links=[adv_links]&borderwidth=[adv_position.width]&borderheight=[adv_position.height]&textheight=0" quality="high" width="[adv_position.width]" height="[adv_position.height]" wmode="opaque" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>'');\r\n</script>'),
(5, 'mail_top', '商城顶部幻灯片', 602, 238, 1, 'pinkfocus', '<script type="text/javascript">\r\ndocument.write(''<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="[adv_position.width]" height="[adv_position.height]"><param name="allowScriptAccess" value="sameDomain"><param name="movie" value="[adv_path]"><param name="quality" value="high"><param name="bgcolor" value="#F0F0F0"><param name="menu" value="false"><param name=wmode value="opaque"><param name="FlashVars" value="pics=[adv_pics]&links=[adv_links]&borderwidth=[adv_position.width]&borderheight=[adv_position.height]&textheight=0"><embed src="[adv_path]" FlashVars="pics=[adv_pics]&links=[adv_links]&borderwidth=[adv_position.width]&borderheight=[adv_position.height]&textheight=0" quality="high" width="[adv_position.width]" height="[adv_position.height]" wmode="opaque" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>'');\r\n</script>'),
(6, 'businesses_top', '商街顶部', 718, 120, 1, 'redfocus', '<script type="text/javascript">\r\ndocument.write(''<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="[adv_position.width]" height="[adv_position.height]"><param name="allowScriptAccess" value="sameDomain"><param name="movie" value="[adv_path]"><param name="quality" value="high"><param name="bgcolor" value="#F0F0F0"><param name="menu" value="false"><param name=wmode value="opaque"><param name="FlashVars" value="pics=[adv_pics]&links=[adv_links]&borderwidth=[adv_position.width]&borderheight=[adv_position.height]&textheight=0"><embed src="[adv_path]" FlashVars="pics=[adv_pics]&links=[adv_links]&borderwidth=[adv_position.width]&borderheight=[adv_position.height]&textheight=0" quality="high" width="[adv_position.width]" height="[adv_position.height]" wmode="opaque" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>'');\r\n</script>'),
(7, 'find_right', '查找页面右', 200, 0, 0, 'redfocus', '<table cellpadding="0" cellspacing="0">\r\n<tr>\r\n<foreach name="adv_list" item="adv" >\r\n<td>{$adv.html}</td>\r\n</foreach>\r\n</tr>\r\n</table>'),
(8, 'reg_video', '注册页视频', 330, 275, 0, 'redfocus', '<table cellpadding="0" cellspacing="0">\r\n<tr>\r\n<foreach name="adv_list" item="adv" >\r\n<td>{$adv.html}</td>\r\n</foreach>\r\n</tr>\r\n</table>');

-- --------------------------------------------------------

--
-- 表的结构 `jvf_album`
--

CREATE TABLE IF NOT EXISTS `jvf_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `sort` int(1) NOT NULL,
  `addtime` int(11) NOT NULL,
  `logo` int(11) NOT NULL,
  `enlarge` int(11) NOT NULL,
  `label` text NOT NULL,
  `lids` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_album`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_app`
--

CREATE TABLE IF NOT EXISTS `jvf_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `logo` int(11) NOT NULL,
  `url` text NOT NULL,
  `traffic` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `traffic` (`traffic`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_app`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_app_category`
--

CREATE TABLE IF NOT EXISTS `jvf_app_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `jvf_app_category`
--

INSERT INTO `jvf_app_category` (`id`, `name`, `sort`) VALUES
(1, '精品推荐', 0),
(2, '实用工具', 0),
(3, '游戏', 0);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_article`
--

CREATE TABLE IF NOT EXISTS `jvf_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `sort` int(11) DEFAULT NULL COMMENT '文章排序',
  `content` mediumtext COMMENT '文章内容',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'seo关键字',
  `description` text COMMENT '文章描述',
  `link` varchar(255) DEFAULT NULL COMMENT '外部链接',
  `type` tinyint(1) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '文章状态0禁用不可读1可读2仅会员可读',
  PRIMARY KEY (`id`),
  KEY `FK_Reference_37` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- 导出表中的数据 `jvf_article`
--

INSERT INTO `jvf_article` (`id`, `cid`, `title`, `sort`, `content`, `keywords`, `description`, `link`, `type`, `addtime`, `status`) VALUES
(1, 0, '服务条款', 0, '																				服务条款 内容								', '', '', 'http://www.baidu.com', 1, 0, 1),
(48, 11, '关于', 0, '', '', '', '', 0, 1338863944, 1),
(49, 14, '帮助', 0, '', '', '', '', 0, 1338863958, 1),
(50, 15, '更多', 0, 'sdfsdfsdfsdf', '', '', '', 0, 1338863964, 1),
(52, 11, '乐活协议', 0, '1. 通用条款<br><br><br>1.1 乐活在线（北京）网络技术有限公司（以下简称“爱乐活”）同意按照本协议的规定及其不时发布的操作规则提供基于互联网以及移动网的相关服务（以下称“网络服务”），为获得网络服务，服务使用人（以下称“用户”）应当同意本协议的全部条款并按照页面上的提示完成全部的注册程序。用户一旦使用爱乐活的相关服务，或者用户在进行注册程序过程中点击“立即注册”按钮，即表示用户完全理解并接受本协议项下的全部条款。<br>1.2 当用户使用爱乐活平台的各项功能时，用户应遵守爱乐活公布的与该功能相关的指引和规则。前述所有的指引和规则，均构成本使用协议的一部分。<br>1.3用户帐号和密码由用户负责保管，用户应当对以其用户帐号进行的所有活动和事件承担法律责任。<br>2. 服务内容<br><br><br>2.1爱乐活旨在为用户提供一站式城市生活消费指南，同时也是用户分享生活和发现美好的互动平台，爱乐活网络服务的具体内容由爱乐活根据实际情况提供，包括但不限于提供商家信息、消费资讯、优惠折扣、个人记录，分享社区、生活应用，在线订购与交易等网络服务。<br>2.2 用户理解并同意，爱乐活可根据实际情况随时调整网络平台上的服务内容、服务种类及服务形式。对于因平台调整给用户或任何第三方造成的负面影响或损失，爱乐活不承担任何责任。<br>2.3 用户理解，爱乐活仅提供相关的网络服务，除此之外与相关网络服务有关的设备（如个人电脑、手机、及其他与接入互联网或移动网有关的装置）及所需的费用（如为接入互联网而支付的电话费及上网费、为使用移动网而支付的手机费）均应由用户自行负担。<br>3. 服务变更、中断或终止<br><br><br>3.1 鉴于网络服务的特殊性，用户同意爱乐活有权随时变更、中断或终止部分或全部的网络服务，就上述变更、中断或终止行为，爱乐活无需通知用户，也无需对任何用户或任何第三方承担任何责任。<br>3.2 用户理解，爱乐活需要定期或不定期地对提供网络服务的平台（如互联网网站、移动网络等）或相关的设备进行检修或者维护，如因此类情况而造成网络服务在合理时间内的中断，爱乐活无需为此承担任何责任，但爱乐活应尽可能事先进行通告。<br>3.3 如发生下列任何一种情形，爱乐活有权随时中断或终止向特定用户提供本协议项下的网络服务（包括收费网络服务）而无需对该用户或任何第三方承担任何责任：<br>3.3.1 该用户提供的个人资料不真实；<br>3.3.2 该用户违反本协议或者用户违反爱乐活的各项使用规则；<br>3.3.3 该用户在使用收费网络服务时未按规定向爱乐活支付相应的服务费。<br>3.4 如用户注册的免费网络服务的帐号在任何连续90日内未实际使用，或者用户注册的收费网络服务的帐号在其订购的收费网络服务的服务期满之后连续180日内未实际使用，则爱乐活有权删除该帐号并停止为该用户提供相关的网络服务。<br>3.5用户在爱乐活注册的帐号昵称或个性域名如违反法律法规或国家政策的要求，或侵犯任何第三方合法权益或在先权利，爱乐活会修改该帐号昵称或个性域名，如用户不同意修改则爱乐活并有权收回该帐号昵称或个性域名。<br>4. 使用规则<br><br><br>4.1 用户在申请使用爱乐活网络服务时，应向爱乐活提供准确的个人资料，如个人资料有任何变动，用户应及时更新。<br>4.2 用户不应将其帐号、密码转让或出借予他人使用。如用户发现其帐号遭他人非法使用，应立即通知爱乐活。因病毒、黑客行为或用户的保管疏忽导致帐号、密码遭他人非法使用，爱乐活不承担任何责任。<br>4.3 用户同意爱乐活有权在提供网络服务过程中以各种方式投放商业性广告或其他任何类型的商业信息（包括但不限于在爱乐活网站的任何页面上投放广告）。<br>4.4 爱乐活鼓励用户充分利用爱乐活平台张贴并共享自己的信息。用户可以张贴从爱乐活个人主页或其他网站复制的图片、文字等内容，但这些内容必须位于公共领域内，或者用户自身拥有这些内容的合法使用权。用户对自己向爱乐活平台上载、展示或传播的内容承担全部法律责任。未经版权人许可，用户不得在爱乐活平台上张贴任何受版权保护的内容。用户对于其创作并在爱乐活上发布的合法内容依法享有著作权及相关权利。<br>4.5 对于用户上传到爱乐活平台上的任何内容，用户授予爱乐活在全世界范围内具有免费的、永久的、不可撤销的、非独家的许可以及再许可的权利，以使用、复制、修改、改编、出版、翻译、据以创作衍生作品、传播、表演和展示此等内容（整体或部分），和/或将此等内容编入当前已知的或以后开发的其他任何形式的作品、媒体或技术中。任何其他用户或网站需要转载该作品的，必须征得原文作者授权。<br>4.6用户了解爱乐活生活平台上的信息系用户自行发布，且可能存在风险和瑕疵。爱乐活生活平台仅作为您获取服务信息、物色交易对象、就商品和服务的交易进行协商的场所，但爱乐活无法控制交易所涉及的服务的质量、安全或合法性，商贸信息的真实性或准确性，以及交易各方履行其在服务协议中各项义务的能力。您应自行谨慎判断确定相关服务及/或信息的真实性、合法性和有效性，并自行承担因此产生的责任与损失。爱乐活平台上所展示的商品或服务价格、数量、优惠、促销、是否有货、有效期等信息随时都有可能发生变动对信息的变动情况亦不会做特别通知，用户应自行向相关商家咨询并确定关于商品或服务的最新信息。<br>4.7 用户在使用爱乐活网络服务过程中，必须遵循以下原则：<br>4.7.1 遵守中国有关的法律和法规；<br>4.7.2 遵守所有与网络服务有关的网络协议、规定和程序；<br>4.7.3 不得为任何非法目的而使用爱乐活网络服务；<br>4.7.4 不得以任何形式使用爱乐活网络服务侵犯任何人的商业利益，包括并不限于发布非经爱乐活许可的商业广告；<br>4.7.5 不得利用爱乐活网络服务进行任何可能对互联网或移动网正常运转造成不利影响的行为；<br>4.7.6 不得利用爱乐活提供的网络服务上传、展示或传播任何虚假的、骚扰性的、中伤他人的、辱骂性的、恐吓性的、庸俗淫秽、暴力的或其他任何违反国家法律法规规定的信息资料；<br>4.7.7 不得侵犯其他任何第三方的专利权、著作权、商标权、名誉权、隐私权或其他任何合法权益；<br>4.7.8 不得利用爱乐活网络服务系统进行任何不利于爱乐活的行为；<br>4.7.9 在任何情况下，用户上传到爱乐活的任何信息，不得违反法律法规的规定，或侵犯任何第三方的在先权利或其他合法权益。<br>4.8 爱乐活有权对用户使用爱乐活网络服务的情况进行审查和监督(包括但不限于对用户存储在爱乐活的内容进行审核)，如用户在使用网络服务时违反任何上述规定，爱乐活或其授权的人有权要求用户改正或直接采取一切必要的措施（包括但不限于更改或删除用户张贴的内容、暂停或终止用户使用网络服务的权利），以减轻用户的不当行为造成的影响。<br>4.9 爱乐活针对某些特定的爱乐活网络服务的使用通过各种方式（包括但不限于网页公告、站内信、电子邮件、短信提醒等）做出的任何声明、通知、警示等内容视为本协议的一部分，用户如使用该等爱乐活网络服务，视为用户同意该等声明、通知、警示的内容。<br>5. 知识产权<br><br><br>5.1 爱乐活提供的网络服务中包含的任何文本、图片、图形、音频和/或视频资料，均受版权、商标和/或其它财产所有权法律的保护。未经相关权利人同意，上述资料均不得在任何媒体直接或间接发布、播放、出于播放或发布目的而改写或再发行，或者被用于其他任何商业目的。所有这些资料或资料的任何部分仅可作为私人和非商业用途而保存在某台计算机内。爱乐活不就由上述资料产生或在传送或递交全部或部分上述资料过程中产生的延误、不准确、错误和遗漏或由此产生的任何损失，向用户或者任何第三方承担责任。<br>5.2 爱乐活自身在平台上制作、发布、传播的信息内容（包括文字、图片、网页版式设计、网站栏目等），以及爱乐活网站的专有内容、原创内容和其他通过授权取得的独占或独家内容，其版权归爱乐活所有，非经爱乐活许可，任何用户或者第三方不得复制、修改或者转载该内容，或者将其用于任何商业目的。<br>5.3 爱乐活为提供网络服务而使用的任何软件（包括但不限于软件中所含的任何图象、照片、动画、录像、录音、音乐、文字和附加程序、随附的帮助材料）的一切权利均属于该软件的著作权人，未经该软件的著作权人许可，用户不得对该软件进行反向工程（reverse engineer）、反向编译（decompile）或反汇编（disassemble）。<br>5.4 “爱乐活”、“leho”及“leho爱乐活”为爱乐活的商标，未经爱乐活的书面授权，任何用户或者第三方不得擅自使用，或以此牟取任何商业利益。<br>6. 隐私保护<br><br><br>6.1 关于爱乐活的隐私保护政策，请参见爱乐活《隐私权政策》。<br>7. 免责声明<br><br><br>7.1 用户同意，其使用爱乐活网络服务所存在的风险将完全由其自己承担；因其使用乐活网络服务而产生的一切后果也由其自己承担，爱乐活对用户不承担任何责任。<br>7.2 由于用户需求的多样化，爱乐活无法担保其提供的网络服务一定能满足用户的要求。爱乐活亦无法对网络服务的及时性、安全性和准确性作出保证或承诺。<br>7.3 爱乐活不保证为用户便利而设置的外部链接的准确性、完整性和可读性，同时，对于该等外部链接指向的不由爱乐活实际控制的任何网页上的内容，爱乐活不承担任何责任。<br>7.4 对于因不可抗力或爱乐活不能控制的原因造成的网络服务中断或其它缺陷，爱乐活不承担任何责任，但将尽力减少因此而给用户造成的损失和影响。<br>7.5 用户同意，对于爱乐活向用户提供的下列产品或者服务的质量缺陷本身及其引发的任何损失，爱乐活无需承担任何责任：<br>7.5.1 爱乐活向用户免费提供的各项网络服务；<br>7.5.2 爱乐活向用户赠送的任何产品或者服务；<br>7.5.3 爱乐活向收费网络服务用户附赠的各种产品或者服务。<br>7.6 用户通过爱乐活网站与广告商及其他第三方进行任何形式的通讯或商业往来，或参与促销活动、购买相关的商品或服务等，为用户与第三方的交易行为。用户因前述交易行为与第三方发生纠纷的，应由用户及第三方自行解决，爱乐活对此不承担任何责任。<br>8. 违约赔偿<br><br><br>8.1 用户同意保障和维护爱乐活及其他用户的利益，如因用户违反有关法律、法规或本协议项下的任何条款而给爱乐活或任何其他第三方造成损失，用户同意承担由此造成的损害赔偿责任。<br>9. 协议修改<br><br><br>9.1 爱乐活有权随时修改本协议的任何条款，一旦本协议的内容发生变动，爱乐活将会直接在爱乐活网站上公布修改之后的协议内容，该公布行为视为爱乐活已经通知用户修改内容。爱乐活也可通过其他适当方式向用户提示修改内容。<br>9.2 如果不同意爱乐活对本协议相关条款所做的修改，用户有权停止使用爱乐活的网络服务。如果用户继续使用网络服务，则视为用户接受爱乐活对本协议相关条款所做的修改。<br>10. 通知送达<br><br><br>10.1 本协议项下爱乐活对于用户所有的通知均可通过网页公告、电子邮件、手机短信或常规的信件传送等方式进行；该等通知于发送之日视为已送达收件人。<br>10.2 用户对于爱乐活的通知应当通过爱乐活对外正式公布的通信地址、传真号码、电子邮件地址等联系信息进行送达。<br>11. 法律管辖<br><br><br>11.1 本协议的订立、执行和解释及争议的解决均应适用中华人民共和国法律。<br>11.2 如双方就本协议内容或其执行发生任何争议，双方应尽量友好协商解决；协商不成时，任何一方均可向爱乐活所在地的人民法院提起诉讼。<br>12. 其他约定<br><br><br>12.1 如本协议中的任何条款无论因何种原因完全或部分无效或不具有执行力，本协议的其余条款仍有效并且有约束力。<br>12.2 本协议中的标题仅为方便而设，在不代表对本协议文本的解释。', '', '', '', 0, 1340609288, 1),
(53, 2, '公告1', 0, '公告1', '公告1', '公告1', '', 0, 1340954506, 1),
(54, 2, '公告2', 0, '公告2', '公告2', '公告2', '', 0, 1340954533, 1),
(55, 16, '如实描述', 0, '内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和内容和', 'seo关键字', 'seo描述', '', 0, 1340955355, 1),
(56, 16, '随时退', 0, '随时退', '随时退', '随时退', '', 0, 1340955385, 1),
(57, 16, '先行赔付', 0, '先行赔付', '先行赔付', '先行赔付', '', 0, 1340955437, 1),
(58, 16, '资质认证', 0, '资质认证', '资质认证', '资质认证', '', 0, 1340977363, 1),
(59, 16, '爱乐活平台服务协议', 0, '<ul style="margin: auto; padding: 2px 12px; text-align: left; color: rgb(51, 51, 51); font-family: arial, helvetica, sans-serif; line-height: 18px; "><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; ">&nbsp;您确认，在开始&quot;实名认证&quot;（以下简称认证）前，您已详细阅读了本协议所有内容，一旦您开始认证流程，即表示您充分理解并同意接受本协议的全部内容。</li><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; ">&nbsp;&nbsp;&nbsp;&nbsp;为了提高爱乐活生活平台服务的安全性和爱乐活商户（在爱乐活拥有店铺的用户，以下简称商户）身份的可信度，乐活行（北京）科技有限公司（以下简称爱乐活或本公司）向您提供认证服务。在您申请认证前，您必须先注册成为爱乐活用户。商户认证成功后，爱乐活将给予每个商户一个认证标识。本公司有权采取各种其认为必要手段对商户的身份进行识别。但是，作为普通的网络服务提供商，本公司所能采取的方法有限，而且在网络上进行商户身份识别也存在一定的困难，因此，本公司对完成认证的商户身份的准确性和绝对真实性不做任何保证。</li><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; ">&nbsp;&nbsp;&nbsp;&nbsp;本公司有权记录并保存您提供给本公司的信息和本公司获取的结果信息，亦有权根据本协议的约定向您或第三方提供您是否通过认证的结论以及您的身份信息。</li><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; "><h3 style=&quot;margin: 0px 0px 0px -7px; padding: 0px; font-size: 14px; font-weight: normal; &quot;>一、关于认证服务的理解与认同</h3><ol class="decimal" style="margin: auto; padding: 2px 12px; "><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">认证服务是由本公司提供的一项身份识别服务。除非本协议另有约定，一旦您的爱乐活账户完成了认证，相应的身份信息和认证结果将不因任何原因被修改或取消；如果您的身份信息在完成认证后发生了变更，您应向本公司提供相应有权部门出具的凭证，由本公司协助您变更您爱乐活账户的对应认证信息。</li><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">本公司有权单方随时修改或变更本协议内容，并通过爱乐活网站公告变更后的协议文本，无需单独通知您。本协议进行任何修改或变更后，您还继续使用爱乐活服务和/或认证服务的，即代表您已阅读、了解并同意接受变更后的协议内容；您如果不同意变更后的协议内容，应立即停用爱乐活服务和认证服务。</li></ol></li><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; "><h3 style=&quot;margin: 0px 0px 0px -7px; padding: 0px; font-size: 14px; font-weight: normal; &quot;>二、实名认证</h3><ol class="decimal" style="margin: auto; padding: 2px 12px; "><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">个体工商户类爱乐活商户向本公司申请认证服务时，应向本公司提供以下资料：中华人民共和国工商登记机关颁发的个体工商户营业执照或者其他身份证明文件。</li><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">企业类爱乐活商户向本公司申请认证服务时，应向本公司提供以下资料：中华人民共和国工商登记机关颁发的企业营业执照或者其他身份证明文件。</li><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">其他类爱乐活商户向本公司申请认证服务时，应向本公司提供以下资料：能够证明商户合法身份的证明文件，或者其他本公司认为必要的身份证明文件。</li><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">如爱乐活商户在认证后变更任何身份信息，则应在变更发生后三个工作日内书面通知本公司变更认证，否则本公司有权随时单方终止提供爱乐活服务，且因此造成的全部后果，由爱乐活商户自行承担。</li><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">通过实名认证的爱乐活商户不能自行修改已经认证的信息，包括但不限于企业名称、姓名以及身份证件号码等。</li></ol></li><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; "><h3 style=&quot;margin: 0px 0px 0px -7px; padding: 0px; font-size: 14px; font-weight: normal; &quot;>三、特别声明</h3><ol class="decimal" style="margin: auto; padding: 2px 12px; "><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">认证信息共享：<br>为了使您享有便捷的服务，您经由其它网站向本公司提交认证申请即表示您同意本公司为您核对所提交的全部认证信息，并同意本公司将是否通过认证的结果及相关认证信息提供给该网站。</li><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">认证资料的管理：<br>您在认证时提交给本公司的认证资料，即不可撤销的授权由本公司保留。本公司承诺除法定或约定的事由外，不公开或编辑或透露您的认证资料及保存在本公司的非公开内容用于商业目的，但本条第1项规定以及以下情形除外：<ol class="lower-roman" style="margin: auto; padding: 2px 12px; "><li style="margin: auto; padding: 2px 12px; list-style: lower-roman; text-align: left; ">您授权本公司透露的相关信息；</li><li style="margin: auto; padding: 2px 12px; list-style: lower-roman; text-align: left; ">本公司向国家司法及行政机关提供；</li><li style="margin: auto; padding: 2px 12px; list-style: lower-roman; text-align: left; ">本公司向本公司关联企业提供；</li><li style="margin: auto; padding: 2px 12px; list-style: lower-roman; text-align: left; ">第三方和本公司一起为商户提供服务时，该第三方向您提供服务所需的相关信息；</li><li style="margin: auto; padding: 2px 12px; list-style: lower-roman; text-align: left; ">基于解决您与第三方民事纠纷的需要，本公司有权向该第三方提供您的身份信息。</li></ol></li></ol></li><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; "><h3 style=&quot;margin: 0px 0px 0px -7px; padding: 0px; font-size: 14px; font-weight: normal; &quot;>四、第三方网站的链接</h3></li><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; ">&nbsp;&nbsp;&nbsp;&nbsp;为实现认证信息审查，爱乐活网站(www.leho.com)上可能包含了指向第三方网站的链接（以下简称&quot;链接网站&quot;）。&quot;链接网站&quot;非由本公司控制，对于任何&quot;链接网站&quot;的内容，包含但不限于&quot;链接网站&quot;内含的任何链接，或&quot;链接网站&quot;的任何改变或更新，本公司均不予负责。自&quot;链接网站&quot;接收的网络传播或其它形式之传送，本公司不予负责。</li><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; "><h3 style=&quot;margin: 0px 0px 0px -7px; padding: 0px; font-size: 14px; font-weight: normal; &quot;>五、不得为非法或禁止的使用</h3></li><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; ">&nbsp;&nbsp;&nbsp;&nbsp;接受本协议全部的说明、条款、条件是您申请认证的先决条件。您声明并保证，您不得为任何非法或为本协议、条件及须知所禁止之目的进行认证申请。您不得以任何可能损害、使瘫痪、使过度负荷或损害爱乐活网站或其他网站的服务、或干扰本公司或他人对于爱乐活认证申请的使用等方式使用认证服务。您不得经由非本公司许可提供的任何方式取得或试图取得任何资料或信息。</li><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; "><h3 style=&quot;margin: 0px 0px 0px -7px; padding: 0px; font-size: 14px; font-weight: normal; &quot;>六、有关免责</h3></li><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; ">&nbsp;&nbsp;&nbsp;&nbsp;下列情况时本公司无需承担任何责任：</li><li style="margin: 0px 0px 5px; padding: 0px; list-style: none; "><ol class="decimal" style="margin: auto; padding: 2px 12px; "><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">由于您将爱乐活账户密码告知他人或未保管好自己的密码或与他人共享爱乐活账户或任何其他非本公司的过错，导致您的个人资料泄露。</li><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">任何由于黑客攻击、计算机病毒侵入或发作、电信部门技术调整导致之影响、因政府管制而造成的暂时性关闭、由于第三方原因(包括不可抗力，例如国际出口的主干线路及国际出口电信提供商一方出现故障、火灾、水灾、雷击、地震、洪水、台风、龙卷风、火山爆发、瘟疫和传染病流行、罢工、战争或暴力行为或类似事件等)及其他非因本公司过错而造成的认证信息泄露、丢失、被盗用或被篡改等。</li><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">由于与本公司链接的其它网站所造成的爱乐活商户身份信息泄露及由此而导致的任何法律争议和后果。</li><li style="margin: auto; padding: 2px 12px; list-style: decimal; text-align: left; ">任何爱乐活商户向本公司提供错误、不完整、不实信息等造成不能通过认证或遭受任何其他损失，概与本公司无关。</li></ol></li></ul>', '爱乐活平台服务协议', '爱乐活平台服务协议', '', 0, 1343202870, 1);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_articles_category`
--

CREATE TABLE IF NOT EXISTS `jvf_articles_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `pid` int(11) DEFAULT NULL COMMENT '父类的ID',
  `level` int(11) NOT NULL COMMENT '等级',
  `path` varchar(255) DEFAULT NULL COMMENT '级别路径 例子 0,1,2,3',
  `type` tinyint(1) NOT NULL COMMENT '系统类型',
  `sort` int(11) DEFAULT NULL COMMENT '统计排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 导出表中的数据 `jvf_articles_category`
--

INSERT INTO `jvf_articles_category` (`id`, `name`, `pid`, `level`, `path`, `type`, `sort`) VALUES
(1, '帮助中心', 0, 0, '0,1,', 1, 0),
(14, '用户中心', 1, 1, '0,1,14,', 0, 1),
(15, '手机乐活', 1, 1, '0,1,15,', 0, 0),
(11, '了解乐活', 1, 1, '0,1,11,', 0, 2),
(2, '公告', 0, 0, '0,2,', 1, 0),
(16, '系统', 0, 0, '0,16,', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_attachment`
--

CREATE TABLE IF NOT EXISTS `jvf_attachment` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '附属表的ID',
  `key` varchar(255) DEFAULT NULL COMMENT '用于后台添加的用户附属属性的说明',
  `default` varchar(255) DEFAULT NULL COMMENT '附属说明的默认值',
  `type` tinyint(1) DEFAULT NULL COMMENT '附属属性的 类型\r\n            0手动输入 1单选 2下拉 3文本域 4图像',
  `enum` text COMMENT '枚举值 序列化存放 勇于多选下拉等',
  `explain` text COMMENT '字段说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_attachment`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_attention`
--

CREATE TABLE IF NOT EXISTS `jvf_attention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main` int(11) DEFAULT NULL,
  `was` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Reference_21` (`main`),
  KEY `FK_Reference_22` (`was`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_attention`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_businesses`
--

CREATE TABLE IF NOT EXISTS `jvf_businesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `legal` varchar(255) NOT NULL,
  `validity` int(11) NOT NULL,
  `license` varchar(255) NOT NULL,
  `fz_name` varchar(255) NOT NULL,
  `fz_address` varchar(255) NOT NULL,
  `fz_tel` varchar(255) NOT NULL,
  `fz_phone` varchar(255) NOT NULL,
  `fz_mail` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `bcid` int(11) NOT NULL,
  `video` text NOT NULL,
  `header` int(11) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `real_scene` tinyint(1) NOT NULL,
  `qualifications` tinyint(4) NOT NULL,
  `isbrand` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `security` tinyint(4) NOT NULL,
  `opening` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `characteristic` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `zoom` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_businesses`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_businesses_article`
--

CREATE TABLE IF NOT EXISTS `jvf_businesses_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_businesses_article`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_businesses_category`
--

CREATE TABLE IF NOT EXISTS `jvf_businesses_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `pid` int(11) DEFAULT NULL COMMENT '父类的ID',
  `path` varchar(255) DEFAULT NULL COMMENT '级别路径 例子 0,1,2,3',
  `level` int(11) NOT NULL,
  `isdefault` tinyint(1) NOT NULL COMMENT '1是0否',
  `type` tinyint(1) NOT NULL,
  `sort` int(11) DEFAULT NULL COMMENT '统计排序',
  `label` text NOT NULL,
  `lids` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `path` (`path`,`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_businesses_category`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_businesses_circle`
--

CREATE TABLE IF NOT EXISTS `jvf_businesses_circle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `label` text NOT NULL,
  `sort` int(11) NOT NULL,
  `lids` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_businesses_circle`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_businesses_recommend`
--

CREATE TABLE IF NOT EXISTS `jvf_businesses_recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_businesses_recommend`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_businesses_slide`
--

CREATE TABLE IF NOT EXISTS `jvf_businesses_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_businesses_slide`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_cache`
--

CREATE TABLE IF NOT EXISTS `jvf_cache` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cachekey` varchar(255) NOT NULL,
  `expire` int(11) NOT NULL,
  `data` blob,
  `datasize` int(11) DEFAULT NULL,
  `datacrc` int(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_cache`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_cash_log`
--

CREATE TABLE IF NOT EXISTS `jvf_cash_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `val` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_module` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_cash_log`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_chat_log`
--

CREATE TABLE IF NOT EXISTS `jvf_chat_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send` int(11) DEFAULT NULL,
  `receive` int(11) DEFAULT NULL,
  `content` text,
  `mark` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未读1已读',
  `delid` int(11) NOT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_chat_log`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_circle`
--

CREATE TABLE IF NOT EXISTS `jvf_circle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `label` text NOT NULL,
  `sort` int(11) NOT NULL,
  `lids` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_circle`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_collection`
--

CREATE TABLE IF NOT EXISTS `jvf_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `remark` text,
  `ispublic` tinyint(1) DEFAULT NULL COMMENT '0不公开1公开',
  `isfail` tinyint(1) DEFAULT '0' COMMENT '0未失效1失效',
  PRIMARY KEY (`id`),
  KEY `FK_Reference_19` (`gid`),
  KEY `FK_Reference_20` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_collection`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_comment`
--

CREATE TABLE IF NOT EXISTS `jvf_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `gid` int(11) DEFAULT NULL,
  `reviewer` int(11) DEFAULT NULL,
  `content` text,
  `type` tinyint(1) DEFAULT NULL COMMENT '0普通文章 1视频 2图片',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Reference_11` (`gid`),
  KEY `FK_Reference_12` (`reviewer`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_comment_reply`
--

CREATE TABLE IF NOT EXISTS `jvf_comment_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '回复ID',
  `cid` int(11) DEFAULT NULL COMMENT '评论ID',
  `uid` int(11) DEFAULT NULL,
  `reviewer` int(11) DEFAULT NULL,
  `content` text,
  `type` tinyint(1) DEFAULT NULL COMMENT '0普通文章 1视频 2图片',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Reference_10` (`cid`),
  KEY `FK_Reference_11` (`uid`),
  KEY `FK_Reference_12` (`reviewer`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_comment_reply`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_commission`
--

CREATE TABLE IF NOT EXISTS `jvf_commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_commission`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_commission_log`
--

CREATE TABLE IF NOT EXISTS `jvf_commission_log` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_commission_log`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_complaint`
--

CREATE TABLE IF NOT EXISTS `jvf_complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `other` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_complaint`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_complaint_item`
--

CREATE TABLE IF NOT EXISTS `jvf_complaint_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_complaint_item`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_coupon`
--

CREATE TABLE IF NOT EXISTS `jvf_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '优惠券ID',
  `gid` int(11) NOT NULL DEFAULT '0',
  `promulgator` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `oid` int(11) NOT NULL DEFAULT '0',
  `sn` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `bout` int(11) NOT NULL DEFAULT '0',
  `consume_time` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未使用 1 已使用 2 已冻结',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_coupon`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_daren_show`
--

CREATE TABLE IF NOT EXISTS `jvf_daren_show` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `reason` text NOT NULL,
  `sort` tinyint(1) NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_daren_show`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_distance_range`
--

CREATE TABLE IF NOT EXISTS `jvf_distance_range` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_distance_range`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_domain`
--

CREATE TABLE IF NOT EXISTS `jvf_domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `domain` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `domain` (`domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_domain`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_evaluate`
--

CREATE TABLE IF NOT EXISTS `jvf_evaluate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `odid` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_evaluate`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_evaluate_items`
--

CREATE TABLE IF NOT EXISTS `jvf_evaluate_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '等级结构id',
  `name` varchar(255) DEFAULT NULL COMMENT '评价的项 中文即可',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_evaluate_items`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_expand`
--

CREATE TABLE IF NOT EXISTS `jvf_expand` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '附属表的ID',
  `key` varchar(255) DEFAULT NULL COMMENT '用于后台添加的用户附属属性的说明',
  `default` varchar(255) DEFAULT NULL COMMENT '附属说明的默认值',
  `type` tinyint(1) DEFAULT NULL COMMENT '附属属性的 类型\r\n            0手动输入 1单选 2下拉 3文本域 4图像',
  `enum` text COMMENT '枚举值 序列化存放 勇于多选下拉等',
  `explain` text COMMENT '字段说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_expand`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_expand_group`
--

CREATE TABLE IF NOT EXISTS `jvf_expand_group` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `expand_ids` text NOT NULL,
  `sort` int(11) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_expand_group`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_friends`
--

CREATE TABLE IF NOT EXISTS `jvf_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL DEFAULT '0',
  `main` int(11) NOT NULL DEFAULT '0' COMMENT '主人',
  `friend` int(11) NOT NULL DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_friends`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_friends_group`
--

CREATE TABLE IF NOT EXISTS `jvf_friends_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_friends_group`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_friends_request`
--

CREATE TABLE IF NOT EXISTS `jvf_friends_request` (
  `main` int(11) NOT NULL DEFAULT '0',
  `friend` int(11) NOT NULL DEFAULT '0',
  `gid` int(11) NOT NULL DEFAULT '0',
  `note` varchar(100) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`main`,`friend`),
  KEY `friend` (`friend`),
  KEY `dateline` (`main`,`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `jvf_friends_request`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_front_cover`
--

CREATE TABLE IF NOT EXISTS `jvf_front_cover` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) NOT NULL,
  `logo` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isdefault` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_front_cover`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_front_cover_relation`
--

CREATE TABLE IF NOT EXISTS `jvf_front_cover_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_front_cover_relation`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_goods`
--

CREATE TABLE IF NOT EXISTS `jvf_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL COMMENT '地区的ID',
  `egid` int(11) NOT NULL COMMENT '商品扩展分组ID',
  `promulgator` int(11) DEFAULT NULL,
  `commission_type` tinyint(1) NOT NULL,
  `commission` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL COMMENT '排序',
  `title` varchar(255) DEFAULT NULL,
  `short_title` varchar(50) NOT NULL,
  `detail` mediumtext,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text,
  `tel` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `longitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `zoom` smallint(6) DEFAULT NULL,
  `original` varchar(255) DEFAULT '0.00',
  `price` varchar(255) DEFAULT '0.00' COMMENT '商品总价',
  `deposit` varchar(255) DEFAULT '0.00' COMMENT '商品定金',
  `payment` tinyint(1) DEFAULT NULL COMMENT '0全额 1 定金',
  `num` int(11) DEFAULT NULL,
  `onenum` int(11) DEFAULT NULL,
  `crrnum` int(11) NOT NULL COMMENT '已够数量',
  `pre` varchar(255) DEFAULT NULL,
  `starttime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `finishtime` int(11) NOT NULL,
  `audit` tinyint(1) NOT NULL COMMENT '审核0通过1未通过',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未上架 1上架',
  PRIMARY KEY (`id`),
  KEY `FK_Reference_13` (`promulgator`),
  KEY `FK_Reference_7` (`rid`),
  KEY `price` (`price`),
  KEY `deposit` (`deposit`),
  KEY `longitude` (`longitude`,`latitude`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_goods`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_goods_category`
--

CREATE TABLE IF NOT EXISTS `jvf_goods_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `pid` int(11) DEFAULT NULL COMMENT '父类的ID',
  `path` varchar(255) DEFAULT NULL COMMENT '级别路径 例子 0,1,2,3',
  `level` int(11) NOT NULL,
  `isdefault` tinyint(1) NOT NULL COMMENT '1是0否',
  `type` tinyint(1) NOT NULL,
  `sort` int(11) DEFAULT NULL COMMENT '统计排序',
  `label` text NOT NULL,
  `lids` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `path` (`path`,`sort`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 导出表中的数据 `jvf_goods_category`
--

INSERT INTO `jvf_goods_category` (`id`, `name`, `pid`, `path`, `level`, `isdefault`, `type`, `sort`, `label`, `lids`) VALUES
(1, '美食', 0, '0,1,', 0, 0, 0, 0, '', ''),
(2, '休闲娱乐', 0, '0,2,', 0, 0, 0, 0, '', ''),
(3, '婚嫁', 0, '0,3,', 0, 0, 0, 0, '', ''),
(4, '母婴', 0, '0,4,', 0, 0, 0, 0, '', ''),
(22, '蛋糕甜点', 1, '0,1,22,', 1, 1, 0, 0, '', ''),
(6, '咖啡', 1, '0,1,6,', 1, 1, 0, 0, '', ''),
(7, '火锅', 1, '0,1,7,', 1, 1, 0, 0, '', ''),
(8, '地方菜', 1, '0,1,8,', 1, 1, 0, 0, '', ''),
(9, '按摩足疗', 2, '0,2,9,', 1, 1, 0, 0, '', ''),
(10, '美容spa', 2, '0,2,10,', 1, 1, 0, 0, '', ''),
(11, '美发', 2, '0,2,11,', 1, 1, 0, 0, '', ''),
(12, '纤体瘦身', 2, '0,2,12,', 1, 1, 0, 0, '', ''),
(13, '婚纱摄影', 3, '0,3,13,', 1, 1, 0, 0, '', ''),
(14, '婚纱礼服', 3, '0,3,14,', 1, 1, 0, 0, '', ''),
(15, '婚庆套系', 3, '0,3,15,', 1, 1, 0, 0, '', ''),
(16, '女戒', 3, '0,3,16,', 1, 1, 0, 0, '', ''),
(17, '对戒', 3, '0,3,17,', 1, 1, 0, 0, '', ''),
(18, '亲子早教', 4, '0,4,18,', 1, 1, 0, 0, '', ''),
(19, '儿童摄影', 4, '0,4,19,', 1, 1, 0, 0, '', ''),
(20, '婴儿游泳', 4, '0,4,20,', 1, 1, 0, 0, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `jvf_goods_expand`
--

CREATE TABLE IF NOT EXISTS `jvf_goods_expand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL COMMENT '用户ID',
  `aid` int(11) DEFAULT NULL COMMENT '附属表ID',
  `val` mediumtext COMMENT '值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_goods_expand`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_goods_recommend`
--

CREATE TABLE IF NOT EXISTS `jvf_goods_recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_goods_recommend`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_group`
--

CREATE TABLE IF NOT EXISTS `jvf_group` (
  `id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `title` varchar(50) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0',
  `show` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `groups_nav_id` mediumint(6) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 导出表中的数据 `jvf_group`
--

INSERT INTO `jvf_group` (`id`, `name`, `title`, `create_time`, `update_time`, `status`, `sort`, `show`, `groups_nav_id`) VALUES
(2, 'Per', '后台权限', 1222841259, 0, 1, 0, 0, 4),
(6, 'Nav', '后台导航', 1222841259, 0, 1, 1, 0, 4),
(7, 'Config', '系统配置', 1320913163, 0, 1, 0, 1, 3),
(8, 'Sql_bak', '数据库操作', 1320913227, 0, 1, 1, 1, 3),
(10, 'Adv', '广告管理', 1321411321, 0, 1, 1, 1, 2),
(11, 'Link', '友情链接', 1321411363, 0, 1, 2, 1, 2),
(12, 'Article', '文章管理', 1322447254, 0, 1, 0, 1, 2),
(13, 'Member', '会员管理', 1322447483, 0, 1, 0, 1, 5),
(15, 'Other', '其他管理', 1322475702, 0, 1, 1, 1, 3),
(16, 'Goods_att', '商品附属', 1322476780, 0, 1, 1, 1, 6),
(17, 'Goods', '商品管理', 1322476809, 0, 1, 0, 1, 6),
(18, 'Goods_log', '商品日志', 1322548926, 0, 1, 1, 1, 6),
(19, 'Front_nav', '前台导航', 1322644143, 0, 1, 1, 1, 2),
(20, 'Member_log', '会员日志', 1322727493, 0, 1, 3, 1, 5),
(21, 'Member_info', '会员信息', 1322734168, 0, 1, 1, 1, 5),
(22, 'Share', '分享管理', 1340584271, 0, 1, 0, 1, 7),
(23, 'App', '应用管理', 1340621833, 0, 1, 0, 1, 7),
(24, 'Businesses', '商家管理', 1341214960, 0, 1, 0, 1, 6);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_groups_nav`
--

CREATE TABLE IF NOT EXISTS `jvf_groups_nav` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 导出表中的数据 `jvf_groups_nav`
--

INSERT INTO `jvf_groups_nav` (`id`, `name`, `status`, `sort`) VALUES
(4, '权限管理', 1, 5),
(2, '前台设置', 1, 4),
(3, '系统设置', 1, 6),
(5, '会员管理', 1, 0),
(6, '商品管理', 1, 1),
(7, '分享管理', 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_interest`
--

CREATE TABLE IF NOT EXISTS `jvf_interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_interest`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_label`
--

CREATE TABLE IF NOT EXISTS `jvf_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `logo` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_label`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_label_relation`
--

CREATE TABLE IF NOT EXISTS `jvf_label_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_label_relation`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_level`
--

CREATE TABLE IF NOT EXISTS `jvf_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_level`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_link`
--

CREATE TABLE IF NOT EXISTS `jvf_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inx_link_001` (`status`),
  KEY `inx_link_002` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_link`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_login_log`
--

CREATE TABLE IF NOT EXISTS `jvf_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_login_log`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_login_port`
--

CREATE TABLE IF NOT EXISTS `jvf_login_port` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `appkey` varchar(255) NOT NULL,
  `appsecret` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 导出表中的数据 `jvf_login_port`
--

INSERT INTO `jvf_login_port` (`id`, `name`, `remark`, `logo`, `appkey`, `appsecret`, `description`, `status`) VALUES
(1, '新浪微博', 'sina', '/Public/upload/img/site/4f72796e3138f.png', '', '', '使用新浪微博帐号登录本站<br>更多功能,敬请期待', 1),
(2, '人人网', 'renren', '/Public/upload/img/site/4f727954cb350.png', '', '', '使用人人网登录本站<br>更多功能，敬请期待', 0),
(3, '开心网', 'kaixin', '/Public/upload/img/site/4f7279b2bc0c8.png', '', '', '使用开心网帐号登录本站<br>更多功能，敬请期待', 0),
(4, '淘宝网', 'taobao', '/Public/upload/img/site/4f7279c575b45.png', '', '', '使用淘宝帐号登录本站<br>更多功能，敬请期待', 0),
(5, 'QQ空间', 'qq', '/Public/upload/img/site/4f7279e0a244a.png', '', '', '使用QQ帐号登录本站<br>更多功能，敬请期待', 1),
(6, '支付宝', 'alipay', '/Public/upload/img/site/4f7279ea371c8.png', '', '', '使用支付宝帐号登录本站<br>更多功能，敬请期待', 0);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_mail_log`
--

CREATE TABLE IF NOT EXISTS `jvf_mail_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receive` varchar(255) NOT NULL,
  `sendtime` int(9) NOT NULL,
  `content` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_mail_log`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_medal`
--

CREATE TABLE IF NOT EXISTS `jvf_medal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` int(1) NOT NULL,
  `mark` text NOT NULL,
  `talkaboutnum` int(11) NOT NULL,
  `waslikenum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `jvf_medal`
--

INSERT INTO `jvf_medal` (`id`, `name`, `logo`, `mark`, `talkaboutnum`, `waslikenum`) VALUES
(1, '清水芙蓉', 29, '天生丽质,臭美之路,任重道远', 1, 0),
(2, '千娇百媚', 30, '魅力指数很高啊 多多臭美', 10, 10);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_medal_relation`
--

CREATE TABLE IF NOT EXISTS `jvf_medal_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 导出表中的数据 `jvf_medal_relation`
--

INSERT INTO `jvf_medal_relation` (`id`, `uid`, `mid`) VALUES
(1, 1, 1),
(2, 12, 1),
(3, 12, 1),
(4, 12, 1),
(5, 12, 1),
(6, 12, 1),
(7, 12, 1),
(8, 12, 1),
(9, 12, 1),
(10, 12, 1),
(11, 12, 1),
(12, 12, 1),
(13, 12, 1),
(14, 12, 1),
(15, 12, 1),
(16, 12, 1),
(17, 12, 1),
(18, 12, 1),
(19, 12, 1),
(20, 12, 1),
(21, 12, 1),
(22, 12, 1),
(23, 12, 1),
(24, 12, 1),
(25, 12, 1),
(26, 12, 1),
(27, 12, 1),
(28, 12, 1),
(29, 12, 1);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_member`
--

CREATE TABLE IF NOT EXISTS `jvf_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '用户名',
  `realname` varchar(50) NOT NULL,
  `birthday` int(11) NOT NULL,
  `mail` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `phone` varchar(255) DEFAULT NULL COMMENT '手机号码 用于手机验证',
  `address` varchar(255) NOT NULL,
  `self_introduction` text NOT NULL,
  `header` int(11) DEFAULT '0' COMMENT '头像             存放 附件关系 查询时 需要联合查询出头像的文件名',
  `sex` tinyint(1) NOT NULL,
  `inviteid` int(11) NOT NULL DEFAULT '0',
  `regip` varchar(20) DEFAULT NULL,
  `regtime` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT '0',
  `mailstatus` tinyint(1) DEFAULT '0' COMMENT '邮箱验证状态  0未验证 1已验证',
  `phonestatus` tinyint(1) DEFAULT '0' COMMENT '手机验证状态  0未验证 1已验证',
  `online` tinyint(1) NOT NULL COMMENT '0隐身离线1在线2忙碌3离开',
  `cash` varchar(255) NOT NULL DEFAULT '0.00',
  `step` tinyint(1) NOT NULL,
  `daren` tinyint(1) NOT NULL,
  `daren_explain` varchar(255) NOT NULL,
  `sina_id` varchar(225) NOT NULL,
  `renren_id` varchar(225) NOT NULL,
  `kaixin_id` varchar(225) NOT NULL,
  `taobao_id` varchar(225) NOT NULL,
  `qq_id` varchar(225) NOT NULL,
  `alipay_id` varchar(225) NOT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '会员状态            0禁用 1启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_member`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_member_attachment`
--

CREATE TABLE IF NOT EXISTS `jvf_member_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户ID',
  `aid` int(11) DEFAULT NULL COMMENT '附属表ID',
  `val` text COMMENT '值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_member_attachment`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_member_comment`
--

CREATE TABLE IF NOT EXISTS `jvf_member_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `uid` int(11) DEFAULT NULL,
  `reviewer` int(11) DEFAULT NULL,
  `content` text,
  `type` tinyint(1) DEFAULT NULL COMMENT '0普通文章 1视频 2图片',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_member_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_member_feed`
--

CREATE TABLE IF NOT EXISTS `jvf_member_feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `content` text,
  `type` varchar(30) NOT NULL,
  `rel_id` int(11) NOT NULL DEFAULT '0',
  `rel_module` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `rel_id` (`rel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_member_feed`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_member_info`
--

CREATE TABLE IF NOT EXISTS `jvf_member_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `online` tinyint(1) NOT NULL,
  `index_privacy` tinyint(3) NOT NULL DEFAULT '0',
  `info_privacy` tinyint(3) NOT NULL DEFAULT '0',
  `friend_privacy` tinyint(3) NOT NULL DEFAULT '0',
  `good_privacy` tinyint(3) NOT NULL DEFAULT '0',
  `comment_privacy` tinyint(3) NOT NULL DEFAULT '0',
  `recommend_privacy` tinyint(3) NOT NULL DEFAULT '0',
  `info_isfeed` tinyint(3) NOT NULL DEFAULT '1',
  `avatar_isfeed` tinyint(3) NOT NULL DEFAULT '1',
  `good_isfeed` tinyint(3) NOT NULL DEFAULT '1',
  `friend_isfeed` tinyint(3) NOT NULL DEFAULT '1',
  `attention_isfeed` tinyint(3) NOT NULL DEFAULT '1',
  `order_isfeed` tinyint(3) NOT NULL DEFAULT '1',
  `comment_isfeed` tinyint(3) NOT NULL DEFAULT '1',
  `recommend_isfeed` tinyint(3) NOT NULL DEFAULT '1',
  `commentreply_isfeed` tinyint(3) NOT NULL DEFAULT '1',
  `commented_isfeed` tinyint(3) NOT NULL DEFAULT '1',
  `recommended_isfeed` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_member_info`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_member_label`
--

CREATE TABLE IF NOT EXISTS `jvf_member_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_member_label`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_member_location`
--

CREATE TABLE IF NOT EXISTS `jvf_member_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '0非默认1默认',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_member_location`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_message`
--

CREATE TABLE IF NOT EXISTS `jvf_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '消息的ID',
  `send` int(11) NOT NULL DEFAULT '0' COMMENT '发送着',
  `receive` int(11) NOT NULL DEFAULT '0' COMMENT '接收者ID',
  `content` text COMMENT '消息内容',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '消息类型            0,普通消息,1通知,',
  `mark` tinyint(1) NOT NULL DEFAULT '0' COMMENT '标记0未读1已读',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '消息添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_message`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_message_tpl`
--

CREATE TABLE IF NOT EXISTS `jvf_message_tpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(225) NOT NULL,
  `content` mediumtext,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 导出表中的数据 `jvf_message_tpl`
--

INSERT INTO `jvf_message_tpl` (`id`, `name`, `title`, `content`, `description`) VALUES
(1, 'getpwd', '取回密码邮件模板', '										<p></p>您好，[user]！<br />   		 <p style="color:#99cc00;"> <span style="color:#000000;">您在[webname]申请了重设密码，请点击下面的链接，然后根据页面提示完成密码重设：</span> 	<br /><br /> 	<span style="color:#000000;">链接:<a target="_blank" href="[url]">[url]</a></span> 	<br /> </p> <p style="color:#99cc00;"> <span style="color:#000000;">[webname] <a target="_blank" href="[website]">[website]</a></span> 	<br />&nbsp; <br /></p> <p></p>												', '[user]：会员名  [webname]：网站名称  [website]：网站网址  [url]：重置密码的链接  '),
(2, 'verification', '验证邮箱邮件模板', '															<p></p><a target="_blank" href="mailto:[mail]">[user]</a>，<span style="color:#000000;">您</span>好！<br /><br /><p style="color: rgb(153, 204, 0);"><span style="color:#000000;">感谢您注册[webname]，您的账号:</span><span style="color:#000000;"><a target="_blank" href="mailto:[mail]">[mail]</a></span></p><p style="color: rgb(153, 204, 0);"><span style="color:#000000;">点击下面的链接即可验证您的电子邮件：<br /></span></p><p style="color: rgb(153, 204, 0);"><a target="_blank" href="[url]">[url]</a></p><p style="color: rgb(153, 204, 0);"><span style="color:#000000;">(如果链接无法点击，请将它拷贝到浏览器的地址栏中。)</span></p><p style="color: rgb(153, 204, 0);"><span style="color:#000000;">[webname] <a target="_blank" href="[website]">[website]</a></span></p><p></p>												', '[user]：会员名  [mail]：会员邮箱  [webname]：网站名称  [website]：网站网址  [url]：邮箱验证的链接  '),
(3, 'success', '成功注册提示邮件模板', '					<p></p> <p>[user]，您好！</p> <p style="color:#99cc00;"> <span style="color:#000000;">您已经成为[webname]会员，请保留本邮件以备后用。</span><br /><br /><span style="color:#000000;">账户：</span>您的邮箱：[mail]<br /><span style="color:#000000;">密码：</span><span style="color:#000000;">您注册时输入的密码</span> </p> <p style="color:#99cc00;"> <span style="color:#000000;"><br /></span> </p> <p style="color:#99cc00;"> <span style="color:#000000;">[webname] 		<a target="_blank" href="[website]">[website]</a> 	</span> </p>  <p> </p>																', '[user]：会员名  [mail]：会员邮箱  [webname]：网站名称  [website]：网站网址   '),
(4, 'phone', '手机验证验证码发送模板', '					您好！感谢你注册[webname],您的验证码为：[code]。								', '[webname]：网站名称 [code]：验证码'),
(5, 'invitemail', '邀请邮件模板', '										您好！&nbsp;&nbsp; &nbsp; <br />&nbsp;&nbsp; &nbsp;你的朋友 [user] 邀请您来使用[webname]！<br />&nbsp;&nbsp; &nbsp;[webname] - [webdesc]！<br />&nbsp;&nbsp; &nbsp;现在注册，验证邮箱和手机号码后即可获得[verifycredits][creditsname]。第一次完成订单即可再获得[ordercredits][creditsname]！<br />&nbsp;&nbsp; &nbsp;您可以通过点击以下链接访问[webname]：<br />&nbsp;&nbsp; &nbsp;<a href="[url]">[url]</a>																				', '[user]：会员名  [webname]：网站名称  [webdesc]：网站描述  [creditsname]：网站积分名称  [verifycredits]：验证后送积分数  [ordercredits]：完成订单送积分数  [url]：邀请链接  '),
(6, 'shareinvite', '分享邀请链接文字模板', '我最近在[webname]上淘了很多东西，都是高品质，大折扣。你也来试试吧！', '[webname]：  网站名称'),
(7, 'referencesemail', '请求推荐邮件模板', '										您好！&nbsp;&nbsp; &nbsp; <br />&nbsp;&nbsp; &nbsp;你的朋友 [user] 邀请您来[webname]为他推荐他的商品！<br />&nbsp;&nbsp; &nbsp;[webname] - [webdesc]！<br />&nbsp;&nbsp; &nbsp;您可以通过点击以下链接进入[webname]，为其推荐商品：<br />&nbsp;&nbsp; &nbsp;<a href="[url]">[url]</a>																				', '[user]：会员名  [webname]：网站名称  [webdesc]：网站描述  [url]：请求推荐链接  '),
(8, 'sharereferences', '分享请求推荐链接文字模板', '我最近在[webname]发布了很多商品，都是高品质，大折扣。朋友们，快来帮我推荐下吧！								', '[webname]：  网站名称'),
(9, 'smscoupon', '优惠券短信通知模板', '您好，感谢您购买“[goodname]”，您的[bondname]序列号为[sn]，密码是[pw]，消费时请出示此短信。', '[user]：会员名  [webname]：网站名称  [goodname]：商品名称  [bondname]：优惠券名称  [sn]：序列号  [pw]：密码  [starttime]：团购券开始  [endtime]：团购券截止'),
(10, 'mailcoupon', '优惠券邮件通知模板', '您好，感谢您购买“[goodname]”，您的[bondname]序列号为[sn]，密码是[pw]，消费时请出示此短信。', '[user]：会员名  [webname]：网站名称  [goodname]：商品名称  [bondname]：优惠券名称  [sn]：序列号  [pw]：密码  [tel]：商家电话  [address]：商家地址  [starttime]：团购券开始  [endtime]：团购券截止'),
(11, 'paymentmail', '付款邮件通知模板', '					<p>[user]，您好！</p><p>[webname]通知您，您的订单：[order_sn] 付款 [money] 成功！ <br /></p><p style="color:#99cc00;"> <span style="color:#000000;">[webname] 	<a target="_blank" href="[website]">[website]</a> </span> </p> 							', '[user]：会员名  [webname]：网站名称  [website]：网站网址  [order_sn]：订单号  [money]：付款的金额 '),
(12, 'paymentsms', '付款短信通知模板', '					[webname]通知您，您的订单：[order_sn] 付款 [money] 成功！ <br />								', '[user]：会员名  [webname]：网站名称  [order_sn]：订单号  [money]：付款的金额'),
(13, 'couponuse_sms', '团购券消费提示短信模板', '					<p>你好，[user]。您序列号为[sn]的[bondname]已于[time]消费了。</p><p><br /></p>								', '[user]：会员名  [webname]：网站名称  [bondname]：优惠券名称  [sn]：序列号  [time]：使用时间'),
(14, 'couponuse_mail', '团购券消费提示邮件模板', '										<p>[user]，您好！</p><p>[webname]通知您，您序列号为[sn]的[bondname]已于[time]消费了！ <br /></p><p style="color:#99cc00;"> <span style="color:#000000;">[webname] 	<a target="_blank" href="[website]">[website]</a> </span> </p> 									', '[user]：会员名  [webname]：网站名称  [website]：网站网址  [bondname]：优惠券名称  [sn]：序列号  [time]：使用时间');

-- --------------------------------------------------------

--
-- 表的结构 `jvf_navigation`
--

CREATE TABLE IF NOT EXISTS `jvf_navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '1 主菜单 2顶部菜单 3底部菜单',
  `url` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `void` varchar(255) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `isblank` tinyint(1) DEFAULT NULL COMMENT '0不新窗口打开1新窗口打开',
  `isdefault` tinyint(1) DEFAULT NULL COMMENT '0不默认1默认',
  `status` tinyint(1) DEFAULT NULL COMMENT '0禁用 1启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 导出表中的数据 `jvf_navigation`
--

INSERT INTO `jvf_navigation` (`id`, `title`, `type`, `url`, `sort`, `action`, `void`, `rid`, `isblank`, `isdefault`, `status`) VALUES
(8, '关于爱乐活', 3, '', 0, NULL, NULL, NULL, 1, 0, 1),
(9, '联系我们', 3, '', 0, NULL, NULL, NULL, 1, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_node`
--

CREATE TABLE IF NOT EXISTS `jvf_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0',
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `group_id` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=632 ;

--
-- 导出表中的数据 `jvf_node`
--

INSERT INTO `jvf_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`, `type`, `group_id`) VALUES
(149, 'foreverdelete', '删除', 1, '', 0, 95, 3, 0, 0),
(40, 'Index', '默认模块', 1, '', 1, 1, 2, 0, 0),
(148, 'forbid', '禁用', 1, '', 0, 95, 3, 0, 0),
(147, 'resume', '恢复', 1, '', 0, 95, 3, 0, 0),
(146, 'index', '列表', 1, '', 0, 95, 3, 0, 0),
(171, 'foreverdelete', '删除', 1, '', 0, 105, 3, 0, 0),
(170, 'index', '列表', 1, '', 0, 105, 3, 0, 0),
(143, 'save', '保存', 1, '', 0, 94, 3, 0, 0),
(142, 'index', '列表', 1, '', 0, 94, 3, 0, 0),
(168, 'index', '列表', 1, '', 0, 93, 3, 0, 0),
(7, 'User', '后台用户', 1, '', 4, 1, 2, 0, 2),
(6, 'Role', '角色管理', 1, '', 3, 1, 2, 0, 2),
(2, 'Node', '节点管理', 1, '', 2, 1, 2, 0, 2),
(1, 'Admin', '后台管理', 1, '', 0, 0, 1, 0, 0),
(50, 'index', '默认首页', 1, '', 0, 40, 3, 0, 0),
(84, 'Group', '节点分组', 1, '', 5, 1, 2, 0, 6),
(85, 'Groups_nav', '导航菜单', 1, '', 6, 1, 2, 0, 6),
(87, 'Backup', '数据备份', 1, '数据库的备份、恢复等操作', 0, 1, 2, 0, 8),
(94, 'Sysconf_list', '系统配置', 1, '', 0, 1, 2, 0, 7),
(93, 'Tpl', '模板配置', 1, '', 0, 1, 2, 0, 7),
(95, 'Sysconf_group', '系统设置分组', 1, '', 0, 1, 2, 0, 7),
(96, 'Sysconf', '系统配置列表', 1, '', 0, 1, 2, 0, 7),
(98, 'Advertising_position', '广告位管理', 1, '', 0, 1, 2, 0, 10),
(99, 'Link', '友情链接', 1, '', 0, 1, 2, 0, 11),
(100, 'Advertising', '广告管理', 1, '', 0, 1, 2, 0, 10),
(101, 'Articles_category', '文章分类', 1, '', 0, 1, 2, 0, 12),
(102, 'Article', '文章管理', 1, '', 0, 1, 2, 0, 12),
(103, 'Member', '会员列表', 1, '', 0, 1, 2, 0, 13),
(105, 'Message_tpl', '消息模板', 1, '', 0, 1, 2, 0, 15),
(106, 'Goods_category', '商品分类', 1, '', 0, 1, 2, 0, 16),
(107, 'Region', '地区分类', 1, '', 0, 1, 2, 0, 15),
(108, 'Goods', '商品管理', 1, '', 0, 1, 2, 0, 17),
(110, 'Evaluate_items', '评价项', 1, '', 0, 1, 2, 0, 16),
(111, 'Evaluate', '评分日志', 1, '', 0, 1, 2, 0, 18),
(112, 'Comment', '评论日志', 1, '', 0, 1, 2, 0, 18),
(113, 'Coupon', '消费凭证', 1, '', 0, 1, 2, 0, 18),
(114, 'Order', '订单列表', 1, '', 0, 1, 2, 0, 18),
(115, 'Payment', '支付方式', 1, '', 0, 1, 2, 0, 15),
(116, 'Navigation', '导航管理', 1, '', 0, 1, 2, 0, 19),
(118, 'Login_log', '登录日志', 1, '', 0, 1, 2, 0, 20),
(119, 'Value_log', '积分日志', 1, '', 0, 1, 2, 0, 20),
(121, 'Message', '会员消息', 1, '', 0, 1, 2, 0, 21),
(122, 'Friends', '好友关系', 0, '', 0, 1, 2, 0, 21),
(123, 'Friends_group', '好友分组', 0, '', 0, 1, 2, 0, 21),
(124, 'Chat_log', '聊天日志', 1, '', 0, 1, 2, 0, 20),
(126, 'Attention', '会员关注', 1, '', 0, 1, 2, 0, 21),
(127, 'Remind', '会员提醒', 1, '', 0, 1, 2, 0, 21),
(128, 'Complaint_item', '投诉项', 0, '', 0, 1, 2, 0, 15),
(129, 'Complaint', '投诉举报', 0, '', 0, 1, 2, 0, 15),
(130, 'Recommend', '推荐日志', 1, '', 0, 1, 2, 0, 18),
(131, 'Comment_reply', '评论回复', 1, '', 0, 1, 2, 0, 18),
(132, 'Member_comment', '会员评价', 1, '', 0, 1, 2, 0, 21),
(133, 'Login_port', '登录接口', 1, '', 0, 1, 2, 0, 15),
(134, 'Cash_log', '现金日志', 1, '', 0, 1, 2, 0, 20),
(135, 'Account', '账户管理', 1, '', 0, 1, 2, 0, 13),
(136, 'Withdraw', '提现记录', 1, '', 0, 1, 2, 0, 20),
(137, 'Recharge', '充值记录', 1, '', 0, 1, 2, 0, 20),
(138, 'Order_details', '订单详情', 1, '', 0, 1, 2, 0, 18),
(139, 'Prepaid_card', '充值卡', 0, '', 0, 1, 2, 0, 15),
(140, 'Release', '发布商品', 1, '', 0, 1, 2, 0, 15),
(150, 'update', '更新', 1, '', 0, 95, 3, 0, 0),
(151, 'edit', '编辑', 1, '', 0, 95, 3, 0, 0),
(152, 'insert', '写入', 1, '', 0, 95, 3, 0, 0),
(153, 'add', '新增', 1, '', 0, 95, 3, 0, 0),
(154, 'index', '列表', 1, '', 0, 96, 3, 0, 0),
(155, 'resume', '恢复', 1, '', 0, 96, 3, 0, 0),
(156, 'forbid', '禁用', 1, '', 0, 96, 3, 0, 0),
(157, 'foreverdelete', '删除', 1, '', 0, 96, 3, 0, 0),
(158, 'update', '更新', 1, '', 0, 96, 3, 0, 0),
(159, 'edit', '编辑', 1, '', 0, 96, 3, 0, 0),
(160, 'insert', '写入', 1, '', 0, 96, 3, 0, 0),
(161, 'add', '新增', 1, '', 0, 96, 3, 0, 0),
(162, 'index', '列表', 1, '', 0, 87, 3, 0, 0),
(163, 'delete', '删除', 1, '', 0, 87, 3, 0, 0),
(164, 'backup', '备份', 1, '', 0, 87, 3, 0, 0),
(165, 'doBackUp', '执行备份', 1, '', 0, 87, 3, 0, 0),
(166, 'import', '导入', 1, '', 0, 87, 3, 0, 0),
(167, 'package', '打包', 1, '', 0, 87, 3, 0, 0),
(169, 'save', '保存', 1, '', 0, 93, 3, 0, 0),
(172, 'update', '更新', 1, '', 0, 105, 3, 0, 0),
(173, 'edit', '编辑', 1, '', 0, 105, 3, 0, 0),
(174, 'insert', '写入', 1, '', 0, 105, 3, 0, 0),
(175, 'add', '新增', 1, '', 0, 105, 3, 0, 0),
(176, 'index', '列表', 1, '', 0, 107, 3, 0, 0),
(177, 'foreverdelete', '删除', 1, '', 0, 107, 3, 0, 0),
(178, 'update', '更新', 1, '', 0, 107, 3, 0, 0),
(179, 'edit', '编辑', 1, '', 0, 107, 3, 0, 0),
(180, 'insert', '写入', 1, '', 0, 107, 3, 0, 0),
(181, 'add', '新增', 1, '', 0, 107, 3, 0, 0),
(238, 'resume', '恢复', 1, '', 0, 6, 3, 0, 0),
(183, 'index', '列表', 1, '', 0, 115, 3, 0, 0),
(184, 'resume', '恢复', 1, '', 0, 115, 3, 0, 0),
(185, 'forbid', '禁用', 1, '', 0, 115, 3, 0, 0),
(186, 'foreverdelete', '删除', 1, '', 0, 115, 3, 0, 0),
(187, 'update', '更新', 1, '', 0, 115, 3, 0, 0),
(188, 'edit', '编辑', 1, '', 0, 115, 3, 0, 0),
(189, 'insert', '写入', 1, '', 0, 115, 3, 0, 0),
(190, 'add', '新增', 1, '', 0, 115, 3, 0, 0),
(191, 'index', '列表', 1, '', 0, 128, 3, 0, 0),
(192, 'foreverdelete', '删除', 1, '', 0, 128, 3, 0, 0),
(193, 'update', '更新', 1, '', 0, 128, 3, 0, 0),
(194, 'edit', '编辑', 1, '', 0, 128, 3, 0, 0),
(195, 'insert', '写入', 1, '', 0, 128, 3, 0, 0),
(196, 'add', '新增', 1, '', 0, 128, 3, 0, 0),
(197, 'index', '列表', 1, '', 0, 129, 3, 0, 0),
(198, 'foreverdelete', '删除', 1, '', 0, 129, 3, 0, 0),
(199, 'update', '更新', 1, '', 0, 129, 3, 0, 0),
(200, 'edit', '编辑', 1, '', 0, 129, 3, 0, 0),
(201, 'insert', '写入', 1, '', 0, 129, 3, 0, 0),
(202, 'add', '新增', 1, '', 0, 129, 3, 0, 0),
(204, 'index', '列表', 1, '', 0, 133, 3, 0, 0),
(205, 'resume', '恢复', 1, '', 0, 133, 3, 0, 0),
(206, 'forbid', '禁用', 1, '', 0, 133, 3, 0, 0),
(207, 'foreverdelete', '删除', 1, '', 0, 133, 3, 0, 0),
(208, 'update', '更新', 1, '', 0, 133, 3, 0, 0),
(209, 'edit', '编辑', 1, '', 0, 133, 3, 0, 0),
(210, 'insert', '写入', 1, '', 0, 133, 3, 0, 0),
(211, 'add', '新增', 1, '', 0, 133, 3, 0, 0),
(212, 'index', '列表', 1, '', 0, 139, 3, 0, 0),
(213, 'foreverdelete', '删除', 1, '', 0, 139, 3, 0, 0),
(214, 'update', '更新', 1, '', 0, 139, 3, 0, 0),
(215, 'edit', '编辑', 1, '', 0, 139, 3, 0, 0),
(216, 'insert', '写入', 1, '', 0, 139, 3, 0, 0),
(217, 'down', '导出EXCEL', 1, '', 0, 139, 3, 0, 0),
(218, 'add', '新增', 1, '', 0, 139, 3, 0, 0),
(219, 'index', '列表', 1, '', 0, 140, 3, 0, 0),
(220, 'foreverdelete', '删除', 1, '', 0, 140, 3, 0, 0),
(221, 'update', '更新', 1, '', 0, 140, 3, 0, 0),
(222, 'edit', '编辑', 1, '', 0, 140, 3, 0, 0),
(223, 'insert', '写入', 1, '', 0, 140, 3, 0, 0),
(224, 'down', '导出EXCEL', 1, '', 0, 140, 3, 0, 0),
(225, 'add', '新增', 1, '', 0, 140, 3, 0, 0),
(237, 'index', '列表', 1, '', 0, 6, 3, 0, 0),
(227, 'index', '列表', 1, '', 0, 7, 3, 0, 0),
(228, 'resume', '恢复', 1, '', 0, 7, 3, 0, 0),
(229, 'forbid', '禁用', 1, '', 0, 7, 3, 0, 0),
(230, 'foreverdelete', '删除', 1, '', 0, 7, 3, 0, 0),
(231, 'update', '更新', 1, '', 0, 7, 3, 0, 0),
(232, 'edit', '编辑', 1, '', 0, 7, 3, 0, 0),
(233, 'insert', '写入', 1, '', 0, 7, 3, 0, 0),
(234, 'password', '修改密码', 1, '', 0, 7, 3, 0, 0),
(235, 'resetPwd', '重置密码', 1, '', 0, 7, 3, 0, 0),
(236, 'add', '新增', 1, '', 0, 7, 3, 0, 0),
(239, 'forbid', '禁用', 1, '', 0, 6, 3, 0, 0),
(240, 'foreverdelete', '删除', 1, '', 0, 6, 3, 0, 0),
(241, 'update', '更新', 1, '', 0, 6, 3, 0, 0),
(242, 'edit', '编辑', 1, '', 0, 6, 3, 0, 0),
(243, 'insert', '写入', 1, '', 0, 6, 3, 0, 0),
(244, 'app', '授权', 1, '', 0, 6, 3, 0, 0),
(245, 'module', '模块授权', 1, '', 0, 6, 3, 0, 0),
(246, 'action', '操作授权', 1, '', 0, 6, 3, 0, 0),
(247, 'setApp', '保存授权', 1, '', 0, 6, 3, 0, 0),
(248, 'user', '用户列表', 1, '', 0, 6, 3, 0, 0),
(249, 'setUser', '保存列表', 1, '', 0, 6, 3, 0, 0),
(250, 'add', '新增', 1, '', 0, 6, 3, 0, 0),
(251, 'index', '列表', 1, '', 0, 2, 3, 0, 0),
(252, 'resume', '恢复', 1, '', 0, 2, 3, 0, 0),
(253, 'forbid', '禁用', 1, '', 0, 2, 3, 0, 0),
(254, 'foreverdelete', '删除', 1, '', 0, 2, 3, 0, 0),
(255, 'update', '更新', 1, '', 0, 2, 3, 0, 0),
(256, 'edit', '编辑', 1, '', 0, 2, 3, 0, 0),
(257, 'insert', '写入', 1, '', 0, 2, 3, 0, 0),
(258, 'add', '新增', 1, '', 0, 2, 3, 0, 0),
(259, 'index', '列表', 1, '', 0, 116, 3, 0, 0),
(260, 'resume', '恢复', 1, '', 0, 116, 3, 0, 0),
(261, 'forbid', '禁用', 1, '', 0, 116, 3, 0, 0),
(262, 'foreverdelete', '删除', 1, '', 0, 116, 3, 0, 0),
(263, 'update', '更新', 1, '', 0, 116, 3, 0, 0),
(264, 'edit', '编辑', 1, '', 0, 116, 3, 0, 0),
(265, 'insert', '写入', 1, '', 0, 116, 3, 0, 0),
(266, 'add', '新增', 1, '', 0, 116, 3, 0, 0),
(267, 'index', '列表', 1, '', 0, 84, 3, 0, 0),
(268, 'resume', '恢复', 1, '', 0, 84, 3, 0, 0),
(269, 'forbid', '禁用', 1, '', 0, 84, 3, 0, 0),
(270, 'foreverdelete', '删除', 1, '', 0, 84, 3, 0, 0),
(271, 'update', '更新', 1, '', 0, 84, 3, 0, 0),
(272, 'edit', '编辑', 1, '', 0, 84, 3, 0, 0),
(273, 'insert', '写入', 1, '', 0, 84, 3, 0, 0),
(274, 'add', '新增', 1, '', 0, 84, 3, 0, 0),
(275, 'index', '列表', 1, '', 0, 101, 3, 0, 0),
(276, 'foreverdelete', '删除', 1, '', 0, 101, 3, 0, 0),
(277, 'update', '更新', 1, '', 0, 101, 3, 0, 0),
(278, 'edit', '编辑', 1, '', 0, 101, 3, 0, 0),
(279, 'insert', '写入', 1, '', 0, 101, 3, 0, 0),
(290, 'index', '列表', 1, '', 0, 98, 3, 0, 0),
(281, 'add', '新增', 1, '', 0, 101, 3, 0, 0),
(282, 'index', '列表', 1, '', 0, 102, 3, 0, 0),
(283, 'resume', '恢复', 1, '', 0, 102, 3, 0, 0),
(284, 'forbid', '禁用', 1, '', 0, 102, 3, 0, 0),
(285, 'foreverdelete', '删除', 1, '', 0, 102, 3, 0, 0),
(286, 'update', '更新', 1, '', 0, 102, 3, 0, 0),
(287, 'edit', '编辑', 1, '', 0, 102, 3, 0, 0),
(288, 'insert', '写入', 1, '', 0, 102, 3, 0, 0),
(289, 'add', '新增', 1, '', 0, 102, 3, 0, 0),
(291, 'foreverdelete', '删除', 1, '', 0, 98, 3, 0, 0),
(292, 'update', '更新', 1, '', 0, 98, 3, 0, 0),
(293, 'edit', '编辑', 1, '', 0, 98, 3, 0, 0),
(294, 'insert', '写入', 1, '', 0, 98, 3, 0, 0),
(295, 'add', '新增', 1, '', 0, 98, 3, 0, 0),
(296, 'index', '列表', 1, '', 0, 100, 3, 0, 0),
(297, 'resume', '恢复', 1, '', 0, 100, 3, 0, 0),
(298, 'forbid', '禁用', 1, '', 0, 100, 3, 0, 0),
(299, 'foreverdelete', '删除', 1, '', 0, 100, 3, 0, 0),
(300, 'update', '更新', 1, '', 0, 100, 3, 0, 0),
(301, 'edit', '编辑', 1, '', 0, 100, 3, 0, 0),
(302, 'insert', '写入', 1, '', 0, 100, 3, 0, 0),
(303, 'add', '新增', 1, '', 0, 100, 3, 0, 0),
(304, 'index', '列表', 1, '', 0, 116, 3, 0, 0),
(305, 'resume', '恢复', 1, '', 0, 116, 3, 0, 0),
(306, 'forbid', '禁用', 1, '', 0, 116, 3, 0, 0),
(307, 'foreverdelete', '删除', 1, '', 0, 116, 3, 0, 0),
(308, 'update', '更新', 1, '', 0, 116, 3, 0, 0),
(309, 'edit', '编辑', 1, '', 0, 116, 3, 0, 0),
(310, 'insert', '写入', 1, '', 0, 116, 3, 0, 0),
(311, 'add', '新增', 1, '', 0, 116, 3, 0, 0),
(312, 'index', '列表', 1, '', 0, 99, 3, 0, 0),
(313, 'resume', '恢复', 1, '', 0, 99, 3, 0, 0),
(314, 'forbid', '禁用', 1, '', 0, 99, 3, 0, 0),
(315, 'foreverdelete', '删除', 1, '', 0, 99, 3, 0, 0),
(316, 'update', '更新', 1, '', 0, 99, 3, 0, 0),
(317, 'edit', '编辑', 1, '', 0, 99, 3, 0, 0),
(318, 'insert', '写入', 1, '', 0, 99, 3, 0, 0),
(319, 'add', '新增', 1, '', 0, 99, 3, 0, 0),
(320, 'index', '列表', 1, '', 0, 108, 3, 0, 0),
(321, 'resume', '恢复', 1, '', 0, 108, 3, 0, 0),
(322, 'forbid', '禁用', 1, '', 0, 108, 3, 0, 0),
(323, 'foreverdelete', '删除', 1, '', 0, 108, 3, 0, 0),
(324, 'update', '更新', 1, '', 0, 108, 3, 0, 0),
(325, 'edit', '编辑', 1, '', 0, 108, 3, 0, 0),
(326, 'insert', '写入', 1, '', 0, 108, 3, 0, 0),
(327, 'add', '新增', 1, '', 0, 108, 3, 0, 0),
(334, 'index', '列表', 1, '', 0, 106, 3, 0, 0),
(335, 'foreverdelete', '删除', 1, '', 0, 106, 3, 0, 0),
(336, 'update', '更新', 1, '', 0, 106, 3, 0, 0),
(337, 'edit', '编辑', 1, '', 0, 106, 3, 0, 0),
(338, 'insert', '写入', 1, '', 0, 106, 3, 0, 0),
(339, 'add', '新增', 1, '', 0, 106, 3, 0, 0),
(340, 'index', '列表', 1, '', 0, 110, 3, 0, 0),
(341, 'foreverdelete', '删除', 1, '', 0, 110, 3, 0, 0),
(342, 'update', '更新', 1, '', 0, 110, 3, 0, 0),
(343, 'edit', '编辑', 1, '', 0, 110, 3, 0, 0),
(344, 'insert', '写入', 1, '', 0, 110, 3, 0, 0),
(345, 'add', '新增', 1, '', 0, 110, 3, 0, 0),
(346, 'index', '列表', 1, '', 0, 111, 3, 0, 0),
(347, 'foreverdelete', '删除', 1, '', 0, 111, 3, 0, 0),
(348, 'update', '更新', 1, '', 0, 111, 3, 0, 0),
(349, 'edit', '编辑', 1, '', 0, 111, 3, 0, 0),
(350, 'insert', '写入', 1, '', 0, 111, 3, 0, 0),
(351, 'down', '导出EXCEL', 1, '', 0, 111, 3, 0, 0),
(352, 'add', '新增', 1, '', 0, 111, 3, 0, 0),
(353, 'index', '列表', 1, '', 0, 112, 3, 0, 0),
(354, 'foreverdelete', '删除', 1, '', 0, 112, 3, 0, 0),
(355, 'update', '更新', 1, '', 0, 112, 3, 0, 0),
(356, 'edit', '编辑', 1, '', 0, 112, 3, 0, 0),
(357, 'insert', '写入', 1, '', 0, 112, 3, 0, 0),
(358, 'down', '导出EXCEL', 1, '', 0, 112, 3, 0, 0),
(359, 'add', '新增', 1, '', 0, 112, 3, 0, 0),
(360, 'index', '列表', 1, '', 0, 113, 3, 0, 0),
(361, 'foreverdelete', '删除', 1, '', 0, 113, 3, 0, 0),
(362, 'update', '更新', 1, '', 0, 113, 3, 0, 0),
(363, 'edit', '编辑', 1, '', 0, 113, 3, 0, 0),
(364, 'insert', '写入', 1, '', 0, 113, 3, 0, 0),
(365, 'down', '导出EXCEL', 1, '', 0, 113, 3, 0, 0),
(366, 'add', '新增', 1, '', 0, 113, 3, 0, 0),
(367, 'index', '列表', 1, '', 0, 114, 3, 0, 0),
(368, 'foreverdelete', '删除', 1, '', 0, 114, 3, 0, 0),
(369, 'update', '更新', 1, '', 0, 114, 3, 0, 0),
(370, 'edit', '编辑', 1, '', 0, 114, 3, 0, 0),
(371, 'insert', '写入', 1, '', 0, 114, 3, 0, 0),
(372, 'down', '导出EXCEL', 1, '', 0, 114, 3, 0, 0),
(373, 'add', '新增', 1, '', 0, 114, 3, 0, 0),
(374, 'index', '列表', 1, '', 0, 130, 3, 0, 0),
(375, 'foreverdelete', '删除', 1, '', 0, 130, 3, 0, 0),
(376, 'update', '更新', 1, '', 0, 130, 3, 0, 0),
(377, 'edit', '编辑', 1, '', 0, 130, 3, 0, 0),
(378, 'insert', '写入', 1, '', 0, 130, 3, 0, 0),
(379, 'down', '导出EXCEL', 1, '', 0, 130, 3, 0, 0),
(380, 'add', '新增', 1, '', 0, 130, 3, 0, 0),
(381, 'index', '列表', 1, '', 0, 131, 3, 0, 0),
(382, 'foreverdelete', '删除', 1, '', 0, 131, 3, 0, 0),
(383, 'update', '更新', 1, '', 0, 131, 3, 0, 0),
(384, 'edit', '编辑', 1, '', 0, 131, 3, 0, 0),
(385, 'insert', '写入', 1, '', 0, 131, 3, 0, 0),
(386, 'down', '导出EXCEL', 1, '', 0, 131, 3, 0, 0),
(387, 'add', '新增', 1, '', 0, 131, 3, 0, 0),
(388, 'index', '列表', 1, '', 0, 138, 3, 0, 0),
(389, 'foreverdelete', '删除', 1, '', 0, 138, 3, 0, 0),
(390, 'update', '更新', 1, '', 0, 138, 3, 0, 0),
(391, 'edit', '编辑', 1, '', 0, 138, 3, 0, 0),
(392, 'insert', '写入', 1, '', 0, 138, 3, 0, 0),
(393, 'down', '导出EXCEL', 1, '', 0, 138, 3, 0, 0),
(394, 'add', '新增', 1, '', 0, 138, 3, 0, 0),
(395, 'index', '列表', 1, '', 0, 103, 3, 0, 0),
(396, 'resume', '恢复', 1, '', 0, 103, 3, 0, 0),
(397, 'forbid', '禁用', 1, '', 0, 103, 3, 0, 0),
(398, 'foreverdelete', '删除', 1, '', 0, 103, 3, 0, 0),
(399, 'update', '更新', 1, '', 0, 103, 3, 0, 0),
(400, 'edit', '编辑', 1, '', 0, 103, 3, 0, 0),
(401, 'insert', '写入', 1, '', 0, 103, 3, 0, 0),
(402, 'add', '新增', 1, '', 0, 103, 3, 0, 0),
(409, 'index', '列表', 1, '', 0, 135, 3, 0, 0),
(410, 'update', '更新', 1, '', 0, 135, 3, 0, 0),
(411, 'edit', '编辑', 1, '', 0, 135, 3, 0, 0),
(420, 'index', '列表', 1, '', 0, 121, 3, 0, 0),
(421, 'foreverdelete', '删除', 1, '', 0, 121, 3, 0, 0),
(422, 'update', '更新', 1, '', 0, 121, 3, 0, 0),
(423, 'edit', '编辑', 1, '', 0, 121, 3, 0, 0),
(424, 'insert', '写入', 1, '', 0, 121, 3, 0, 0),
(425, 'down', '导出EXCEL', 1, '', 0, 121, 3, 0, 0),
(426, 'add', '新增', 1, '', 0, 121, 3, 0, 0),
(427, 'index', '列表', 1, '', 0, 122, 3, 0, 0),
(428, 'foreverdelete', '删除', 1, '', 0, 122, 3, 0, 0),
(429, 'update', '更新', 1, '', 0, 122, 3, 0, 0),
(430, 'edit', '编辑', 1, '', 0, 122, 3, 0, 0),
(431, 'insert', '写入', 1, '', 0, 122, 3, 0, 0),
(432, 'down', '导出EXCEL', 1, '', 0, 122, 3, 0, 0),
(433, 'add', '新增', 1, '', 0, 122, 3, 0, 0),
(434, 'index', '列表', 1, '', 0, 123, 3, 0, 0),
(435, 'foreverdelete', '删除', 1, '', 0, 123, 3, 0, 0),
(436, 'update', '更新', 1, '', 0, 123, 3, 0, 0),
(437, 'edit', '编辑', 1, '', 0, 123, 3, 0, 0),
(438, 'insert', '写入', 1, '', 0, 123, 3, 0, 0),
(439, 'add', '新增', 1, '', 0, 123, 3, 0, 0),
(447, 'index', '列表', 1, '', 0, 126, 3, 0, 0),
(448, 'foreverdelete', '删除', 1, '', 0, 126, 3, 0, 0),
(449, 'update', '更新', 1, '', 0, 126, 3, 0, 0),
(450, 'edit', '编辑', 1, '', 0, 126, 3, 0, 0),
(451, 'insert', '写入', 1, '', 0, 126, 3, 0, 0),
(452, 'down', '导出EXCEL', 1, '', 0, 126, 3, 0, 0),
(453, 'add', '新增', 1, '', 0, 126, 3, 0, 0),
(454, 'index', '列表', 1, '', 0, 127, 3, 0, 0),
(455, 'foreverdelete', '删除', 1, '', 0, 127, 3, 0, 0),
(456, 'update', '更新', 1, '', 0, 127, 3, 0, 0),
(457, 'edit', '编辑', 1, '', 0, 127, 3, 0, 0),
(458, 'insert', '写入', 1, '', 0, 127, 3, 0, 0),
(459, 'down', '导出EXCEL', 1, '', 0, 127, 3, 0, 0),
(460, 'add', '新增', 1, '', 0, 127, 3, 0, 0),
(461, 'index', '列表', 1, '', 0, 132, 3, 0, 0),
(462, 'foreverdelete', '删除', 1, '', 0, 132, 3, 0, 0),
(463, 'update', '更新', 1, '', 0, 132, 3, 0, 0),
(464, 'edit', '编辑', 1, '', 0, 132, 3, 0, 0),
(465, 'insert', '写入', 1, '', 0, 132, 3, 0, 0),
(466, 'down', '导出EXCEL', 1, '', 0, 132, 3, 0, 0),
(467, 'add', '新增', 1, '', 0, 132, 3, 0, 0),
(468, 'index', '列表', 1, '', 0, 118, 3, 0, 0),
(469, 'foreverdelete', '删除', 1, '', 0, 118, 3, 0, 0),
(470, 'update', '更新', 1, '', 0, 118, 3, 0, 0),
(471, 'edit', '编辑', 1, '', 0, 118, 3, 0, 0),
(472, 'insert', '写入', 1, '', 0, 118, 3, 0, 0),
(473, 'down', '导出EXCEL', 1, '', 0, 118, 3, 0, 0),
(474, 'add', '新增', 1, '', 0, 118, 3, 0, 0),
(475, 'index', '列表', 1, '', 0, 119, 3, 0, 0),
(476, 'foreverdelete', '删除', 1, '', 0, 119, 3, 0, 0),
(477, 'update', '更新', 1, '', 0, 119, 3, 0, 0),
(478, 'edit', '编辑', 1, '', 0, 119, 3, 0, 0),
(479, 'insert', '写入', 1, '', 0, 119, 3, 0, 0),
(480, 'down', '导出EXCEL', 1, '', 0, 119, 3, 0, 0),
(481, 'add', '新增', 1, '', 0, 119, 3, 0, 0),
(482, 'index', '列表', 1, '', 0, 124, 3, 0, 0),
(483, 'foreverdelete', '删除', 1, '', 0, 124, 3, 0, 0),
(484, 'update', '更新', 1, '', 0, 124, 3, 0, 0),
(485, 'edit', '编辑', 1, '', 0, 124, 3, 0, 0),
(486, 'insert', '写入', 1, '', 0, 124, 3, 0, 0),
(487, 'down', '导出EXCEL', 1, '', 0, 124, 3, 0, 0),
(488, 'add', '新增', 1, '', 0, 124, 3, 0, 0),
(489, 'index', '列表', 1, '', 0, 134, 3, 0, 0),
(490, 'foreverdelete', '删除', 1, '', 0, 134, 3, 0, 0),
(491, 'update', '更新', 1, '', 0, 134, 3, 0, 0),
(492, 'edit', '编辑', 1, '', 0, 134, 3, 0, 0),
(493, 'insert', '写入', 1, '', 0, 134, 3, 0, 0),
(494, 'down', '导出EXCEL', 1, '', 0, 134, 3, 0, 0),
(495, 'add', '新增', 1, '', 0, 134, 3, 0, 0),
(496, 'index', '列表', 1, '', 0, 136, 3, 0, 0),
(497, 'handle', '处理', 1, '', 0, 136, 3, 0, 0),
(498, 'complete', '完成', 1, '', 0, 136, 3, 0, 0),
(499, 'revocation', '撤销', 1, '', 0, 136, 3, 0, 0),
(500, 'foreverdelete', '删除', 1, '', 0, 136, 3, 0, 0),
(501, 'update', '更新', 1, '', 0, 136, 3, 0, 0),
(502, 'edit', '编辑', 1, '', 0, 136, 3, 0, 0),
(503, 'insert', '写入', 1, '', 0, 136, 3, 0, 0),
(504, 'down', '导出EXCEL', 1, '', 0, 136, 3, 0, 0),
(505, 'add', '新增', 1, '', 0, 136, 3, 0, 0),
(506, 'index', '列表', 1, '', 0, 137, 3, 0, 0),
(507, 'complete', '成功', 1, '', 0, 137, 3, 0, 0),
(508, 'foreverdelete', '删除', 1, '', 0, 137, 3, 0, 0),
(509, 'update', '更新', 1, '', 0, 137, 3, 0, 0),
(510, 'edit', '编辑', 1, '', 0, 137, 3, 0, 0),
(511, 'insert', '写入', 1, '', 0, 137, 3, 0, 0),
(512, 'down', '导出EXCEL', 1, '', 0, 137, 3, 0, 0),
(513, 'add', '新增', 1, '', 0, 137, 3, 0, 0),
(514, 'lookUp', '查找带回', 1, '', 0, 108, 3, 0, 0),
(515, 'lookUp', '查找带回', 1, '', 0, 114, 3, 0, 0),
(516, 'lookUp', '查找带回', 1, '', 0, 138, 3, 0, 0),
(517, 'lookUp', '查找带回', 1, '', 0, 103, 3, 0, 0),
(518, 'lookUp', '查找带回', 1, '', 0, 123, 3, 0, 0),
(520, 'Sms_log', '短信日志', 1, '', 0, 1, 2, 0, 15),
(521, 'Mail_log', '邮件日志', 1, '', 0, 1, 2, 0, 15),
(522, 'add', '新增', 1, '', 0, 520, 3, 0, 0),
(523, 'index', '列表', 1, '', 0, 520, 3, 0, 0),
(524, 'foreverdelete', '删除', 1, '', 0, 520, 3, 0, 0),
(525, 'update', '更新', 1, '', 0, 520, 3, 0, 0),
(526, 'edit', '编辑', 1, '', 0, 520, 3, 0, 0),
(527, 'insert', '写入', 1, '', 0, 520, 3, 0, 0),
(528, 'down', '导出EXCEL', 1, '', 0, 520, 3, 0, 0),
(529, 'add', '新增', 1, '', 0, 521, 3, 0, 0),
(530, 'index', '列表', 1, '', 0, 521, 3, 0, 0),
(531, 'foreverdelete', '删除', 1, '', 0, 521, 3, 0, 0),
(532, 'update', '更新', 1, '', 0, 521, 3, 0, 0),
(533, 'edit', '编辑', 1, '', 0, 521, 3, 0, 0),
(534, 'insert', '写入', 1, '', 0, 521, 3, 0, 0),
(535, 'down', '导出EXCEL', 1, '', 0, 521, 3, 0, 0),
(536, 'Refunds', '退款申请', 1, '', 0, 1, 2, 0, 18),
(538, 'Commission_log', '佣金日志', 0, '', 0, 1, 2, 0, 15),
(546, 'add', '新增', 1, '', 0, 538, 3, 0, 0),
(547, 'index', '列表', 1, '', 0, 538, 3, 0, 0),
(548, 'foreverdelete', '删除', 1, '', 0, 538, 3, 0, 0),
(549, 'update', '更新', 1, '', 0, 538, 3, 0, 0),
(550, 'edit', '编辑', 1, '', 0, 538, 3, 0, 0),
(551, 'insert', '写入', 1, '', 0, 538, 3, 0, 0),
(552, 'down', '导出EXCEL', 1, '', 0, 538, 3, 0, 0),
(559, 'index', '列表', 1, '', 0, 536, 3, 0, 0),
(560, 'update', '保存', 1, '', 0, 536, 3, 0, 0),
(561, 'edit', '查看操作', 1, '', 0, 536, 3, 0, 0),
(562, 'down', '导出EXCEL', 1, '', 0, 536, 3, 0, 0),
(568, 'Upgrade', '更新升级', 0, '', 0, 1, 2, 0, 7),
(577, 'index', '列表', 1, '', 0, 568, 3, 0, 0),
(578, 'getList', '获取列表', 1, '', 0, 568, 3, 0, 0),
(579, 'explain', '说明', 1, '', 0, 568, 3, 0, 0),
(580, 'down', '下载', 1, '', 0, 568, 3, 0, 0),
(581, 'agreement', '安装', 1, '', 0, 568, 3, 0, 0),
(582, 'installation', '安装协议', 1, '', 0, 568, 3, 0, 0),
(583, 'unzip', '解压', 1, '', 0, 568, 3, 0, 0),
(584, 'checkFiles', '检测', 1, '', 0, 568, 3, 0, 0),
(585, 'execution', '执行升级', 1, '', 0, 568, 3, 0, 0),
(586, 'Label', '标签管理', 1, '', 0, 1, 2, 0, 22),
(587, 'Circle', '圈子管理', 1, '', 0, 1, 2, 0, 22),
(588, 'Talk_about', '说说日志', 1, '', 0, 1, 2, 0, 22),
(591, 'index', '列表', 1, '', 0, 586, 3, 0, 0),
(592, 'foreverdelete', '删除', 1, '', 0, 586, 3, 0, 0),
(593, 'update', '更新', 1, '', 0, 586, 3, 0, 0),
(594, 'edit', '编辑', 1, '', 0, 586, 3, 0, 0),
(595, 'insert', '写入', 1, '', 0, 586, 3, 0, 0),
(596, 'add', '新增', 1, '', 0, 586, 3, 0, 0),
(597, 'index', '列表', 1, '', 0, 587, 3, 0, 0),
(598, 'foreverdelete', '删除', 1, '', 0, 587, 3, 0, 0),
(599, 'update', '更新', 1, '', 0, 587, 3, 0, 0),
(600, 'edit', '编辑', 1, '', 0, 587, 3, 0, 0),
(601, 'insert', '写入', 1, '', 0, 587, 3, 0, 0),
(602, 'add', '新增', 1, '', 0, 587, 3, 0, 0),
(603, 'index', '列表', 1, '', 0, 588, 3, 0, 0),
(604, 'foreverdelete', '删除', 1, '', 0, 588, 3, 0, 0),
(605, 'update', '更新', 1, '', 0, 588, 3, 0, 0),
(606, 'edit', '编辑', 1, '', 0, 588, 3, 0, 0),
(607, 'insert', '写入', 1, '', 0, 588, 3, 0, 0),
(608, 'add', '新增', 1, '', 0, 588, 3, 0, 0),
(631, 'Businesses_circle', '商圈管理', 1, '', 0, 1, 2, 0, 24),
(630, 'Front_cover', '会员封面', 1, '', 0, 1, 2, 0, 21),
(629, 'Preferential', '优惠活动', 1, '', 0, 1, 2, 0, 17),
(628, 'Businesses_recommend', '商家推荐', 1, '', 0, 1, 2, 0, 24),
(627, 'Businesses_category', '商家分类', 1, '', 0, 1, 2, 0, 24),
(621, 'Album', '专题管理', 1, '', 0, 1, 2, 0, 22),
(622, 'App_category', '应用分类', 1, '', 0, 1, 2, 0, 23),
(623, 'App', '应用管理', 1, '', 0, 1, 2, 0, 23),
(624, 'Medal', '勋章管理', 1, '', 0, 1, 2, 0, 22),
(625, 'Daren_show', '达人秀', 1, '', 0, 1, 2, 0, 22),
(626, 'Businesses', '商家管理', 1, '', 0, 1, 2, 0, 24);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_order`
--

CREATE TABLE IF NOT EXISTS `jvf_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `fee` varchar(255) NOT NULL COMMENT '手续费',
  `incharge` varchar(255) NOT NULL COMMENT '已支付费用',
  `cope` varchar(255) NOT NULL COMMENT '应付金额',
  `total` varchar(255) NOT NULL COMMENT '总价',
  `money_status` tinyint(1) NOT NULL COMMENT '0:未收款;1:部分收款;2:全部收款;3:部分退款;4:全部退款',
  `addtime` int(11) DEFAULT NULL,
  `paytype` varchar(255) DEFAULT NULL,
  `remark` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0未支付1已支付2已作废',
  PRIMARY KEY (`id`),
  KEY `FK_Reference_23` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_order`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_order_details`
--

CREATE TABLE IF NOT EXISTS `jvf_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `attr` varchar(255) NOT NULL,
  `comment_id` int(11) NOT NULL COMMENT '用户评论产品',
  `member_comment_id` int(11) NOT NULL COMMENT '商家评论用户',
  `refund_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未申请退款;1:已申请退款;2:已退款;3:退款申请未通过;',
  `refund_reason` text NOT NULL,
  `refund_applytime` int(11) NOT NULL,
  `refundamount` varchar(255) NOT NULL,
  `refundtime` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_order_details`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_payment`
--

CREATE TABLE IF NOT EXISTS `jvf_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  `description` text,
  `logo` varchar(255) DEFAULT NULL,
  `fee` varchar(10) DEFAULT NULL,
  `feetype` tinyint(1) DEFAULT NULL COMMENT '0定额1比例',
  `merchant` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0禁用1启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 导出表中的数据 `jvf_payment`
--

INSERT INTO `jvf_payment` (`id`, `name`, `mark`, `description`, `logo`, `fee`, `feetype`, `merchant`, `account`, `key`, `sort`, `status`) VALUES
(1, '支付宝', 'Alipay', '支付宝 知托付！', '/Public/upload/img/site/4f727c600b917.png', '0.00', 0, '', '', '', 0, 1),
(2, '财付通', 'Tenpay', '会支付 会生活', '/Public/upload/img/site/4f727c4e55451.png', '0.00', 0, '', '', '', 0, 1),
(3, '易宝支付', 'Yeepay', '绿色支付 快乐生活', '/Public/upload/img/site/4f727c3b66e0d.png', '0.00', 0, '', '', '', 0, 1),
(4, '网银在线', 'Chinabank', '随时随地快捷、安全支付', '/Public/upload/img/site/4f727c2ec581c.png', '0.00', 0, '', '', '', 0, 1),
(5, '汇付天下', 'Chinapnr', '汇付天下,金融支付专家', '/Public/upload/img/site/4f727bf8c1987.png', '0.00', 0, '', '', '', 0, 1),
(6, 'Paypal', 'Paypal', '', '/Public/upload/img/site/4f86b6a978e4a.gif', '0.00', 0, '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_periphery`
--

CREATE TABLE IF NOT EXISTS `jvf_periphery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_periphery`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_picture`
--

CREATE TABLE IF NOT EXISTS `jvf_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `bid` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `isreal` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_picture`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_preferential`
--

CREATE TABLE IF NOT EXISTS `jvf_preferential` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_title` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `logo` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `sms` text NOT NULL,
  `pre` varchar(255) NOT NULL,
  `crr` int(11) NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_preferential`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_prepaid_card`
--

CREATE TABLE IF NOT EXISTS `jvf_prepaid_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `cash` varchar(255) NOT NULL COMMENT '金额',
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0未使用1已使用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_prepaid_card`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_price_range`
--

CREATE TABLE IF NOT EXISTS `jvf_price_range` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_price_range`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_recharge`
--

CREATE TABLE IF NOT EXISTS `jvf_recharge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `cope` varchar(255) NOT NULL,
  `cash` varchar(255) NOT NULL,
  `bank_id` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_recharge`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_recommend`
--

CREATE TABLE IF NOT EXISTS `jvf_recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '推荐ID',
  `gid` int(11) DEFAULT NULL,
  `reviewer` int(11) DEFAULT NULL,
  `content` text,
  `type` tinyint(1) DEFAULT NULL COMMENT '0普通文章 1视频 2图片',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_recommend`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_region`
--

CREATE TABLE IF NOT EXISTS `jvf_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `pid` int(11) DEFAULT NULL COMMENT '父类的ID',
  `path` varchar(255) DEFAULT NULL COMMENT '级别路径 例子 0,1,2,3',
  `level` int(11) NOT NULL,
  `letter` varchar(1) NOT NULL,
  `spelling` varchar(255) NOT NULL,
  `isdefault` tinyint(1) NOT NULL,
  `sort` int(11) DEFAULT NULL COMMENT '统计排序',
  PRIMARY KEY (`id`),
  KEY `path` (`path`,`sort`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- 导出表中的数据 `jvf_region`
--

INSERT INTO `jvf_region` (`id`, `name`, `pid`, `path`, `level`, `letter`, `spelling`, `isdefault`, `sort`) VALUES
(6, '上海市', 4, '0,4,6,', 1, 'S', 'shanghaishi', 0, 0),
(5, '湖南', 0, '0,5,', 0, 'H', 'hunan', 0, 0),
(4, '上海', 0, '0,4,', 0, 'S', 'shanghai', 0, 0),
(7, '黄浦区', 6, '0,4,6,7,', 2, 'H', 'huangpuqu', 1, 0),
(8, '卢湾区', 6, '0,4,6,8,', 2, 'L', 'luwanqu', 0, 0),
(9, '金山区', 6, '0,4,6,9,', 2, 'J', 'jinshanqu', 0, 0),
(10, '徐汇区', 6, '0,4,6,10,', 2, 'X', 'xuhuiqu', 0, 0),
(11, '长宁区', 6, '0,4,6,11,', 2, 'C', 'changningqu', 0, 0),
(12, '静安区', 6, '0,4,6,12,', 2, 'J', 'jinganqu', 0, 0),
(13, '普陀区', 6, '0,4,6,13,', 2, 'P', 'putuoqu', 0, 0),
(14, '闸北区', 6, '0,4,6,14,', 2, 'Z', 'zhabeiqu', 0, 0),
(15, '虹口区', 6, '0,4,6,15,', 2, 'H', 'hongkouqu', 0, 0),
(16, '杨浦区', 6, '0,4,6,16,', 2, 'Y', 'yangpuqu', 0, 0),
(17, '闵行区', 6, '0,4,6,17,', 2, 'X', 'xingqu', 0, 0),
(18, '宝山区', 6, '0,4,6,18,', 2, 'B', 'baoshanqu', 0, 0),
(19, '嘉定区', 6, '0,4,6,19,', 2, 'J', 'jiadingqu', 0, 0),
(20, '浦东新区', 6, '0,4,6,20,', 2, 'P', 'pudongxinqu', 1, 0),
(21, '松江区', 6, '0,4,6,21,', 2, 'S', 'songjiangqu', 0, 0),
(22, '青浦区', 6, '0,4,6,22,', 2, 'Q', 'qingpuqu', 0, 0),
(23, '南汇区', 6, '0,4,6,23,', 2, 'N', 'nanhuiqu', 0, 0),
(24, '奉贤区', 6, '0,4,6,24,', 2, 'F', 'fengxianqu', 0, 0),
(25, '崇明区', 6, '0,4,6,25,', 2, 'C', 'chongmingqu', 0, 0),
(26, '长沙市', 5, '0,5,26,', 1, 'C', 'changshashi', 0, 0),
(27, '株洲市', 5, '0,5,27,', 1, 'Z', 'zhuzhoushi', 0, 0),
(28, '湘潭市', 5, '0,5,28,', 1, 'X', 'xiangtanshi', 0, 0),
(29, '衡阳市', 5, '0,5,29,', 1, 'H', 'hengyangshi', 0, 0),
(30, '邵阳市', 5, '0,5,30,', 1, 'S', 'shaoyangshi', 0, 0),
(31, '岳阳市', 5, '0,5,31,', 1, 'Y', 'yueyangshi', 0, 0),
(32, '张家界市', 5, '0,5,32,', 1, 'Z', 'zhangjiajieshi', 0, 0),
(33, '益阳市', 5, '0,5,33,', 1, 'Y', 'yiyangshi', 0, 0),
(34, '常德市', 5, '0,5,34,', 1, 'C', 'changdeshi', 0, 0),
(35, '娄底市', 5, '0,5,35,', 1, 'L', 'loudishi', 0, 0),
(36, '郴州市', 5, '0,5,36,', 1, 'C', 'chenzhoushi', 0, 0),
(37, '永州市', 5, '0,5,37,', 1, 'Y', 'yongzhoushi', 0, 0),
(38, '怀化市', 5, '0,5,38,', 1, 'H', 'huaihuashi', 0, 0),
(39, '芙蓉区', 26, '0,5,26,39,', 2, 'R', 'rongqu', 1, 0),
(40, '天心区', 26, '0,5,26,40,', 2, 'T', 'tianxinqu', 1, 0),
(41, '岳麓区', 26, '0,5,26,41,', 2, 'Y', 'yueluqu', 1, 0),
(42, '开福区', 26, '0,5,26,42,', 2, 'K', 'kaifuqu', 0, 0),
(43, '雨花区', 26, '0,5,26,43,', 2, 'Y', 'yuhuaqu', 1, 0),
(44, '望城区', 26, '0,5,26,44,', 2, 'W', 'wangchengqu', 0, 0),
(45, '浏阳市', 26, '0,5,26,45,', 2, 'Y', 'yangshi', 0, 0),
(46, '长沙县', 26, '0,5,26,46,', 2, 'C', 'changshaxian', 0, 0),
(47, '宁乡县', 26, '0,5,26,47,', 2, 'N', 'ningxiangxian', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_release`
--

CREATE TABLE IF NOT EXISTS `jvf_release` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promulgator` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_release`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_remind`
--

CREATE TABLE IF NOT EXISTS `jvf_remind` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `opposite` int(11) NOT NULL DEFAULT '0',
  `content` text,
  `type` varchar(30) NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `good_id` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Reference_35` (`uid`),
  KEY `FK_Reference_36` (`opposite`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 导出表中的数据 `jvf_remind`
--

INSERT INTO `jvf_remind` (`id`, `uid`, `opposite`, `content`, `type`, `new`, `good_id`, `addtime`) VALUES
(1, 5, 1, '[actor] [text]', 'attention', 1, 0, 1340856685),
(2, 11, 1, '[actor] [text]', 'attention', 1, 0, 1340856707),
(3, 9, 1, '[actor] [text]', 'attention', 1, 0, 1340856710),
(4, 0, 1, '[actor] [text]', 'attention', 1, 0, 1340933242),
(5, 12, 1, '[actor] [text]', 'attention', 1, 0, 1340933270),
(6, 7, 1, '[actor] [text]', 'attention', 1, 0, 1340934765),
(7, 0, 1, '[actor] [text]', 'attention', 1, 0, 1342857905),
(8, 0, 1, '[actor] [text]', 'attention', 1, 0, 1342857953),
(9, 0, 1, '[actor] [text]', 'attention', 1, 0, 1342857956),
(10, 0, 1, '[actor] [text] [goodurl]', 'order', 1, 2, 1343023741),
(11, 11, 1, '[actor] [text]', 'attention', 1, 0, 1344340108),
(12, 11, 1, '[actor] [text]', 'attention', 1, 0, 1344340117),
(13, 11, 1, '[actor] [text]', 'attention', 1, 0, 1344340141),
(14, 11, 1, '[actor] [text]', 'attention', 1, 0, 1344340142),
(15, 11, 1, '[actor] [text]', 'attention', 1, 0, 1344340143),
(16, 11, 1, '[actor] [text]', 'attention', 1, 0, 1344340144);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_role`
--

CREATE TABLE IF NOT EXISTS `jvf_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `ename` varchar(5) DEFAULT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parentId` (`pid`),
  KEY `ename` (`ename`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_role`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_role_user`
--

CREATE TABLE IF NOT EXISTS `jvf_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `jvf_role_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_sms_log`
--

CREATE TABLE IF NOT EXISTS `jvf_sms_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receive` varchar(255) NOT NULL,
  `sendtime` int(9) NOT NULL,
  `content` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_sms_log`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_sysconf`
--

CREATE TABLE IF NOT EXISTS `jvf_sysconf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `val` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL,
  `list_type` tinyint(1) NOT NULL COMMENT '0:手动输入 1:单选 2:下拉 3:文本域 4:图像',
  `val_arr` varchar(255) NOT NULL COMMENT '可选的值的集合。序列化存放',
  `group_id` tinyint(2) NOT NULL DEFAULT '1',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `inx_sys_conf_001` (`status`,`name`),
  KEY `inx_sys_conf_002` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

--
-- 导出表中的数据 `jvf_sysconf`
--

INSERT INTO `jvf_sysconf` (`id`, `key`, `name`, `val`, `status`, `sort`, `list_type`, `val_arr`, `group_id`, `is_show`) VALUES
(1, 'site_name', '网站名称', '网站名称', 1, 0, 0, '', 1, 1),
(2, 'site_url', '网站网址', 'http://127.0.0.1', 1, 0, 0, '', 1, 1),
(3, 'site_title', '网站标题', '网站标题', 1, 0, 0, '', 1, 1),
(4, 'site_keywords', '网站默认关键字', '网站关键字', 1, 0, 0, '', 1, 1),
(5, 'site_description', '网站描述', '网站描述', 1, 0, 0, '', 1, 1),
(6, 'site_powerby', '网站版权信息', 'Copyright © 2002-2011 JVFNET. 佳弗网络 版权所', 1, 0, 0, '', 1, 1),
(7, 'site_beian', '网站备案号', '自ICP证666888号', 1, 0, 0, '', 1, 1),
(8, 'site_closed', '关闭网站', '0', 1, 0, 1, '0,1', 1, 1),
(9, 'site_logo', '网站LOGO', '/Public/upload/img/site/4fe034a682798.png', 1, 0, 4, '', 1, 1),
(10, 'site_tongji', '统计代码', '', 1, 0, 3, '', 1, 1),
(11, 'site_services_tel', '客服电话', '0371-66668888', 1, 0, 0, '', 1, 1),
(12, 'site_services_email', '客服邮箱', '1714508868@qq.com', 1, 0, 0, '', 1, 1),
(13, 'site_upload_allowexts', '允许上传的文件类型', 'jpg,gif,png,jpeg,rar,zip,swf', 1, 0, 0, '', 4, 1),
(14, 'site_upload_maxsize', '最大上传限制（字节）', '2097152', 1, 0, 0, '', 4, 1),
(15, 'site_water_mark', '开启水印', '1', 1, 0, 1, '0,1', 4, 1),
(16, 'site_big_width', '大图宽度', '334', 1, 0, 0, '', 4, 1),
(17, 'site_big_heigth', '大图高度', '', 1, 0, 0, '', 4, 1),
(18, 'site_small_width', '小图宽度', '213', 1, 0, 0, '', 4, 1),
(19, 'site_small_heigth', '小图高度', '', 1, 0, 0, '', 4, 1),
(20, 'site_water_image', '水印图片', '/Public/upload/img/site/4f5061a75c951.png', 1, 0, 4, '', 4, 1),
(21, 'site_water_position', '水印打印位置', '5', 1, 0, 2, '1,2,3,4,5', 4, 1),
(22, 'site_mail_on', '邮件服务', '1', 1, 0, 1, '0,1', 2, 1),
(23, 'site_smtp_server', '邮件服务器', 'smtp.163.com', 1, 0, 0, '', 2, 1),
(24, 'site_smtp_port', '邮件服务器端口', '25', 1, 0, 0, '', 2, 1),
(25, 'site_smtp_account', '邮件帐号', 'debug003@163.com', 1, 0, 0, '', 2, 1),
(26, 'site_services_password', '邮件密码', '1000000', 1, 0, 0, '', 2, 1),
(27, 'site_reply_address', '回复地址', 'debug003@163.com', 1, 0, 0, '', 2, 1),
(28, 'site_smtp_auth', 'SMTP验证', '1', 1, 0, 1, '0,1', 2, 1),
(29, 'site_smtp_is_ssl', 'SSL连接加密', '0', 1, 0, 1, '0,1', 2, 1),
(31, 'site_water_alpha', '水印透明度', '80', 1, 0, 0, '', 4, 1),
(32, 'site_work_times', '工作时间', '9:00-18:00', 1, 0, 3, '', 1, 1),
(33, 'site_page_listrows', '通用分页量', '20', 1, 0, 0, '', 1, 1),
(34, 'site_mb_allowreg', '是否允许新会员注册', '1', 1, 0, 1, '0,1', 5, 1),
(35, 'site_price_decimal', '价格类型小数位数', '2', 1, 0, 0, '', 3, 1),
(37, 'site_mb_autoreg', '会员注册邮件验证', '1', 1, 0, 1, '0,1', 5, 1),
(38, 'site_mb_logintime', '会员登录cookie有效时间（分钟）', '600', 1, 0, 0, '', 5, 1),
(94, 'site_mb_sellcredits', '会员商品售出单个送积分', '100', 1, 0, 0, '', 5, 1),
(40, 'site_mb_bigavatar', '会员头像默认大图', '/Public/upload/img/site/4eeaad8122cf7.png', 1, 0, 4, '', 5, 1),
(41, 'site_mb_smallavatar', '会员头像默认小图', '/Public/upload/img/site/4eeaad813263f.png', 1, 0, 4, '', 5, 1),
(46, 'evaluate_total', '评价总值', '100', 1, 0, 0, '', 3, 1),
(47, 'is_open_chat', '是否开启及时聊天', '1', 1, 0, 1, '0,1', 3, 1),
(49, 'site_credits_name', '网站用户积分名称', '积分', 1, 0, 0, '', 1, 1),
(50, 'site_mb_phone_verify', '会员手机验证', '1', 1, 0, 1, '0,1', 5, 1),
(51, 'site_mb_verifycredits', '会员注册验证后送积分', '100', 1, 0, 0, '', 5, 1),
(52, 'site_mb_invitecredits', '会员邀请好友送积分', '100', 1, 0, 0, '', 5, 1),
(53, 'site_mb_buycredits', '会员购买商品单个送积分', '100', 1, 0, 0, '', 5, 1),
(54, 'site_mb_invitebuycredits', '会员邀请的好友首次购买成功送积分', '200', 1, 0, 0, '', 5, 1),
(55, 'site_mb_invitesellcredits', '会员邀请的好友首次出售成功送积分', '200', 1, 0, 0, '', 5, 1),
(56, 'site_mb_avatarcredits', '会员首次上传头像送积分', '100', 1, 0, 0, '', 5, 1),
(57, 'recently_num', '最近联系人的数量', '10', 1, 0, 0, '', 3, 1),
(58, 'site_mb_invitetime', '会员邀请链接有效时间（分钟）', '600', 1, 0, 0, '', 5, 1),
(59, 'chat_log_num', '聊天记录显示条数', '10', 1, 0, 0, '', 3, 1),
(60, 'site_sms_open', '开启短信功能', '1', 1, 4, 1, '0,1', 6, 1),
(61, 'site_sms_sendhttp', '短信接口（[tel]手机号码,[msg]短信内容）', 'http://124.172.250.160/WebService.asmx/mt?Sn=jf&Pwd=888888&mobile=[tel]&content=[msg]', 1, 2, 0, '', 6, 1),
(62, 'site_sms_success', '短信接口发送成功返回值', '.+0.+int.+', 1, 0, 0, '', 6, 1),
(63, 'site_sendmail_pay', '收款邮件通知', '0', 1, 0, 1, '0,1', 2, 1),
(64, 'site_sendmail_coupon', '优惠券邮件通知', '0', 1, 0, 1, '0,1', 2, 1),
(65, 'site_couponname', '网站优惠券名称', '优惠券', 1, 0, 0, '', 1, 1),
(66, 'site_sendmail_usecoupon', '优惠券消费邮件通知', '0', 1, 0, 1, '0,1', 2, 1),
(69, 'site_sendsms_pay', '收款短信通知', '0', 1, 0, 1, '0,1', 6, 1),
(70, 'site_sendsms_coupon_auto', '发放优惠券时,自动短信通知', '0', 1, 0, 1, '0,1', 6, 1),
(71, 'site_sendsms_coupon', '优惠券短信通知', '1', 1, 0, 1, '0,1', 6, 1),
(72, 'site_sendsms_coupon_num', '优惠券短信通知次数', '3', 1, 0, 0, '', 6, 1),
(73, 'site_sendsms_usecoupon', '优惠券消费短信通知', '0', 1, 0, 1, '0,1', 6, 1),
(74, 'site_sendsms_code_time', '短信验证码有效期（分钟）', '60', 1, 0, 0, '', 6, 1),
(75, 'online_check', '在线检测间隔（秒）', '600', 1, 0, 0, '', 3, 1),
(76, 'site_replacestr', '替换词语（词语会被替换）用|分开,结尾不加', '她妈|它妈|他妈|你妈|去死|贱人', 1, 0, 0, '', 1, 1),
(78, 'sys_tpl_cache', '是否开启模版缓存', '0', 1, 0, 1, '0,1', 7, 1),
(79, 'sys_tpl_time', '模版缓存有效期（秒）', '-1', 1, 0, 0, '', 7, 1),
(80, 'sys_data_cache', '数据缓存类型', 'Db', 1, 0, 2, 'File,Db,Apc,Memcache,Shmop,Sqlite,Xcache,Apachenote,Eaccelerator', 7, 1),
(81, 'sys_default_lang', '默认语言', 'zh-cn', 1, 0, 2, 'zh-cn,zh-tw', 7, 1),
(82, 'sys_url_suffix', '伪静态url后缀', '', 1, 0, 0, '', 7, 1),
(83, 'site_refund_isallow', '开放退款申请', '1', 1, 0, 2, '0,1', 3, 1),
(90, 'site_sms_type', '短信接口类型', 'UTF-8', 1, 1, 0, '', 6, 1),
(91, 'release_open', '是否开启前台自行发布', '1', 1, 0, 1, '0,1', 9, 1),
(92, 'release_audit', '发布商品是否需要审核', '1', 1, 0, 1, '0,1', 9, 1),
(109, 'sys_lang_auto_detect', '是否自动侦测浏览器语言', '0', 1, 0, 1, '0,1', 7, 1);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_sysconf_group`
--

CREATE TABLE IF NOT EXISTS `jvf_sysconf_group` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 导出表中的数据 `jvf_sysconf_group`
--

INSERT INTO `jvf_sysconf_group` (`id`, `name`, `status`, `sort`) VALUES
(1, '基本配置', 1, 8),
(2, '邮件设置', 1, 6),
(3, '其他', 1, 0),
(4, '上传设置', 1, 7),
(5, '会员相关配置', 1, 5),
(6, '短信设置', 1, 4),
(7, '程序设置', 1, 3),
(9, '发布设置', 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `jvf_talk_about`
--

CREATE TABLE IF NOT EXISTS `jvf_talk_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `comment` int(11) NOT NULL,
  `forwarding` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_talk_about`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_talk_about_comment`
--

CREATE TABLE IF NOT EXISTS `jvf_talk_about_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_talk_about_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_talk_about_like`
--

CREATE TABLE IF NOT EXISTS `jvf_talk_about_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_talk_about_like`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_talk_about_relation`
--

CREATE TABLE IF NOT EXISTS `jvf_talk_about_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_talk_about_relation`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_timeaxis`
--

CREATE TABLE IF NOT EXISTS `jvf_timeaxis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_timeaxis`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_user`
--

CREATE TABLE IF NOT EXISTS `jvf_user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(64) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `bind_account` varchar(50) NOT NULL,
  `last_login_time` int(11) unsigned DEFAULT '0',
  `last_login_ip` varchar(40) DEFAULT NULL,
  `login_count` mediumint(8) unsigned DEFAULT '0',
  `verify` varchar(32) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `type_id` tinyint(2) unsigned DEFAULT '0',
  `info` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `jvf_user`
--

INSERT INTO `jvf_user` (`id`, `account`, `nickname`, `password`, `bind_account`, `last_login_time`, `last_login_ip`, `login_count`, `verify`, `email`, `remark`, `create_time`, `update_time`, `status`, `type_id`, `info`) VALUES
(1, 'admin', '管理员', '21232f297a57a5a743894a0e4a801fc3', '', 1363137936, NULL, 63, NULL, '', '', 0, 0, 1, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `jvf_value_log`
--

CREATE TABLE IF NOT EXISTS `jvf_value_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `val` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_module` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_value_log`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_verification`
--

CREATE TABLE IF NOT EXISTS `jvf_verification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mail` (`mail`),
  KEY `code` (`code`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_verification`
--


-- --------------------------------------------------------

--
-- 表的结构 `jvf_withdraw`
--

CREATE TABLE IF NOT EXISTS `jvf_withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `cash` varchar(255) NOT NULL,
  `bank_id` varchar(255) NOT NULL,
  `bank_card` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `jvf_withdraw`
--

