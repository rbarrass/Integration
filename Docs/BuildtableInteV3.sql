CREATE TABLE Classrooms
(
  idCL serial,
  branchCL character varying(50),
  groupCL character(15),
  yearCL integer,
  CONSTRAINT Classrooms_pkey PRIMARY KEY (idCL)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE Classrooms
  OWNER TO raphael; 



CREATE TABLE Users
(
  idU serial,
  student_idU character(8) NOT NULL,
  nameU character varying(30) NOT NULL,
  surnameU character varying(30) NOT NULL,
  genderU character varying(30),
  emailU character varying(60),
  phoneU character(10),
  adrU character varying(100),
  passwordU character varying(50),
  profilimgU character varying(100),
  typeU character varying(50),
  validationU character varying(50),
  idCL integer,
  CONSTRAINT Users_pkey PRIMARY KEY (idU),
  CONSTRAINT Users_idCL_fkey FOREIGN KEY (idCL)
      REFERENCES Classrooms (idCL) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE Users
  OWNER TO raphael;


 CREATE TABLE Institutions
(
  idI serial,
  nameI character varying(50),
  adrI character varying(80),
  phoneI character(10),
  typeI character varying(50),
  idU integer,
  CONSTRAINT Institutions_pkey PRIMARY KEY (idI),
  CONSTRAINT Institutions_idU_fkey FOREIGN KEY (idU)
      REFERENCES Users (idU) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE Institutions
  OWNER TO raphael;


CREATE TABLE Contracts
(
  idCO serial,
  date_beginCO date,
  date_endCO date,
  containCO text,
  validate_apprenticeCO boolean,
  validate_internship_managerCO boolean,
  validate_tutorCO boolean,
  idI integer,
  id_apprenticeU integer,
  id_tutorU integer,
  id_managerU integer,
  CONSTRAINT Contracts_pkey PRIMARY KEY (idCO),
  CONSTRAINT Contracts_idI_fkey FOREIGN KEY (idI)
      REFERENCES Institutions (idI) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT Contracts_id_apprenticeU_fkey FOREIGN KEY (id_apprenticeU)
      REFERENCES Users (idU) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT Contracts_id_tutorU_fkey FOREIGN KEY (id_tutorU)
      REFERENCES Users (idU) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT Contracts_id_managerU_fkey FOREIGN KEY (id_managerU)
      REFERENCES Users (idU) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE Contracts
  OWNER TO raphael;




CREATE TABLE Missions
(
  idM serial,
  containM text,
  idCO integer,
  CONSTRAINT Missions_pkey PRIMARY KEY (idM),
  CONSTRAINT Missions_idCO_fkey FOREIGN KEY (idCO)
      REFERENCES Contracts (idCO) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE Missions
  OWNER TO raphael;


CREATE TABLE Reports
(
  idR serial,
  dateR date,
  containR text,
  gradeR integer,
  validate_apprenticeR boolean,
  validate_internship_managerR boolean,
  validate_tutorR boolean,
  idCO integer,
  id_apprenticeU integer,
  id_tutorU integer,
  id_managerU integer,
  CONSTRAINT Reports_pkey PRIMARY KEY (idR),
  CONSTRAINT Reports_idCO_fkey FOREIGN KEY (idCO)
      REFERENCES Contracts (idCO) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT Contracts_id_apprenticeU_fkey FOREIGN KEY (id_apprenticeU)
      REFERENCES Users (idU) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT Contracts_id_tutorU_fkey FOREIGN KEY (id_tutorU)
      REFERENCES Users (idU) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT Contracts_id_managerU_fkey FOREIGN KEY (id_managerU)
      REFERENCES Users (idU) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE Reports
  OWNER TO raphael;


 CREATE TABLE Logs
(
  idL serial,
  actionL character varying(30) NOT NULL,
  dateL date NOT NULL,
  ipL character varying(30) NOT NULL,
  typeL character varying(30) NOT NULL,
  id_actualU integer,
  idU integer,
  idR integer,
  idCL integer,
  idCO integer,
  idI integer,
  idM integer,
  
  CONSTRAINT Logs_pkey PRIMARY KEY (idL),
  CONSTRAINT Logs_id_actualU_fkey FOREIGN KEY (id_actualU)
      REFERENCES Users (idU) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT Logs_idU_fkey FOREIGN KEY (idU)
      REFERENCES Users (idU) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT Logs_idR_fkey FOREIGN KEY (idR)
      REFERENCES Reports (idR) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT Logs_idCL_fkey FOREIGN KEY (idCL)
      REFERENCES Classrooms (idCL) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT Logs_idCO_fkey FOREIGN KEY (idCO)
      REFERENCES Contracts (idCO) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT Logs_idI_fkey FOREIGN KEY (idI)
      REFERENCES Institutions (idI) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT Logs_idM_fkey FOREIGN KEY (idM)
      REFERENCES Missions (idM) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION

)
WITH (
  OIDS=FALSE
);
ALTER TABLE Users
  OWNER TO raphael;
