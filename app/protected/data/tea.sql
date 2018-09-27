#奶茶店管理系统数据库

#管理员表
CREATE TABLE IF NOT EXISTS `adminer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `adminname` varchar(128) NOT NULL COMMENT '管理员用户名',
  `adminnum` varchar(128) NOT NULL COMMENT '管理员账户',
  `password` varchar(128) NOT NULL COMMENT 'MD5密码',
  `zspassword` varchar(128) NOT NULL COMMENT '真实密码',
  `eoc` int(10) NOT NULL COMMENT '管理员权限',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '加入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `adminer` (`id`, `adminname`, `adminnum` , `password`, `zspassword`, `eoc`, `datetime`) VALUES
(1, 'tcc1996', 'tcc1996', 'dcbacadf485c141a2b9b0028f2c0b2e1', 'tcc', 0, '2018-01-17 07:35:10');


#登陆记录
CREATE TABLE `adminhit`(
`id`   int(10)   unsigned NOT NULL AUTO_INCREMENT,
`aid`   int(10)   NOT NULL COMMENT '管理员id',
`ipadress`   varchar(32)   NOT NULL COMMENT 'ip地址',
`sorf`  int(10)   NOT NULL COMMENT '登陆状态码',
`datetime`   timestamp  NOT NULL  COMMENT '登陆时间',
PRIMARY KEY (`id`)
);

#创建登陆记录的查询视图
CREATE view adminhit_view
  as 
  SELECT a.id,aid,ipadress,sorf,a.datetime,b.adminnum FROM adminhit as a inner join adminer as b on a.aid=b.id;

#产品分类表
CREATE TABLE `product_class`(
`id`   int(10)   unsigned NOT NULL AUTO_INCREMENT,
`aid`   int(10)   NOT NULL COMMENT'由哪个管理员创建',
`classname`   varchar(128)   NOT NULL COMMENT'分类名',
`isok`   int(10)    NOT NULL COMMENT '是否展示分类',
`datetime`   timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
PRIMARY KEY (`id`)
);#逻辑外键aid对应adminer表的id

#产品管理表
CREATE TABLE `product`(
`id`   int(10)   unsigned NOT NULL AUTO_INCREMENT,
`aid`   int(10)   NOT NULL COMMENT '添加产品的管理员编号',
`cid`   int(10)   NOT NULL COMMENT '所在的分类',
`productname`   varchar(128)    NOT NULL COMMENT '产品名',
`isok`  int(10)   NOT NULL  COMMENT '是否在出售',
PRIMARY KEY (`id`)
);#逻辑外键aid对应adminer表的id,逻辑外键cid对应product_class表的id

#产品详细视图
CREATE TABLE `product_view`
  as
  SELECT a.id,cid,productname,b.classname FROM product as a inner join product_class as b on a.cid=b.id;

#详细产品表
CREATE TABLE `product_all`(
`id`    int(10)   unsigned NOT NULL  AUTO_INCREMENT COMMENT '产品详细id',
`pid`   int(10)    NOT NULL  COMMENT '对应的产品名',
`producttem`   varchar(24)   NOT NULL COMMENT '产品温度',
`productswt`   varchar(24)   NOT NULL COMMENT '甜度或口味',
`productsize`   int(10)    NOT NULL  COMMENT '产品大小',
`productyj`   varchar(32)   NOT NULL COMMENT '产品原价',
`productxj`   varchar(32)   NOT NULL COMMENT '产品现价',
`isok`   int(10)   NOT NULL  COMMENT '库存是否够用',
PRIMARY KEY (`id`)
);#逻辑外键pid对应product表的id

#产品操作历史表
CREATE TABLE  `product_his`(
`id`  int(10)   unsigned NOT NULL AUTO_INCREMENT,
`aid`   int(10)    NOT NULL  COMMENT '执行操作的管理员',
`op_table`  int(10)   NOT NULL COMMENT '所操作的表', 
`op_species`  int(10)   NOT NULL COMMENT '操作类型', 
`op_allid`   int(10)  NOT NULL COMMENT '所操作的详细产品',
`datetime`   timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT'操作时间',
PRIMARY KEY (`id`)
);#逻辑外键aid对应adminer表的id。op_table:0代表级别最高的product_class,1代表product,2代表product_all。op_species:0代表inset,1代表update,2代表delete
