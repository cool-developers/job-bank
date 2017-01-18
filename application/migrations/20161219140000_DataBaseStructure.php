<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_DataBaseStructure extends CI_Migration {

      public function up(){
      	
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`rol` (
		  `idRol` INT NOT NULL AUTO_INCREMENT,
		  `rolName` VARCHAR(45) NOT NULL,
		  PRIMARY KEY (`idRol`),
		  UNIQUE INDEX `rolName_UNIQUE` (`rolName` ASC))
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`user` (
		  `idUser` INT NOT NULL AUTO_INCREMENT,
		  `email` VARCHAR(45) NOT NULL,
		  `password` VARCHAR(128) NOT NULL,
		  `rol_idRol` INT NOT NULL,
		  `hash` VARCHAR(128) NOT NULL,
		  `active` TINYINT(1) NOT NULL,
		  PRIMARY KEY (`idUser`),
		  UNIQUE INDEX `Email_UNIQUE` (`email` ASC),
		  INDEX `fk_user_rol1_idx` (`rol_idRol` ASC),
		  CONSTRAINT `fk_user_rol1`
		    FOREIGN KEY (`rol_idRol`)
		    REFERENCES `jobBankDB`.`rol` (`idRol`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`department` (
		  `idDepartment` INT NOT NULL AUTO_INCREMENT,
		  `departmentName` VARCHAR(45) NOT NULL,
		  PRIMARY KEY (`idDepartment`),
		  UNIQUE INDEX `departmentName_UNIQUE` (`departmentName` ASC))
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`teacher` (
		  `user_idUser` INT NOT NULL,
		  `teacherName` VARCHAR(45) NOT NULL,
		  `department_idDepartment` INT NOT NULL,
		  PRIMARY KEY (`user_idUser`),
		  INDEX `fk_teacher_department1_idx` (`department_idDepartment` ASC),
		  CONSTRAINT `fk_teacher_user1`
		    FOREIGN KEY (`user_idUser`)
		    REFERENCES `jobBankDB`.`user` (`idUser`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_teacher_department1`
		    FOREIGN KEY (`department_idDepartment`)
		    REFERENCES `jobBankDB`.`department` (`idDepartment`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`province` (
		  `idProvince` INT NOT NULL AUTO_INCREMENT,
		  `provinceName` VARCHAR(45) NOT NULL,
		  PRIMARY KEY (`idProvince`))
		ENGINE = InnoDB
		");
		
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`town` (
		  `idTown` INT NOT NULL AUTO_INCREMENT,
		  `townName` VARCHAR(45) NOT NULL,
		  `province_idProvince` INT NOT NULL,
		  PRIMARY KEY (`idTown`),
		  INDEX `fk_town_province1_idx` (`province_idProvince` ASC),
		  CONSTRAINT `fk_town_province1`
		    FOREIGN KEY (`province_idProvince`)
		    REFERENCES `jobBankDB`.`province` (`idProvince`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`applicant` (
		  `user_idUser` INT NOT NULL,
		  `applicantName` VARCHAR(45) NOT NULL,
		  `applicantLastName` VARCHAR(45) NOT NULL,
		  `applicantId` VARCHAR(19) NOT NULL,
		  `applicantBirthDate` DATE NOT NULL,
		  `applicantPostcode` VARCHAR(10) NOT NULL,
		  `town_idTown` INT NOT NULL,
		  `applicantAddress` VARCHAR(45) NULL,
		  `applicantWorkPermit` TINYINT(1) NOT NULL,
		  `applicantPhone1` VARCHAR(15) NULL,
		  `applicantPhone2` VARCHAR(15) NULL,
		  `applicantDriverLicense` TINYINT(1) NOT NULL,
		  `applicantVehicle` TINYINT(1) NOT NULL,
		  `applicantWorkStatus` TINYINT(1) NOT NULL,
		  `applicantStatus` TINYINT(1) NOT NULL,
		  `applicantLastConnection` DATE NOT NULL,
		  UNIQUE INDEX `DNI_UNIQUE` (`applicantId` ASC),
		  PRIMARY KEY (`user_idUser`),
		  INDEX `fk_applicant_user1_idx` (`user_idUser` ASC),
		  INDEX `fk_applicant_town1_idx` (`town_idTown` ASC),
		  CONSTRAINT `fk_applicant_user1`
		    FOREIGN KEY (`user_idUser`)
		    REFERENCES `jobBankDB`.`user` (`idUser`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_applicant_town1`
		    FOREIGN KEY (`town_idTown`)
		    REFERENCES `jobBankDB`.`town` (`idTown`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");		
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`language` (
		  `idLanguage` INT NOT NULL AUTO_INCREMENT,
		  `languageName` VARCHAR(45) NOT NULL,
		  PRIMARY KEY (`idLanguage`))
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`enterprise` (
		  `user_idUser` INT NOT NULL,
		  `enterpriseName` VARCHAR(45) NOT NULL,
		  `town_idTown` INT NOT NULL,
		  INDEX `fk_enterprise_user1_idx` (`user_idUser` ASC),
		  INDEX `fk_enterprise_town1_idx` (`town_idTown` ASC),
		  PRIMARY KEY (`user_idUser`),
		  CONSTRAINT `fk_enterprise_user1`
		    FOREIGN KEY (`user_idUser`)
		    REFERENCES `jobBankDB`.`user` (`idUser`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_enterprise_town1`
		    FOREIGN KEY (`town_idTown`)
		    REFERENCES `jobBankDB`.`town` (`idTown`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`titulation` (
		  `idTitulation` INT NOT NULL AUTO_INCREMENT,
		  `titulationName` VARCHAR(45) NOT NULL,
		  PRIMARY KEY (`idTitulation`),
		  UNIQUE INDEX `titulationName_UNIQUE` (`titulationName` ASC))
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`gradeTitle` (
		  `idGradeTitle` INT NOT NULL AUTO_INCREMENT,
		  `gradeTitleName` VARCHAR(45) NOT NULL,
		  `titulation_idTitulation` INT NOT NULL,
		  `department_idDepartment` INT NOT NULL,
		  PRIMARY KEY (`idGradeTitle`),
		  INDEX `fk_gradeTitle_titulation1_idx` (`titulation_idTitulation` ASC),
		  INDEX `fk_gradeTitle_department1_idx` (`department_idDepartment` ASC),
		  CONSTRAINT `fk_gradeTitle_titulation1`
		    FOREIGN KEY (`titulation_idTitulation`)
		    REFERENCES `jobBankDB`.`titulation` (`idTitulation`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_gradeTitle_department1`
		    FOREIGN KEY (`department_idDepartment`)
		    REFERENCES `jobBankDB`.`department` (`idDepartment`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`notification` (
		  `idNotification` INT NOT NULL AUTO_INCREMENT,
		  `notificationName` VARCHAR(45) NOT NULL,		
		  PRIMARY KEY (`idNotification`))
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`knowledge` (
		  `idKnowledge` INT NOT NULL AUTO_INCREMENT,
		  `knowledgeName` VARCHAR(45) NOT NULL,
		  `knowledgeEnable` TINYINT(1) NOT NULL,
		  PRIMARY KEY (`idKnowledge`))
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`function` (
		  `idFunction` INT NOT NULL AUTO_INCREMENT,
		  `functionName` VARCHAR(45) NOT NULL,
		  PRIMARY KEY (`idFunction`))
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`professionalLevel` (
		  `idProfessionalLevel` INT NOT NULL AUTO_INCREMENT,
		  `professionalLevelName` VARCHAR(45) NOT NULL,
		  PRIMARY KEY (`idProfessionalLevel`))
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`languageTitle` (
		  `idLanguageTitle` INT NOT NULL AUTO_INCREMENT,
		  `languageTitleName` VARCHAR(45) NULL,
		  PRIMARY KEY (`idLanguageTitle`))
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`languageLevel` (
		  `idLanguageLevel` INT NOT NULL AUTO_INCREMENT,
		  `languageLevelName` VARCHAR(45) NOT NULL,
		  PRIMARY KEY (`idLanguageLevel`),
		  UNIQUE INDEX `languageLevelName_UNIQUE` (`languageLevelName` ASC))
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`day` (
		  `idDay` INT NOT NULL AUTO_INCREMENT,
		  `dayName` VARCHAR(45) NOT NULL,
		  PRIMARY KEY (`idDay`),
		  UNIQUE INDEX `dayName_UNIQUE` (`dayName` ASC))
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`contract` (
		  `idContract` INT NOT NULL AUTO_INCREMENT,
		  `contractName` VARCHAR(45) NOT NULL,
		  PRIMARY KEY (`idContract`),
		  UNIQUE INDEX `contractName_UNIQUE` (`contractName` ASC))
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`offer` (
		  `idOffer` INT NOT NULL AUTO_INCREMENT,
		  `offerJobTitle` VARCHAR(45) NOT NULL,
		  `offerEnterpriseName` VARCHAR(45) NOT NULL,
		  `offerEnterpriseEmail` VARCHAR(45) NOT NULL,
		  `offerEnterpisePhone` VARCHAR(15) NULL,
		  `offerStartDate` DATE NOT NULL,
		  `offerEndDate` DATE NULL,
		  `offerType` TINYINT(1) NOT NULL,
		  `offerDescription` TEXT NULL,
		  `offerVacant` INT NOT NULL,
		  `gradeTitle_idGradeTitle` INT NOT NULL,
		  `contract_idContract` INT NOT NULL,
		  `day_idDay` INT NOT NULL,
		  PRIMARY KEY (`idOffer`),
		  INDEX `fk_offer_gradeTitle1_idx` (`gradeTitle_idGradeTitle` ASC),
		  INDEX `fk_offer_contract1_idx` (`contract_idContract` ASC),
		  INDEX `fk_offer_day1_idx` (`day_idDay` ASC),
		  CONSTRAINT `fk_offer_gradeTitle1`
		    FOREIGN KEY (`gradeTitle_idGradeTitle`)
		    REFERENCES `jobBankDB`.`gradeTitle` (`idGradeTitle`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_offer_contract1`
		    FOREIGN KEY (`contract_idContract`)
		    REFERENCES `jobBankDB`.`contract` (`idContract`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_offer_day1`
		    FOREIGN KEY (`day_idDay`)
		    REFERENCES `jobBankDB`.`day` (`idDay`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`user_has_notification` (
		  `user_idUser` INT NOT NULL,
		  `notification_idNotification` INT NOT NULL,
		  `offer_idOffer` INT NULL,
		  `notificationDescription` VARCHAR(45) NOT NULL,
		  PRIMARY KEY (`user_idUser`, `notification_idNotification`),
		  INDEX `fk_user_has_notification_notification1_idx` (`notification_idNotification` ASC),
		  INDEX `fk_user_has_notification_user1_idx` (`user_idUser` ASC),
		  INDEX `fk_user_has_notification_offer1_idx` (`offer_idOffer` ASC),
		  CONSTRAINT `fk_user_has_notification_user1`
		    FOREIGN KEY (`user_idUser`)
		    REFERENCES `jobBankDB`.`user` (`idUser`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_user_has_notification_notification1`
		    FOREIGN KEY (`notification_idNotification`)
		    REFERENCES `jobBankDB`.`notification` (`idNotification`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_user_has_notification_offer1`
		    FOREIGN KEY (`offer_idOffer`)
		    REFERENCES `jobBankDB`.`offer` (`idOffer`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`offer_has_knowledge` (
		  `offer_idOffer` INT NOT NULL,
		  `knowledge_idKnowledge` INT NOT NULL,
		  `offer_has_knowledgeTime` VARCHAR(45) NULL,
		  PRIMARY KEY (`offer_idOffer`, `knowledge_idKnowledge`),
		  INDEX `fk_offer_has_knowledge_knowledge1_idx` (`knowledge_idKnowledge` ASC),
		  INDEX `fk_offer_has_knowledge_offer1_idx` (`offer_idOffer` ASC),
		  CONSTRAINT `fk_offer_has_knowledge_offer1`
		    FOREIGN KEY (`offer_idOffer`)
		    REFERENCES `jobBankDB`.`offer` (`idOffer`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_offer_has_knowledge_knowledge1`
		    FOREIGN KEY (`knowledge_idKnowledge`)
		    REFERENCES `jobBankDB`.`knowledge` (`idKnowledge`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`offer_has_language` (
		  `offer_idOffer` INT NOT NULL,
		  `language_idLanguage` INT NOT NULL,
		  `languageTitle_idLanguageTitle` INT NOT NULL,
		  `languageReadLevel_idLanguageLevel` INT NOT NULL,
		  `languageWriteLevel_idLanguageLevel` INT NOT NULL,
		  `languageListenLevel_idLanguageLevel2` INT NOT NULL,
		  `languageSpeakLevel_idLanguageLevel` INT NOT NULL,
		  `languageExpresateLevel_idLanguageLevel` INT NOT NULL,
		  PRIMARY KEY (`offer_idOffer`, `language_idLanguage`),
		  INDEX `fk_offer_has_language_language1_idx` (`language_idLanguage` ASC),
		  INDEX `fk_offer_has_language_offer1_idx` (`offer_idOffer` ASC),
		  INDEX `fk_offer_has_language_languageTitle1_idx` (`languageTitle_idLanguageTitle` ASC),
		  INDEX `fk_offer_has_language_languageLevel1_idx` (`languageReadLevel_idLanguageLevel` ASC),
		  INDEX `fk_offer_has_language_languageLevel2_idx` (`languageWriteLevel_idLanguageLevel` ASC),
		  INDEX `fk_offer_has_language_languageLevel3_idx` (`languageListenLevel_idLanguageLevel2` ASC),
		  INDEX `fk_offer_has_language_languageLevel4_idx` (`languageSpeakLevel_idLanguageLevel` ASC),
		  INDEX `fk_offer_has_language_languageLevel5_idx` (`languageExpresateLevel_idLanguageLevel` ASC),
		  CONSTRAINT `fk_offer_has_language_offer1`
		    FOREIGN KEY (`offer_idOffer`)
		    REFERENCES `jobBankDB`.`offer` (`idOffer`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_offer_has_language_language1`
		    FOREIGN KEY (`language_idLanguage`)
		    REFERENCES `jobBankDB`.`language` (`idLanguage`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_offer_has_language_languageTitle1`
		    FOREIGN KEY (`languageTitle_idLanguageTitle`)
		    REFERENCES `jobBankDB`.`languageTitle` (`idLanguageTitle`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_offer_has_language_languageLevel1`
		    FOREIGN KEY (`languageReadLevel_idLanguageLevel`)
		    REFERENCES `jobBankDB`.`languageLevel` (`idLanguageLevel`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_offer_has_language_languageLevel2`
		    FOREIGN KEY (`languageWriteLevel_idLanguageLevel`)
		    REFERENCES `jobBankDB`.`languageLevel` (`idLanguageLevel`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_offer_has_language_languageLevel3`
		    FOREIGN KEY (`languageListenLevel_idLanguageLevel2`)
		    REFERENCES `jobBankDB`.`languageLevel` (`idLanguageLevel`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_offer_has_language_languageLevel4`
		    FOREIGN KEY (`languageSpeakLevel_idLanguageLevel`)
		    REFERENCES `jobBankDB`.`languageLevel` (`idLanguageLevel`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_offer_has_language_languageLevel5`
		    FOREIGN KEY (`languageExpresateLevel_idLanguageLevel`)
		    REFERENCES `jobBankDB`.`languageLevel` (`idLanguageLevel`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`applicant_has_language` (
		  `applicant_user_idUser` INT NOT NULL,
		  `language_idLanguage` INT NOT NULL,
		  `languageTitle_idLanguageTitle` INT NOT NULL,
		  `languageReadLevel_idLanguageLevel` INT NOT NULL,
		  `languageWriteLevel_idLanguageLevel` INT NOT NULL,
		  `languageListenLevel_idLanguageLevel` INT NOT NULL,
		  `languageSpeakLevel_idLanguageLevel` INT NOT NULL,
		  `languageExpresateLevel_idLanguageLevel` INT NOT NULL,
		  PRIMARY KEY (`applicant_user_idUser`, `language_idLanguage`),
		  INDEX `fk_applicant_has_language_language1_idx` (`language_idLanguage` ASC),
		  INDEX `fk_applicant_has_language_applicant1_idx` (`applicant_user_idUser` ASC),
		  INDEX `fk_applicant_has_language_languageTitle1_idx` (`languageTitle_idLanguageTitle` ASC),
		  INDEX `fk_applicant_has_language_languageLevel1_idx` (`languageReadLevel_idLanguageLevel` ASC),
		  INDEX `fk_applicant_has_language_languageLevel2_idx` (`languageWriteLevel_idLanguageLevel` ASC),
		  INDEX `fk_applicant_has_language_languageLevel3_idx` (`languageListenLevel_idLanguageLevel` ASC),
		  INDEX `fk_applicant_has_language_languageLevel4_idx` (`languageSpeakLevel_idLanguageLevel` ASC),
		  INDEX `fk_applicant_has_language_languageLevel5_idx` (`languageExpresateLevel_idLanguageLevel` ASC),
		  CONSTRAINT `fk_applicant_has_language_applicant1`
		    FOREIGN KEY (`applicant_user_idUser`)
		    REFERENCES `jobBankDB`.`applicant` (`user_idUser`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_applicant_has_language_language1`
		    FOREIGN KEY (`language_idLanguage`)
		    REFERENCES `jobBankDB`.`language` (`idLanguage`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_applicant_has_language_languageTitle1`
		    FOREIGN KEY (`languageTitle_idLanguageTitle`)
		    REFERENCES `jobBankDB`.`languageTitle` (`idLanguageTitle`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_applicant_has_language_languageLevel1`
		    FOREIGN KEY (`languageReadLevel_idLanguageLevel`)
		    REFERENCES `jobBankDB`.`languageLevel` (`idLanguageLevel`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_applicant_has_language_languageLevel2`
		    FOREIGN KEY (`languageWriteLevel_idLanguageLevel`)
		    REFERENCES `jobBankDB`.`languageLevel` (`idLanguageLevel`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_applicant_has_language_languageLevel3`
		    FOREIGN KEY (`languageListenLevel_idLanguageLevel`)
		    REFERENCES `jobBankDB`.`languageLevel` (`idLanguageLevel`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_applicant_has_language_languageLevel4`
		    FOREIGN KEY (`languageSpeakLevel_idLanguageLevel`)
		    REFERENCES `jobBankDB`.`languageLevel` (`idLanguageLevel`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_applicant_has_language_languageLevel5`
		    FOREIGN KEY (`languageExpresateLevel_idLanguageLevel`)
		    REFERENCES `jobBankDB`.`languageLevel` (`idLanguageLevel`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`experience` (
		  `idExperience` INT NOT NULL AUTO_INCREMENT,
		  `experienceEnterpriseName` VARCHAR(45) NOT NULL,
		  `experienceWorkstationName` VARCHAR(45) NOT NULL,
		  `experienceDateStart` DATE NOT NULL,
		  `experienceDateEnd` DATE NULL,
		  `experienceDescription` TEXT NULL,
		  `applicant_user_idUser` INT NOT NULL,
		  `professionalLevel_idProfessionalLevel` INT NOT NULL,
		  `function_idFunction` INT NOT NULL,
		  PRIMARY KEY (`idExperience`),
		  INDEX `fk_experience_applicant1_idx` (`applicant_user_idUser` ASC),
		  INDEX `fk_experience_professionalLevel1_idx` (`professionalLevel_idProfessionalLevel` ASC),
		  INDEX `fk_experience_function1_idx` (`function_idFunction` ASC),
		  CONSTRAINT `fk_experience_applicant1`
		    FOREIGN KEY (`applicant_user_idUser`)
		    REFERENCES `jobBankDB`.`applicant` (`user_idUser`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_experience_professionalLevel1`
		    FOREIGN KEY (`professionalLevel_idProfessionalLevel`)
		    REFERENCES `jobBankDB`.`professionalLevel` (`idProfessionalLevel`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_experience_function1`
		    FOREIGN KEY (`function_idFunction`)
		    REFERENCES `jobBankDB`.`function` (`idFunction`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`applicant_has_knowledge` (
		  `applicant_user_idUser` INT NOT NULL,
		  `knowledge_idKnowledge` INT NOT NULL,
		  `experience_idExperience` INT NULL,
		  `applicant_has_knowledgeTime` VARCHAR(45) NULL,
		  PRIMARY KEY (`applicant_user_idUser`, `knowledge_idKnowledge`),
		  INDEX `fk_applicant_has_knowledge_knowledge1_idx` (`knowledge_idKnowledge` ASC),
		  INDEX `fk_applicant_has_knowledge_applicant1_idx` (`applicant_user_idUser` ASC),
		  INDEX `fk_applicant_has_knowledge_experience1_idx` (`experience_idExperience` ASC),
		  CONSTRAINT `fk_applicant_has_knowledge_applicant1`
		    FOREIGN KEY (`applicant_user_idUser`)
		    REFERENCES `jobBankDB`.`applicant` (`user_idUser`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_applicant_has_knowledge_knowledge1`
		    FOREIGN KEY (`knowledge_idKnowledge`)
		    REFERENCES `jobBankDB`.`knowledge` (`idKnowledge`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_applicant_has_knowledge_experience1`
		    FOREIGN KEY (`experience_idExperience`)
		    REFERENCES `jobBankDB`.`experience` (`idExperience`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`offer_has_applicant` (
		  `offer_idOffer` INT NOT NULL,
		  `applicant_user_idUser` INT NOT NULL,
		  PRIMARY KEY (`offer_idOffer`, `applicant_user_idUser`),
		  INDEX `fk_offer_has_applicant_applicant1_idx` (`applicant_user_idUser` ASC),
		  INDEX `fk_offer_has_applicant_offer1_idx` (`offer_idOffer` ASC),
		  CONSTRAINT `fk_offer_has_applicant_offer1`
		    FOREIGN KEY (`offer_idOffer`)
		    REFERENCES `jobBankDB`.`offer` (`idOffer`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_offer_has_applicant_applicant1`
		    FOREIGN KEY (`applicant_user_idUser`)
		    REFERENCES `jobBankDB`.`applicant` (`user_idUser`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
		$this->db->query("
		CREATE TABLE IF NOT EXISTS `jobBankDB`.`applicant_has_gradeTitle` (
		  `applicant_user_idUser` INT NOT NULL,
		  `gradeTitle_idGradeTitle` INT NOT NULL,
		  `applicant_has_gradeTitleStartDate` DATE NOT NULL,
		  `applicant_has_gradeTitleEndDate` DATE NULL,
		  `applicant_has_gradeTitleName` VARCHAR(45) NOT NULL,
		  `applicant_has_gradeTitleTitulation` VARCHAR(45) NOT NULL,
		  PRIMARY KEY (`applicant_user_idUser`, `gradeTitle_idGradeTitle`),
		  INDEX `fk_applicant_has_gradeTitle_gradeTitle1_idx` (`gradeTitle_idGradeTitle` ASC),
		  INDEX `fk_applicant_has_gradeTitle_applicant1_idx` (`applicant_user_idUser` ASC),
		  CONSTRAINT `fk_applicant_has_gradeTitle_applicant1`
		    FOREIGN KEY (`applicant_user_idUser`)
		    REFERENCES `jobBankDB`.`applicant` (`user_idUser`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `fk_applicant_has_gradeTitle_gradeTitle1`
		    FOREIGN KEY (`gradeTitle_idGradeTitle`)
		    REFERENCES `jobBankDB`.`gradeTitle` (`idGradeTitle`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION)
		ENGINE = InnoDB
		");
		
	}

	 
        public function down() {
        	$this->db->query("SET FOREIGN_KEY_CHECKS=0");        			  		
	  		$this->dbforge->drop_table('applicant');
	  		$this->dbforge->drop_table('applicant_has_knowledge');
	  		$this->dbforge->drop_table('applicant_has_language');
	  		$this->dbforge->drop_table('applicant_has_gradeTitle');
	  		$this->dbforge->drop_table('contract');
	  		$this->dbforge->drop_table('day');
	  		$this->dbforge->drop_table('department');
	  		$this->dbforge->drop_table('enterprise');
	  		$this->dbforge->drop_table('experience');
	  		$this->dbforge->drop_table('function');
	  		$this->dbforge->drop_table('gradetitle');
	  		$this->dbforge->drop_table('knowledge');
	  		$this->dbforge->drop_table('language');
	  		$this->dbforge->drop_table('languagelevel');
	  		$this->dbforge->drop_table('languagetitle');
	  		$this->dbforge->drop_table('notification');
	  		$this->dbforge->drop_table('offer');
	  		$this->dbforge->drop_table('offer_has_applicant');
	  		$this->dbforge->drop_table('offer_has_knowledge');
			$this->dbforge->drop_table('offer_has_language');
	  		$this->dbforge->drop_table('professionallevel');
	  		$this->dbforge->drop_table('province');
	  		$this->dbforge->drop_table('rol');
	  		$this->dbforge->drop_table('teacher');
	  		$this->dbforge->drop_table('titulation');
			$this->dbforge->drop_table('town');
	  		$this->dbforge->drop_table('user');
	  		$this->dbforge->drop_table('user_has_notification');	
	  		$this->db->query("SET FOREIGN_KEY_CHECKS=1");  
	  			
	    }
}
?>