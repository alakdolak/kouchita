ALTER TABLE `post` ADD `cityId` INT(11) NULL DEFAULT NULL AFTER `description`;
ALTER TABLE `post` CHANGE `date` `date` VARCHAR(8) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `post` CHANGE `time` `time` VARCHAR(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;