CREATE DATABASE  IF NOT EXISTS `tutu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `tutu`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tutu
-- ------------------------------------------------------
-- Server version	5.5.53

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tt_photo_album`
--

DROP TABLE IF EXISTS `tt_photo_album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_photo_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT '1' COMMENT '用户id\n1：默认用户',
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '相册名称',
  `describe` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `label` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '标签',
  `reads` int(11) DEFAULT '0' COMMENT '阅读数',
  `upvotes` int(11) DEFAULT '0' COMMENT '点赞数',
  `comments` int(11) DEFAULT '0' COMMENT '评论数',
  `reason` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '禁用、删除原因',
  `auditstatus` int(11) DEFAULT '1' COMMENT '审核状态：\r\n1：审核中\r\n2：审核通过\r\n3：审核失败',
  `createtime` int(20) DEFAULT NULL COMMENT '创建时间',
  `updatetime` int(20) DEFAULT NULL COMMENT '更新时间',
  `status` int(11) DEFAULT '1' COMMENT '状态：\r\n1：启用\r\n2：禁用\r\n3：删除',
  `ext1` decimal(10,4) DEFAULT NULL COMMENT '扩展字段',
  `ext2` decimal(10,4) DEFAULT NULL COMMENT '扩展字段',
  `ext3` int(11) DEFAULT NULL COMMENT '扩展字段',
  `ext4` int(11) DEFAULT NULL COMMENT '扩展字段',
  `ext5` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '扩展字段',
  `ext6` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '扩展字段',
  `ext7` text COLLATE utf8mb4_unicode_ci COMMENT '扩展字段',
  `ext8` text COLLATE utf8mb4_unicode_ci COMMENT '扩展字段',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='相册表';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-14 11:18:00
