-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: aresapp
-- Source Schemata: aresapp
-- Created: Sat Apr 18 10:33:54 2015
-- Workbench Version: 6.3.2
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;;

-- ----------------------------------------------------------------------------
-- Schema aresapp
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `aresapp` ;
CREATE SCHEMA IF NOT EXISTS `aresapp` ;

-- ----------------------------------------------------------------------------
-- Table aresapp.player
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `aresapp`.`player` (
  `playerName` TEXT NOT NULL,
  `playerEmail` TEXT NOT NULL,
  `playerUserName` TEXT NOT NULL,
  `playerId` INT(8) NOT NULL AUTO_INCREMENT,
  `playerWins` INT(3) NOT NULL,
  `playerLosses` INT(3) NOT NULL,
  `playerCity` TEXT NOT NULL,
  `playerState` TEXT NOT NULL,
  `playerPhone` TEXT NOT NULL,
  `playerPosition` TEXT NOT NULL,
  `playerPassword` TEXT NOT NULL,
  PRIMARY KEY (`playerId`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;

-- ----------------------------------------------------------------------------
-- Table aresapp.team
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `aresapp`.`team` (
  `teamId` INT(7) NOT NULL AUTO_INCREMENT,
  `teamName` TEXT CHARACTER SET 'utf16' NOT NULL,
  `teamCaptain` TEXT NOT NULL,
  `teamCity` TEXT NOT NULL,
  `teamState` TEXT NOT NULL,
  `teamWins` INT(3) NOT NULL,
  `teamLosses` INT(3) NOT NULL,
  PRIMARY KEY (`teamId`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;

-- ----------------------------------------------------------------------------
-- Table aresapp.teamplayer
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `aresapp`.`teamplayer` (
  `teamId` INT(8) NOT NULL,
  `playerId` INT(8) NOT NULL,
  `jerseyNum` INT(2) NOT NULL,
  PRIMARY KEY (`teamId`, `playerId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
SET FOREIGN_KEY_CHECKS = 1;;
