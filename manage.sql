/*
 Navicat MySQL Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 80019
 Source Host           : localhost:3306
 Source Schema         : manage

 Target Server Type    : MySQL
 Target Server Version : 80019
 File Encoding         : 65001

 Date: 04/06/2020 01:22:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for custom
-- ----------------------------
DROP TABLE IF EXISTS `custom`;
CREATE TABLE `custom`  (
  `custom_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '客户编号',
  `custom_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '客户名称',
  `custom_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '客户类别',
  `custom_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '联系人',
  `custom_tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '联系电话',
  `custom_location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '通讯地址',
  `custom_remarks` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '备注',
  PRIMARY KEY (`custom_id`) USING BTREE,
  INDEX `custom_id`(`custom_id`, `custom_type`) USING BTREE,
  INDEX `custom_type`(`custom_type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of custom
-- ----------------------------
INSERT INTO `custom` VALUES (0000000001, '华为手机大卖场', '私营小公司', '赵明', '12345678', '平邑曾子学校对过', '无');

-- ----------------------------
-- Table structure for inorout
-- ----------------------------
DROP TABLE IF EXISTS `inorout`;
CREATE TABLE `inorout`  (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '操作编号',
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作类型',
  `productid` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT '产品编号',
  `birthdate` date NOT NULL COMMENT '生产日期',
  `price` double(10, 2) NOT NULL COMMENT '单价',
  `num` int(0) NOT NULL COMMENT '数量',
  `customid` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT '客户编号',
  `warehouseid` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT '仓库编号',
  `manager` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '经办人',
  `data` date NOT NULL COMMENT '日期',
  `mark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '标注',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `productid`(`productid`) USING BTREE,
  INDEX `customid`(`customid`) USING BTREE,
  INDEX `warehouseid`(`warehouseid`) USING BTREE,
  CONSTRAINT `inorout_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `inorout_ibfk_2` FOREIGN KEY (`customid`) REFERENCES `custom` (`custom_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `inorout_ibfk_3` FOREIGN KEY (`warehouseid`) REFERENCES `warehouse` (`warehouse_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of inorout
-- ----------------------------
INSERT INTO `inorout` VALUES (0000000002, '生产入库', 0000000020, '2020-07-02', 1.00, 1, 0000000001, 0000000001, '1', '2020-06-25', '1');
INSERT INTO `inorout` VALUES (0000000005, '采购入库', 0000000020, '2020-06-02', 1299.00, 100, 0000000001, 0000000001, '小黑', '2020-06-04', '无');
INSERT INTO `inorout` VALUES (0000000009, '退货出库', 0000000020, '2020-06-03', 2.00, 2, 0000000001, 0000000001, '小黑黑', '2020-06-04', '');
INSERT INTO `inorout` VALUES (0000000010, '退货出库', 0000000020, '2020-06-03', 1.00, 1, 0000000001, 0000000001, '1', '2020-06-03', '');
INSERT INTO `inorout` VALUES (0000000011, '退货出库', 0000000020, '2020-06-03', 2.00, 3, 0000000001, 0000000001, '小黑黑', '2020-06-03', '');
INSERT INTO `inorout` VALUES (0000000012, '用料出库', 0000000020, '2020-06-03', 1.00, 1, 0000000001, 0000000001, '哎腰围', '2020-06-03', '');
INSERT INTO `inorout` VALUES (0000000014, '退货入库', 0000000020, '2020-06-03', 1.00, 1, 0000000001, 0000000001, '1', '2020-07-11', '');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `product_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '产品编号',
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '产品名称',
  `product_standards` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '产品规格',
  `product_price` double(10, 2) NULL DEFAULT NULL COMMENT '参考价格',
  `product_maxnum` int(0) NULL DEFAULT NULL COMMENT '数量上限',
  `product_minnum` int(0) NULL DEFAULT NULL COMMENT '数量下限',
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (0000000020, 'Redmi k30 4G', '6+128', 1499.00, 1000, 1);

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock`  (
  `stock_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '存储编号',
  `product_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT '产品编号',
  `warehouse_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT '仓库编号',
  `product_inprice` double(10, 2) NOT NULL COMMENT '产品入库单价',
  `product_num` int(0) NOT NULL COMMENT '产品数量',
  `product_data` date NOT NULL COMMENT '生产日期',
  PRIMARY KEY (`stock_id`) USING BTREE,
  INDEX `产品编号`(`stock_id`) USING BTREE,
  INDEX `product_id`(`product_id`) USING BTREE,
  INDEX `stock_ibfk_2`(`warehouse_id`) USING BTREE,
  CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`warehouse_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stock
-- ----------------------------
INSERT INTO `stock` VALUES (0000000001, 0000000020, 0000000002, 100.00, 1001, '2020-06-09');
INSERT INTO `stock` VALUES (0000000004, 0000000020, 0000000001, 1.00, -5, '2020-07-09');

-- ----------------------------
-- Table structure for stock_statistics
-- ----------------------------
DROP TABLE IF EXISTS `stock_statistics`;
CREATE TABLE `stock_statistics`  (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT '产品编号',
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '变化类别',
  `num` int(0) NOT NULL COMMENT '数量变化',
  `data` datetime(0) NOT NULL COMMENT '时间'
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stock_statistics
-- ----------------------------
INSERT INTO `stock_statistics` VALUES (0000000020, '退货入库', 1, '2020-07-11 00:00:00');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `userid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2017040264', '陈凡亮', '2017040264');
INSERT INTO `users` VALUES ('2017040265', '杨宇萌', '2017040265');

-- ----------------------------
-- Table structure for warehouse
-- ----------------------------
DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE `warehouse`  (
  `warehouse_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '仓库编号',
  `warehouse_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '仓库名称',
  `warehouse_explain` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '仓库说明',
  PRIMARY KEY (`warehouse_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of warehouse
-- ----------------------------
INSERT INTO `warehouse` VALUES (0000000001, '手机仓库', '存放各种手机');
INSERT INTO `warehouse` VALUES (0000000002, '耳机仓库', '存放耳机');

SET FOREIGN_KEY_CHECKS = 1;
