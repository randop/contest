CREATE DATABASE `contest_production`;

USE `contest_production`;

DROP TABLE IF EXISTS `contests`;
CREATE TABLE `contests` (
	`contest_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`contest_name` CHAR(255) NOT NULL DEFAULT '',
	`contest_description` TEXT,
	`contest_created_on` DATE DEFAULT NULL,
	PRIMARY KEY (contest_id)
);

DROP TABLE IF EXISTS `participants`;
CREATE TABLE `participants` (
	`participant_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`participant_name` CHAR(255) NOT NULL DEFAULT '',
	PRIMARY KEY (participant_id)
);

DROP TABLE IF EXISTS `contests_participants`;
CREATE TABLE `contests_participants` (
	`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`contest_id` BIGINT UNSIGNED NOT NULL,
	`participant_id` BIGINT UNSIGNED NOT NULL,
	`entry_date` DATE NULL,
	PRIMARY KEY (id),
	UNIQUE idx_cp (`contest_id`,`participant_id`)
);


CREATE DATABASE `contest_test`;