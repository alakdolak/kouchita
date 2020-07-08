
-- 2020-06-30
ALTER TABLE `hotels` ADD `seen` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `author`;
ALTER TABLE `amaken` ADD `seen` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `author`;
ALTER TABLE `mahaliFood` ADD `seen` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `author`;
ALTER TABLE `majara` ADD `seen` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `slug`;
ALTER TABLE `boomgardies` ADD `seen` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `author`;
ALTER TABLE `restaurant` ADD `seen` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `author`;
ALTER TABLE `sogatSanaies` ADD `seen` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `author`;

ALTER TABLE `hotels` ADD `reviewCount` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `seen`;
ALTER TABLE `amaken` ADD `reviewCount` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `seen`;
ALTER TABLE `mahaliFood` ADD `reviewCount` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `seen`;
ALTER TABLE `majara` ADD `reviewCount` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `seen`;
ALTER TABLE `boomgardies` ADD `reviewCount` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `seen`;
ALTER TABLE `restaurant` ADD `reviewCount` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `seen`;
ALTER TABLE `sogatSanaies` ADD `reviewCount` INT(11) UNSIGNED NOT NULL DEFAULT '0' AFTER `seen`;

ALTER TABLE `hotels` ADD `fullRate` FLOAT(5)  NOT NULL DEFAULT '0' AFTER `reviewCount`;
ALTER TABLE `amaken` ADD `fullRate` FLOAT(5)  NOT NULL DEFAULT '0' AFTER `reviewCount`;
ALTER TABLE `mahaliFood` ADD `fullRate` FLOAT(5)  NOT NULL DEFAULT '0' AFTER `reviewCount`;
ALTER TABLE `majara` ADD `fullRate` FLOAT(5)  NOT NULL DEFAULT '0' AFTER `reviewCount`;
ALTER TABLE `boomgardies` ADD `fullRate` FLOAT(5)  NOT NULL DEFAULT '0' AFTER `reviewCount`;
ALTER TABLE `restaurant` ADD `fullRate` FLOAT(5)  NOT NULL DEFAULT '0' AFTER `reviewCount`;
ALTER TABLE `sogatSanaies` ADD `fullRate` FLOAT(5)  NOT NULL DEFAULT '0' AFTER `reviewCount`;

-- 2020-07-06
--  'alert' Table
