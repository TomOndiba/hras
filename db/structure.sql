SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `user_role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `user_role` (
  `role_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `role_name` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`role_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `user` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `user_name` VARCHAR(100) NULL DEFAULT NULL ,
  `user_full_name` VARCHAR(255) NULL DEFAULT NULL ,
  `user_password` VARCHAR(45) NULL DEFAULT NULL ,
  `user_email` VARCHAR(45) NULL DEFAULT NULL ,
  `user_image` VARCHAR(255) NULL DEFAULT NULL ,
  `user_description` TEXT NULL DEFAULT NULL ,
  `user_role_role_id` INT(11) NULL ,
  `user_is_deleted` TINYINT(1) NULL DEFAULT 0 ,
  `user_input_date` TIMESTAMP NULL DEFAULT NULL ,
  `user_last_update` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
  PRIMARY KEY (`user_id`) ,
  INDEX `fk_user_user_role1_idx` (`user_role_role_id` ASC) ,
  CONSTRAINT `fk_user_user_role1`
    FOREIGN KEY (`user_role_role_id` )
    REFERENCES `user_role` (`role_id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `activity_log`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `activity_log` (
  `log_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `log_date` TIMESTAMP NULL DEFAULT NULL ,
  `log_action` VARCHAR(45) NULL DEFAULT NULL ,
  `log_module` VARCHAR(45) NULL DEFAULT NULL ,
  `log_info` TEXT NULL DEFAULT NULL ,
  `user_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`log_id`) ,
  INDEX `fk_g_activity_log_g_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_g_activity_log_g_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `user` (`user_id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `ci_sessions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ci_sessions` (
  `id` VARCHAR(40) NOT NULL ,
  `ip_address` VARCHAR(45) NOT NULL ,
  `timestamp` INT(10) UNSIGNED NOT NULL DEFAULT '0' ,
  `data` BLOB NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `ci_sessions_timestamp` (`timestamp` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mediamanager`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mediamanager` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `type` VARCHAR(45) NULL DEFAULT NULL ,
  `isfile` TINYINT(1) NULL DEFAULT '0' ,
  `label` TEXT NULL DEFAULT NULL ,
  `info` TEXT NULL DEFAULT NULL ,
  `upload_at` DATETIME NULL DEFAULT NULL ,
  `album_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `mediamanager_album`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mediamanager_album` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(255) NULL DEFAULT NULL ,
  `upload_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `posts_category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `posts_category` (
  `category_id` INT NOT NULL AUTO_INCREMENT ,
  `category_name` VARCHAR(100) NULL ,
  PRIMARY KEY (`category_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `posts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `posts` (
  `posts_id` INT NOT NULL AUTO_INCREMENT ,
  `posts_title` VARCHAR(255) NULL ,
  `posts_description` TEXT NULL ,
  `posts_image` VARCHAR(255) NULL ,
  `posts_published_date` TIMESTAMP NULL ,
  `posts_is_published` TINYINT(1) NULL DEFAULT 0 ,
  `posts_category_category_id` INT NULL ,
  `user_user_id` INT(11) NULL ,
  `posts_input_date` TIMESTAMP NULL ,
  `posts_last_update` TIMESTAMP NULL ,
  PRIMARY KEY (`posts_id`) ,
  INDEX `fk_posts_posts_category1_idx` (`posts_category_category_id` ASC) ,
  INDEX `fk_posts_user1_idx` (`user_user_id` ASC) ,
  CONSTRAINT `fk_posts_posts_category1`
    FOREIGN KEY (`posts_category_category_id` )
    REFERENCES `posts_category` (`category_id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_posts_user1`
    FOREIGN KEY (`user_user_id` )
    REFERENCES `user` (`user_id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `employe`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `employe` (
  `employe_id` INT NOT NULL AUTO_INCREMENT ,
  `employe_nik` VARCHAR(100) NULL ,
  `employe_name` VARCHAR(255) NULL ,
  `employe_address` TEXT NULL ,
  `employe_date_register` DATE NULL ,
  `employe_position` VARCHAR(100) NULL ,
  `employe_divisi` VARCHAR(255) NULL ,
  `employe_departement` VARCHAR(255) NULL ,
  `employe_phone` VARCHAR(45) NULL ,
  PRIMARY KEY (`employe_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memorandum1`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `memorandum1` (
  `memorandum_id` INT NOT NULL AUTO_INCREMENT ,
  `memorandum_employe_nik` VARCHAR(100) NULL ,
  `memorandum_employe_name` VARCHAR(255) NULL ,
  `memorandum_employe_position` VARCHAR(100) NULL ,
  `memorandum_employe_address` TEXT NULL ,
  `memorandum_employe_phone` VARCHAR(45) NULL ,
  `memorandum_number` VARCHAR(45) NULL ,
  `memorandum_email_date` DATE NULL ,
  `memorandum_absent_date` DATE NULL ,
  `memorandum_date_sent` DATE NULL ,
  `memorandum_call_date` DATE NULL ,
  `user_user_id` INT NULL ,
  `memorandum_is_present` TINYINT(1) NULL DEFAULT 0 ,
  `memorandum_finished_desc` TEXT NULL ,
  `memorandum_input_date` TIMESTAMP NULL ,
  `memorandum_last_update` TIMESTAMP NULL ,
  PRIMARY KEY (`memorandum_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memorandum2`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `memorandum2` (
  `memorandum_id` INT NOT NULL AUTO_INCREMENT ,
  `memorandum_number` VARCHAR(45) NULL ,
  `memorandum_date_sent` DATE NULL ,
  `memorandum_call_date` DATE NULL ,
  `memorandum1_memorandum_id` INT NULL ,
  `user_user_id` INT NULL ,
  `memorandum_is_present` TINYINT(1) NULL DEFAULT 0 ,
  `memorandum_input_date` TIMESTAMP NULL ,
  `memorandum_last_update` TIMESTAMP NULL ,
  PRIMARY KEY (`memorandum_id`) ,
  INDEX `fk_memorandum2_memorandum11_idx` (`memorandum1_memorandum_id` ASC) ,
  CONSTRAINT `fk_memorandum2_memorandum11`
    FOREIGN KEY (`memorandum1_memorandum_id` )
    REFERENCES `memorandum1` (`memorandum_id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memorandum3`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `memorandum3` (
  `memorandum_id` INT NOT NULL AUTO_INCREMENT ,
  `memorandum_number` VARCHAR(45) NULL ,
  `memorandum_date_sent` DATE NULL ,
  `memorandum_call_date` DATE NULL ,
  `memorandum2_memorandum_id` INT NULL ,
  `user_user_id` INT NULL ,
  `memorandum_is_present` TINYINT(1) NULL DEFAULT 0 ,
  `memorandum_input_date` TIMESTAMP NULL ,
  `memorandum_last_update` TIMESTAMP NULL ,
  PRIMARY KEY (`memorandum_id`) ,
  INDEX `fk_memorandum2_memorandum21_idx` (`memorandum2_memorandum_id` ASC) ,
  CONSTRAINT `fk_memorandum2_memorandum21`
    FOREIGN KEY (`memorandum2_memorandum_id` )
    REFERENCES `memorandum2` (`memorandum_id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bank`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bank` (
  `bank_id` INT NOT NULL AUTO_INCREMENT ,
  `bank_name` VARCHAR(100) NULL ,
  PRIMARY KEY (`bank_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `spb`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `spb` (
  `spb_id` INT NOT NULL AUTO_INCREMENT ,
  `spb_number` VARCHAR(45) NULL ,
  `spb_date` DATE NULL ,
  `bank_bank_id` INT NULL ,
  `user_user_id` INT NULL ,
  `spb_name1` VARCHAR(255) NULL ,
  `spb_nik1` VARCHAR(16) NULL ,
  `spb_name2` VARCHAR(255) NULL ,
  `spb_nik2` VARCHAR(16) NULL ,
  `spb_name3` VARCHAR(255) NULL ,
  `spb_nik3` VARCHAR(16) NULL ,
  `spb_name4` VARCHAR(255) NULL ,
  `spb_nik4` VARCHAR(16) NULL ,
  `spb_name5` VARCHAR(255) NULL ,
  `spb_nik5` VARCHAR(16) NULL ,
  `spb_name6` VARCHAR(255) NULL ,
  `spb_nik6` VARCHAR(16) NULL ,
  `spb_name7` VARCHAR(255) NULL ,
  `spb_nik7` VARCHAR(16) NULL ,
  `spb_name8` VARCHAR(255) NULL ,
  `spb_nik8` VARCHAR(16) NULL ,
  `spb_name9` VARCHAR(255) NULL ,
  `spb_nik9` VARCHAR(16) NULL ,
  `spb_name10` VARCHAR(255) NULL ,
  `spb_nik10` VARCHAR(16) NULL ,
  `spb_input_date` TIMESTAMP NULL ,
  `spb_last_update` TIMESTAMP NULL ,
  PRIMARY KEY (`spb_id`) ,
  INDEX `fk_spb_bank1_idx` (`bank_bank_id` ASC) ,
  CONSTRAINT `fk_spb_bank1`
    FOREIGN KEY (`bank_bank_id` )
    REFERENCES `bank` (`bank_id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sk`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sk` (
  `sk_id` INT NOT NULL AUTO_INCREMENT ,
  `sk_employe_nik` VARCHAR(8) NULL ,
  `sk_employe_name` VARCHAR(255) NULL ,
  `sk_employe_position` VARCHAR(100) NULL ,
  `sk_employe_date_register` DATE NULL ,
  `sk_number` VARCHAR(45) NULL ,
  `sk_description` TEXT NULL ,
  `sk_date` DATE NULL ,
  `user_user_id` INT NULL ,
  `sk_input_date` TIMESTAMP NULL ,
  `sk_last_update` TIMESTAMP NULL ,
  PRIMARY KEY (`sk_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contract`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `contract` (
  `contract_id` INT NOT NULL AUTO_INCREMENT ,
  `contract_employe_nik` VARCHAR(8) NULL ,
  `contract_employe_name` VARCHAR(255) NULL ,
  `contract_employe_position` VARCHAR(100) NULL ,
  `contract_number` VARCHAR(45) NULL ,
  `contract_ke` DECIMAL(10,0) NULL ,
  `contract_date` DATE NULL ,
  `user_user_id` INT NULL ,
  `contract_input_date` TIMESTAMP NULL ,
  `contract_last_update` TIMESTAMP NULL ,
  PRIMARY KEY (`contract_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `stl`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stl` (
  `stl_id` INT NOT NULL AUTO_INCREMENT ,
  `stl_employe_nik` VARCHAR(8) NULL ,
  `stl_employe_name` VARCHAR(255) NULL ,
  `stl_employe_position` VARCHAR(100) NULL ,
  `stl_number` VARCHAR(45) NULL ,
  `stl_date` DATE NULL ,
  `stl_batch` DECIMAL(10,0) NULL ,
  `stl_ipk` VARCHAR(45) NULL ,
  `stl_desc` VARCHAR(45) NULL ,
  `user_user_id` INT NULL ,
  `stl_input_date` TIMESTAMP NULL ,
  `stl_last_update` TIMESTAMP NULL ,
  PRIMARY KEY (`stl_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bpjs`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bpjs` (
  `bpjs_id` INT NOT NULL AUTO_INCREMENT ,
  `bpjs_noka` VARCHAR(100) NULL ,
  `bpjs_ktp` VARCHAR(16) NULL ,
  `bpjs_npp` VARCHAR(8) NULL ,
  `bpjs_name` VARCHAR(255) NULL ,
  `bpjs_hub` VARCHAR(45) NULL ,
  `bpjs_date` DATE NULL ,
  `bpjs_tmt` DATE NULL ,
  `bpjs_faskes` VARCHAR(255) NULL ,
  `bpjs_kelas` DECIMAL(10,0) NULL ,
  `bpjs_cetak` TINYINT(1) NULL DEFAULT 0 ,
  PRIMARY KEY (`bpjs_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `spm`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `spm` (
  `spm_id` INT NOT NULL AUTO_INCREMENT ,
  `spm_number` VARCHAR(45) NULL ,
  `spm_date` DATE NULL ,
  `spm_employe_name` VARCHAR(255) NULL ,
  `spm_employe_nik` VARCHAR(8) NULL ,
  `spm_employe_position` VARCHAR(100) NULL ,
  `spm_branch` VARCHAR(100) NULL ,
  `user_user_id` INT NULL ,
  `spm_input_date` TIMESTAMP NULL ,
  `spm_last_update` TIMESTAMP NULL ,
  PRIMARY KEY (`spm_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `procuration`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `procuration` (
  `procuration_id` INT NOT NULL AUTO_INCREMENT ,
  `procuration_number` VARCHAR(45) NULL ,
  `procuration_employe_nik` VARCHAR(8) NULL ,
  `procuration_employe_name` VARCHAR(255) NULL ,
  `procuration_employe_position` VARCHAR(100) NULL ,
  `procuration_desc` TEXT NULL ,
  `procuration_date` DATE NULL ,
  `user_user_id` INT NULL ,
  `procuration_input_date` TIMESTAMP NULL ,
  `procuration_last_update` TIMESTAMP NULL ,
  PRIMARY KEY (`procuration_id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
