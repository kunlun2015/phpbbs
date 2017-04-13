#table struct
#系统管理员
create table kl_root_user(
    id int unsigned primary key auto_increment,
    username varchar(16) not null default '' comment '用户名',
    realname varchar(8) not null default '' comment '真实姓名',
    avatar text  comment '头像路径',
    mobile char(11) not null default '' comment '手机号码',
    password varchar(32) not null default '' comment '登陆密码',
    encrypt varchar(16) not null default '' comment '加密字符串',
    login_times int unsigned not null default 0 comment '登录次数',
    last_login_time datetime comment '上次登陆时间',
    last_login_ip varchar(16) not null default '' comment '上次登录ip',
    remarks text comment '备注',
    status tinyint(1) not null default 0 comment '用户状态，0正常，1禁用',
    create_at TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP comment '创建时间',
    unique username(username(16))
)charset = utf8 engine = innodb comment ="系统管理员";

#用户表
create table kl_user(
    id int unsigned primary key auto_increment,
    username varchar(16) not null default '' comment '用户名',
    realname varchar(8) not null default '' comment '真实姓名',
    sex tinyint(1) not null default 0 comment '1男，2女',
    mobile char(11) not null default '' comment '手机号码',
    avatar text comment '用户头像',
    password varchar(32) not null default '' comment '登录密码',
    encrypt varchar(16) not null default '' comment '加密字符串',
    login_times int unsigned not null default 0 comment '登录次数',
    last_login_time datetime comment '上次登陆时间',
    last_login_ip varchar(16) not null default '' comment '上次登录ip',
    remarks text comment '备注',
    authority text comment '用户权限',
    status tinyint(1) not null default 0 comment '用户状态，0正常，1禁用',
    create_at TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP comment '创建时间',
    unique username(username(16))
)charset = utf8 engine = innodb comment ="用户表";

INSERT INTO `kl_root_user` (`id`, `username`, `realname`, `avatar`, `mobile`, `password`, `encrypt`, `login_times`, `last_login_time`, `last_login_ip`, `remarks`, `status`, `create_at`) VALUES
    (1, 'root', '', NULL, '', '1920284cad7e656c2c7678cecba5cc41', 'rjlJNbSD', 6, '2017-04-06 12:56:23', '::1', NULL, 0, '2017-03-28 11:35:56');

#功能管理
create table kl_function(
    id int unsigned primary key auto_increment,
    parent_id int unsigned not null default 0 comment '父菜单id',
    icon varchar(64) not null default '' comment '菜单图标',
    name varchar(16) not null default '' comment '功能名称',
    controller varchar(32) not null default '' comment '控制器',
    method varchar(32) not null  default '' comment '方法',
    url text comment '跳转链接',
    groupid int unsigned not null default 0 comment '所在分组id',
    status tinyint(1) not null default 0 comment '菜单状态，默认0，1禁用',
    sort int unsigned not null default 0 comment '菜单分组内排序',
    remarks text comment '备注信息',
    create_at TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP comment '创建时间',
    created varchar(16) not null default '' comment '操作者'
)charset = utf8 engine = innodb comment ="功能管理";

#功能分组
create table kl_function_group(
    id int unsigned primary key auto_increment,
    name varchar(32) not null default '' comment '分组标题',
    sort tinyint not null default 0 comment '分组排序',
    remarks text comment '分组说明',
    status tinyint(1) not null default 0 comment '状态，0正常，1禁用',
    create_at TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP comment '创建时间',
    created varchar(16) not null default '' comment '操作者'
)charset = utf8 engine = innodb comment ="功能分组";