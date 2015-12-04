## 表结构

    CREATE TABLE `admin` (
      `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `nickname` varchar(20) NOT NULL DEFAULT '' COMMENT '用户昵称',
      `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号码',
      `email` varchar(30) NOT NULL DEFAULT '' COMMENT '邮箱',
      `password` varchar(32) NOT NULL DEFAULT '' COMMENT '加密后的密码',
      `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 有效  0 无效',
      `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`uid`),
      KEY `idx_mobile` (`mobile`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

    CREATE TABLE `book` (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `isbn` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'isbn编号',
      `bartype` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '类别:EAN13',
      `name` text COLLATE utf8_unicode_ci NOT NULL COMMENT '书名',
      `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '小标题',
      `creator` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '作者',
      `binding` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
      `pages` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '页数',
      `publish_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '出版时间',
      `publishing_house` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
      `tags` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '标签',
      `summary` text COLLATE utf8_unicode_ci NOT NULL COMMENT '简介',
      `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '网站内的url',
      `origin_image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '原图url',
      `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 有效 0 无效',
      `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`id`),
      UNIQUE KEY `isbn` (`isbn`)
    ) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


    CREATE TABLE `doubanmz` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `hash_key` varchar(32) NOT NULL DEFAULT '' COMMENT 'url md5',
      `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
      `image_url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片地址',
      `src_url` varchar(255) NOT NULL DEFAULT '' COMMENT 'url',
      `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 1：有效 0：无效',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`id`),
      KEY `idx_hash_key` (`hash_key`)
    ) ENGINE=InnoDB AUTO_INCREMENT=44501 DEFAULT CHARSET=utf8;

    CREATE TABLE `health_day` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `date` int(11) NOT NULL DEFAULT '0' COMMENT '日期',
      `quantity` int(11) NOT NULL DEFAULT '0' COMMENT '步数',
      `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最近更新时间',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`id`),
      UNIQUE KEY `idx_date` (`date`)
    ) ENGINE=InnoDB AUTO_INCREMENT=417 DEFAULT CHARSET=utf8;

    CREATE TABLE `health_log` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `date` int(11) NOT NULL DEFAULT '0' COMMENT '日期',
      `hash_key` varchar(32) NOT NULL DEFAULT '' COMMENT 'md5',
      `quantity` int(11) NOT NULL COMMENT '步数',
      `time_from` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '开始时间',
      `time_to` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '结束时间',
      `lat` float(10,6) NOT NULL DEFAULT '0.000000' COMMENT '经度',
      `lng` float(10,6) NOT NULL DEFAULT '0.000000' COMMENT '维度',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`id`),
      KEY `idx_date` (`date`),
      KEY `idx_hash_key` (`hash_key`)
    ) ENGINE=InnoDB AUTO_INCREMENT=112796 DEFAULT CHARSET=utf8;

    CREATE TABLE `images` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `bucket` varchar(10) NOT NULL DEFAULT 'pic1' COMMENT '图片来源',
      `hash_key` varchar(40) NOT NULL DEFAULT '' COMMENT '文件内容的md5',
      `filepath` varchar(100) NOT NULL DEFAULT '' COMMENT '文件路径',
      `filename` varchar(50) NOT NULL DEFAULT '' COMMENT '文件名称',
      `file_url` varchar(500) NOT NULL DEFAULT '' COMMENT '文件url',
      `target_id` int(11) NOT NULL COMMENT '目标ID,最好可以定位到id',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=420 DEFAULT CHARSET=utf8;


    CREATE TABLE `index_search` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
      `description` varchar(1000) NOT NULL DEFAULT '' COMMENT '描述',
      `book_id` int(11) NOT NULL DEFAULT '0' COMMENT 'book id',
      `post_id` int(11) NOT NULL DEFAULT '0' COMMENT 'post id',
      `search_key` varchar(1024) NOT NULL DEFAULT '' COMMENT '搜索字段',
      `image` varchar(200) NOT NULL DEFAULT '' COMMENT '图片地址',
      `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新时间',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`id`),
      KEY `idx_search_key` (`search_key`(255)),
      KEY `idx_book_id` (`book_id`),
      KEY `idx_post_id` (`post_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;


    CREATE TABLE `post_comments` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `log_id` bigint(20) NOT NULL DEFAULT '0',
      `post_id` int(11) NOT NULL DEFAULT '0' COMMENT '博客id',
      `ds_post_id` bigint(20) NOT NULL DEFAULT '0' COMMENT '多说评论id',
      `ds_thread_id` bigint(20) NOT NULL DEFAULT '0' COMMENT '博客在多说的id',
      `author_name` varchar(40) NOT NULL DEFAULT '' COMMENT '作者显示名',
      `author_email` varchar(50) NOT NULL DEFAULT '' COMMENT '作者邮箱',
      `author_url` varchar(512) NOT NULL DEFAULT '' COMMENT '作者网址',
      `ip` varchar(16) NOT NULL DEFAULT '' COMMENT '作者ip地址',
      `ds_created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '评论创建日期',
      `content` text NOT NULL COMMENT '评论内容',
      `parent_id` bigint(20) NOT NULL DEFAULT '0' COMMENT '父评论id',
      `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 有效 0 无效',
      `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最近更新时间',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`id`),
      UNIQUE KEY `idx_ds_post_id` (`ds_post_id`),
      KEY `idx_post_id` (`post_id`),
      KEY `idx_ds_thread_id` (`ds_thread_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


    CREATE TABLE `posts` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `uid` int(11) NOT NULL DEFAULT '0' COMMENT 'uid',
      `title` varchar(250) NOT NULL DEFAULT '' COMMENT '标题',
      `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 文章，2图片 3 视频 4 音频',
      `original` tinyint(1) NOT NULL DEFAULT '0' COMMENT '原创否 1原创 0 不是',
      `hot` int(11) NOT NULL DEFAULT '0' COMMENT '热门',
      `content` text NOT NULL COMMENT '内容',
      `tags` varchar(250) NOT NULL DEFAULT '' COMMENT 'tag',
      `image_url` varchar(256) NOT NULL DEFAULT '' COMMENT '封面图片''',
      `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 无效 1 有效',
      `comment_count` int(11) NOT NULL DEFAULT '0' COMMENT '评论总数',
      `updated_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
      `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
      PRIMARY KEY (`id`),
      KEY `idx_hot` (`hot`),
      KEY `idx_original` (`original`)
    ) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

    CREATE TABLE `posts_tags` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `posts_id` int(11) NOT NULL DEFAULT '0' COMMENT '博文id',
      `tag` varchar(20) NOT NULL DEFAULT '' COMMENT '博文tag',
      PRIMARY KEY (`id`),
      UNIQUE KEY `idx_unique` (`posts_id`,`tag`)
    ) ENGINE=InnoDB AUTO_INCREMENT=303 DEFAULT CHARSET=utf8;

    CREATE TABLE `rich_media` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `title` varchar(200) NOT NULL DEFAULT '' COMMENT '标题',
      `type` varchar(10) NOT NULL DEFAULT '' COMMENT '类型',
      `src_url` varchar(500) NOT NULL DEFAULT '' COMMENT '地址',
      `hash_url` varchar(40) NOT NULL DEFAULT '' COMMENT '地址的md5',
      `thumb_url` varchar(500) NOT NULL DEFAULT '' COMMENT '视频缩略图地址',
      `gps` text NOT NULL COMMENT 'gps信息',
      `tiff` text NOT NULL COMMENT 'tiff信息',
      `address` varchar(100) NOT NULL DEFAULT '' COMMENT '拍照地址',
      `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 1 有效 0 无效',
      `exif` text NOT NULL COMMENT '图片额外信息',
      `description` varchar(1000) NOT NULL DEFAULT '' COMMENT '备注，如果有的话',
      `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最近一次更新时间',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COMMENT='富媒体博文';

    CREATE TABLE `spider_queue` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `url` varchar(500) NOT NULL DEFAULT '',
      `hash_url` varchar(32) NOT NULL DEFAULT '' COMMENT 'url的md5',
      `status` tinyint(4) NOT NULL DEFAULT '-1' COMMENT '-2 等待处理 -1 表示处理中  0 表示失败或者不需要 1 表示成功',
      `post_id` int(11) NOT NULL COMMENT '文章ID',
      `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`id`),
      KEY `idx_hash_url` (`hash_url`)
    ) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='爬取文章队列表';

    CREATE TABLE `user` (
      `uid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户uid',
      `nickname` varchar(20) NOT NULL DEFAULT '' COMMENT '用户昵称',
      `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '用户手机号码',
      `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新时间',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`uid`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';


    CREATE TABLE `user_openid_unionid` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `uid` bigint(20) NOT NULL COMMENT '用户uid',
      `openid` varchar(50) NOT NULL DEFAULT '' COMMENT '微信openid',
      `unionid` char(50) NOT NULL DEFAULT '' COMMENT '微信unionid',
      `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最近一次更新时间',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`id`),
      UNIQUE KEY `idx_uid_openid` (`uid`,`openid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户和微信信息绑定';

    CREATE TABLE `wx_history` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `from_openid` varchar(64) NOT NULL DEFAULT '' COMMENT '发送方帐号',
      `to_openid` varchar(64) NOT NULL DEFAULT '' COMMENT '开发者微信号',
      `type` varchar(20) NOT NULL DEFAULT '' COMMENT '类型',
      `content` varchar(500) NOT NULL DEFAULT '' COMMENT '正文内容',
      `text` text NOT NULL COMMENT '全部内容xml',
      `source` varchar(30) NOT NULL DEFAULT '' COMMENT '来源',
      `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=utf8;