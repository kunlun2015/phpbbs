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
create table Kl_user(
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