ALTER TABLE `cities` ADD `description` TEXT NULL DEFAULT NULL AFTER `stateId`, ADD `image` VARCHAR(500) NULL DEFAULT NULL AFTER `description`;
-- for add description and image to city