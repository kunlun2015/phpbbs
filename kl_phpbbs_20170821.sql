/*
Navicat MySQL Data Transfer

Source Server         : 119.29.141.20
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : phpbbs

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-08-21 20:56:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for kl_category
-- ----------------------------
DROP TABLE IF EXISTS `kl_category`;
CREATE TABLE `kl_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父菜单id',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '类别名称',
  `href` text COMMENT '链接',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序，越大越靠前',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态，0正常，1禁用',
  `remarks` text COMMENT '简介',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `created` varchar(16) NOT NULL DEFAULT '' COMMENT '操作者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='类别分组结构';

-- ----------------------------
-- Records of kl_category
-- ----------------------------
INSERT INTO `kl_category` VALUES ('1', '0', 'PHP', '', '0', '0', 'php栏目', '2017-08-04 10:52:25', 'kunlun');
INSERT INTO `kl_category` VALUES ('2', '1', '基础', '', '0', '0', 'php基础', '2017-08-04 12:42:46', 'kunlun');
INSERT INTO `kl_category` VALUES ('3', '1', '高级', '', '0', '0', 'php高级', '2017-08-04 12:43:06', 'kunlun');
INSERT INTO `kl_category` VALUES ('4', '1', '进阶', '', '0', '0', 'php进阶', '2017-08-04 12:43:24', 'kunlun');
INSERT INTO `kl_category` VALUES ('5', '1', '应用', '', '0', '0', 'php应用', '2017-08-04 12:43:42', 'kunlun');
INSERT INTO `kl_category` VALUES ('6', '1', '安全', '', '0', '0', 'php安全', '2017-08-04 12:43:55', 'kunlun');
INSERT INTO `kl_category` VALUES ('7', '0', 'MySQL', '', '0', '0', 'MySQL栏目', '2017-08-04 12:44:52', 'kunlun');

-- ----------------------------
-- Table structure for kl_function
-- ----------------------------
DROP TABLE IF EXISTS `kl_function`;
CREATE TABLE `kl_function` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父菜单id',
  `icon` varchar(64) NOT NULL DEFAULT '' COMMENT '菜单图标',
  `name` varchar(16) NOT NULL DEFAULT '' COMMENT '功能名称',
  `controller` varchar(32) NOT NULL DEFAULT '' COMMENT '控制器',
  `method` varchar(32) NOT NULL DEFAULT '' COMMENT '方法',
  `url` text COMMENT '跳转链接',
  `groupid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所在分组id',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '菜单状态，默认0，1禁用',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '菜单分组内排序',
  `remarks` text COMMENT '备注信息',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `created` varchar(16) NOT NULL DEFAULT '' COMMENT '操作者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='功能管理';

-- ----------------------------
-- Records of kl_function
-- ----------------------------
INSERT INTO `kl_function` VALUES ('12', '0', 'fa fa-file-picture-o', 'banner管理', 'banner', 'index', '', '7', '0', '0', '轮播图管理', '2017-04-24 11:59:17', 'root');
INSERT INTO `kl_function` VALUES ('13', '0', 'fa fa-tree', '分类管理', 'category', 'index', '', '7', '0', '0', '网站分类结构管理', '2017-04-26 15:21:46', 'root');
INSERT INTO `kl_function` VALUES ('14', '0', 'fa fa-newspaper-o', '文章管理', 'post', 'index', '', '7', '0', '0', '文章管理', '2017-08-01 09:39:55', 'root');

-- ----------------------------
-- Table structure for kl_function_group
-- ----------------------------
DROP TABLE IF EXISTS `kl_function_group`;
CREATE TABLE `kl_function_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '分组标题',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '分组排序',
  `remarks` text COMMENT '分组说明',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态，0正常，1禁用',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `created` varchar(16) NOT NULL DEFAULT '' COMMENT '操作者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='功能分组';

-- ----------------------------
-- Records of kl_function_group
-- ----------------------------
INSERT INTO `kl_function_group` VALUES ('7', 'phpstudybbs', '1', 'php学习论坛，分享php项目经验等', '0', '2017-04-24 11:54:46', 'root');

-- ----------------------------
-- Table structure for kl_post_basic
-- ----------------------------
DROP TABLE IF EXISTS `kl_post_basic`;
CREATE TABLE `kl_post_basic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '第一级分类id',
  `lid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后一级分类id',
  `author` varchar(16) NOT NULL DEFAULT '' COMMENT '作者',
  `authorid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '作者id',
  `title` varchar(128) NOT NULL COMMENT '文章标题',
  `tag` varchar(64) NOT NULL DEFAULT '' COMMENT '标签，多个标签逗号隔开',
  `abstract` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要',
  `thumbnail` text COMMENT '封面图片',
  `display_order` tinyint(1) NOT NULL DEFAULT '0' COMMENT '显示顺序， 默认0正常，1置顶1，2置顶2，3置顶3',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态，0正常，-2禁用， -1审核中',
  `views` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `comments` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论量',
  `likes` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点赞量',
  `unlikes` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '不喜欢点赞数量',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='文章基本信息';

-- ----------------------------
-- Records of kl_post_basic
-- ----------------------------
INSERT INTO `kl_post_basic` VALUES ('1', '1', '2', 'kunlun', '1', '如何写出优雅的PHP代码', '', '写出优秀的程序代码是一门艺术，要想如此，就必须在一开始就养成良好的编程习惯。良好的编程习惯不仅有助于项目初期的设计（如模块化），还可以使你编写的代码更易于理解，从而使代码的维护工作更轻松、更省力。不好的编程习惯则会造成代码bug，并且会使以后的维护工作困难重重。', '', '0', '0', '0', '0', '0', '0', '2017-08-04 12:52:22');

-- ----------------------------
-- Table structure for kl_posts
-- ----------------------------
DROP TABLE IF EXISTS `kl_posts`;
CREATE TABLE `kl_posts` (
  `bid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'post_basic id',
  `fid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '第一级分类id',
  `lid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后一级分类id',
  `title` text COMMENT '文章标题',
  `posts` text COMMENT '内容'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章内容信息';

-- ----------------------------
-- Records of kl_posts
-- ----------------------------
INSERT INTO `kl_posts` VALUES ('1', '1', '2', '如何写出优雅的PHP代码', '<p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">写出优秀的程序代码是一门艺术，要想如此，就必须在一开始就养成良好的编程习惯。良好的编程习惯不仅有助于项目初期的设计（如模块化），还可以使你编写的代码更易于理解，从而使代码的维护工作更轻松、更省力。不好的编程习惯则会造成代码bug，并且会使以后的维护工作困难重重。&nbsp;</p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">本文以PHP语言为例，介绍一些良好的编程习惯，希望能够对你有所帮助。&nbsp;</p><h2 style=\"margin: 0px; padding: 0px; font-size: 16px; font-weight: 400; word-wrap: break-word; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">1. 规划代码结构&nbsp;</h2><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">优秀的PHP代码应该有清晰的结构。PHP面向对象的特性允许程序员将应用程序分解为函数或方法。如果代码晦涩难懂，你也可以添加注释，使代码的功能一目了然。编码时应尽量将前端代码（HTML/CSS/JavaScript）与应用程序的服务端规则分开，或者你可以使用遵循MVC模式的PHP框架来构建你的应用程序。&nbsp;</p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;</p><h2 style=\"margin: 0px; padding: 0px; font-size: 16px; font-weight: 400; word-wrap: break-word; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">2. 编码风格统一&nbsp;</h2><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">优秀的PHP代码应该具备统一的风格。比如，为变量和函数制定统一的命名规则，为循环任务（比如数据库存取、错误处理）制定统一的接入标准，或者保持有规律的代码缩进，这些编码习惯都可以让别人阅读代码更加轻松。&nbsp;</p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;</p><h2 style=\"margin: 0px; padding: 0px; font-size: 16px; font-weight: 400; word-wrap: break-word; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">3. 可移植性&nbsp;</h2><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">优秀的PHP代码应该具有可移植性。程序员应学会运用PHP现有的特性（比如魔术引号和短标签等），应该了解产品需求，适应PHP的特点，保证写出的PHP代码具有可移植性和跨平台性。&nbsp;</p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;</p><h2 style=\"margin: 0px; padding: 0px; font-size: 16px; font-weight: 400; word-wrap: break-word; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">4. 代码安全性&nbsp;</h2><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">优秀的PHP代码应该具有安全性。PHP5具有卓越的特性和灵活性，但应用程序的安全往往掌握在程序员的手中。作为专业的PHP开发人员，应该对安全漏洞有一些深入了解，常见的安全漏洞有跨站脚本攻击（XSS）、跨站请求伪造（CSRF）、代码注入漏洞和字符编码漏洞等。使用PHP中的特定功能和函数（比如mysql_real_escape_string等）可以帮助程序员写出安全的代码。&nbsp;</p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;</p><h2 style=\"margin: 0px; padding: 0px; font-size: 16px; font-weight: 400; word-wrap: break-word; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">5. 添加注释&nbsp;</h2><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">代码注释是代码中的重要组成部分，它解释了函数运行的目的，这种注释会在代码以后的维护中提供非常有用的帮助。&nbsp;</p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;</p><h2 style=\"margin: 0px; padding: 0px; font-size: 16px; font-weight: 400; word-wrap: break-word; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">6. 避免简写标记&nbsp;</h2><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">应使用完整的起始标记，不推荐使用简写的起始标记。&nbsp;</p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;</p><h2 style=\"margin: 0px; padding: 0px; font-size: 16px; font-weight: 400; word-wrap: break-word; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">7. 用单引号代替双引号&nbsp;</h2><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">由于PHP会对双引号中的内容进行变量搜索，为了避免这种搜索带来的性能影响，程序员应该使用单引号引用字符串。&nbsp;</p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;</p><h2 style=\"margin: 0px; padding: 0px; font-size: 16px; font-weight: 400; word-wrap: break-word; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">8. 转义输出&nbsp;</h2><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">应该在htmlspecialchars函数中使用ENT_QUOTES参数，保证单引号（&#39;）也可以被转义。尽管没有规定必须这样做，但这是一个好习惯。&nbsp;</p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;</p><h2 style=\"margin: 0px; padding: 0px; font-size: 16px; font-weight: 400; word-wrap: break-word; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">9. 使用逗号隔开字符串输出&nbsp;</h2><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">字符串连接符（.）可以将单一的字符串传递给echo语句进行输出，与之相比，逗号可以实现echo语句中字符串的分别输出，这对PHP来说是一个性能改善。&nbsp;</p><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;</p><h2 style=\"margin: 0px; padding: 0px; font-size: 16px; font-weight: 400; word-wrap: break-word; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">10. 在输出前检查传递值&nbsp;</h2><p style=\"margin-top: 15px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">应该记得在输出前检查$_GET[&#39;query&#39;] 的传递值。使用isset函数或是empty函数可以检查变量值是否为空。</p><p><br/></p>');

-- ----------------------------
-- Table structure for kl_root_user
-- ----------------------------
DROP TABLE IF EXISTS `kl_root_user`;
CREATE TABLE `kl_root_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL DEFAULT '' COMMENT '用户名',
  `realname` varchar(8) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `avatar` text COMMENT '头像路径',
  `mobile` char(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '登陆密码',
  `encrypt` varchar(16) NOT NULL DEFAULT '' COMMENT '加密字符串',
  `login_times` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login_time` datetime DEFAULT NULL COMMENT '上次登陆时间',
  `last_login_ip` varchar(16) NOT NULL DEFAULT '' COMMENT '上次登录ip',
  `remarks` text COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户状态，0正常，1禁用',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统管理员';

-- ----------------------------
-- Records of kl_root_user
-- ----------------------------
INSERT INTO `kl_root_user` VALUES ('1', 'root', '', null, '', '9b17109f7dd9d06120d7293a6da95ffb', 'qFeWGIXm', '12', '2017-08-04 10:48:20', '121.35.181.20', null, '0', '2017-03-28 11:35:56');

-- ----------------------------
-- Table structure for kl_slide_banner
-- ----------------------------
DROP TABLE IF EXISTS `kl_slide_banner`;
CREATE TABLE `kl_slide_banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '分类id',
  `title` varchar(64) NOT NULL DEFAULT '' COMMENT '标题',
  `href` text COMMENT '跳转链接',
  `picture` text COMMENT '图片',
  `begin_time` datetime NOT NULL COMMENT '开始时间',
  `end_time` datetime NOT NULL COMMENT '结束时间',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序，越大越靠前',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态，0正常，1禁用',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `created` varchar(16) NOT NULL DEFAULT '' COMMENT '操作者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='轮播图';

-- ----------------------------
-- Records of kl_slide_banner
-- ----------------------------

-- ----------------------------
-- Table structure for kl_user
-- ----------------------------
DROP TABLE IF EXISTS `kl_user`;
CREATE TABLE `kl_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL DEFAULT '' COMMENT '用户名',
  `realname` varchar(8) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1男，2女',
  `mobile` char(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `avatar` text COMMENT '用户头像',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '登录密码',
  `encrypt` varchar(16) NOT NULL DEFAULT '' COMMENT '加密字符串',
  `login_times` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login_time` datetime DEFAULT NULL COMMENT '上次登陆时间',
  `last_login_ip` varchar(16) NOT NULL DEFAULT '' COMMENT '上次登录ip',
  `remarks` text COMMENT '备注',
  `authority` text COMMENT '用户权限',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户状态，0正常，1禁用',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of kl_user
-- ----------------------------
INSERT INTO `kl_user` VALUES ('1', 'kunlun', '孙振环', '0', '18679601581', 'avatar/2017/08/WzTytpacOlIG20170804141501.jpeg', '32333dee07d63cec2162910a369deb26', 'iXPWzqjm', '17', '2017-08-14 18:30:05', '61.144.175.138', '测试账号', '7|12,13,14|j1_1,12,13,14', '0', '2017-04-12 14:08:44');
SET FOREIGN_KEY_CHECKS=1;
