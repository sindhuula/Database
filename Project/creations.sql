DROP TABLE IF EXISTS LanguageIndex;
DROP TABLE IF EXISTS LanguageCodes;
DROP TABLE IF EXISTS CountryCodes;
DROP TABLE IF EXISTS Users;
CREATE TABLE CountryCodes
(
	CountryID varchar(2) NOT NULL,
    Name varchar(40) NOT NULL,
    Area varchar(15) NOT NULL,
    primary key(CountryID)
);

LOAD DATA LOCAL INFILE 'C:/Users/Sindhuula/Desktop/Database/Project/ProjectData/CountryCodes.tab' 
INTO TABLE CountryCodes
FIELDS TERMINATED BY '\t' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

CREATE TABLE LanguageCodes
(
	LangID varchar(3) NOT NULL,
    CountryID varchar(2) NOT NULL,
    LangStatus varchar(1) NOT NULL,
    Name varchar(50) NOT NULL,
    primary key(LangID),
    foreign key(CountryID) references CountryCodes(CountryID)
);

LOAD DATA LOCAL INFILE 'C:/Users/Sindhuula/Desktop/Database/Project/ProjectData/LanguageCodes.tab' 
INTO TABLE LanguageCodes
FIELDS TERMINATED BY '\t' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

CREATE TABLE LanguageIndex
(
	LangID varchar(3) NOT NULL,
    CountryID varchar(2) NOT NULL,
    NameType varchar(3) NOT NULL,
    Name varchar(50) NOT NULL,
    foreign key(CountryID) references CountryCodes(CountryID)
);

LOAD DATA LOCAL INFILE 'C:/Users/Sindhuula/Desktop/Database/Project/ProjectData/LanguageIndex.tab' 
INTO TABLE LanguageIndex
FIELDS TERMINATED BY '\t' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

CREATE TABLE Users
(
	Username Varchar(20),
    Password Varchar(20)
)