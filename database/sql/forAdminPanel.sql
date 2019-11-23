-- amaken Table
ALTER TABLE `amaken` ADD `boundArea` TINYINT(2) NULL AFTER `markaz`; -- 1 markaz, 2 hoome, 3 kharej
ALTER TABLE `amaken` ADD `kavir` TINYINT(1) NOT NULL DEFAULT '0' AFTER `darya`; -- add kavir to amaken

-- hotels Table
ALTER TABLE `hotels` ADD `boundArea` TINYINT(2) NULL AFTER `markaz`; -- 1 markaz, 2 hoome, 3 kharej, 4 tarikhi
ALTER TABLE `hotels` ADD `kavir` TINYINT(1) NOT NULL DEFAULT '0' AFTER `darya`; -- add kavir to hotels
ALTER TABLE `hotels` ADD `lunch` TINYINT(1) NOT NULL DEFAULT '0' AFTER `breakfast`;
ALTER TABLE `hotels` ADD `dinner` TINYINT(1) NOT NULL DEFAULT '0' AFTER `lunch`;
ALTER TABLE `hotels` ADD `momtaz` TINYINT(1) NULL DEFAULT '0' AFTER `rate_int`;

-- restaurant Table
ALTER TABLE `restaurant` ADD `boundArea` TINYINT(2) NULL AFTER `markaz`; -- 1 markaz, 2 hoome, 3 kharej, 4 tarikhi
ALTER TABLE `restaurant` ADD `kavir` TINYINT(1) NOT NULL DEFAULT '0' AFTER `darya`; -- add kavir to restaurant

-- adab TABLE
ALTER TABLE `adab` ADD `cityId` INT(11) NULL DEFAULT NULL AFTER `stateId`;

-- kindPlace TABLE
INSERT INTO `place` (`id`, `name`, `visibility`) VALUES ('10', 'صنایع سوغات', '1'), ('11', 'غذای محلی', '1');