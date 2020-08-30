
/* right order */
CREATE TABLE Recipes (
    Recipe_ID INT(11),
    User_ID INT(11) NOT NULL,
    Title VARCHAR(255) NOT NULL,
    Short_description TEXT NOT NULL,
    Step_by_step TEXT NOT NULL,
    create_date DATETIME NOT NULL,
    last_mod_date DATETIME,
    Prep_time TINYINT(4),
    Category VARCHAR(50),
    Portions TINYINT(2),
    imgPath VARCHAR(150)
);


CREATE TABLE Users (
User_ID     INT(11),
Forname     VARCHAR(70),
Surname     VARCHAR(70),
Email       VARCHAR(100) NOT NULL,
IP_Address  VARBINARY(16),
Create_date DATETIME NOT NULL,
Username    VARCHAR(50) NOT NULL,
Pass        VARCHAR(255) NOT NULL
);


/* man måste nog sätta alla pk först*/ 
/*steg 1: pk Sets Primary key for the Recipe_ID*/
ALTER TABLE Recipes ADD CONSTRAINT Recipe_PK PRIMARY KEY (Recipe_ID);
/*Sets Primary key for the User_ID*/
ALTER TABLE Users ADD CONSTRAINT User_PK PRIMARY KEY (User_ID);

/* steg 2: auto increment*/

/*Sets AUTO INCREMENT*/
ALTER TABLE Recipes MODIFY Recipe_ID INTEGER AUTO_INCREMENT;
ALTER TABLE Recipes AUTO_INCREMENT=10001;


ALTER TABLE Users MODIFY User_ID INTEGER AUTO_INCREMENT;
ALTER TABLE Users AUTO_INCREMENT=1001;

/* steg 3: FK*/
/* Sets Foreign key*/
ALTER TABLE Recipes ADD CONSTRAINT Recipe_FK FOREIGN KEY (User_ID) REFERENCES Users (User_ID);


/* STEG 4 - ÖVRIGT*/
/* Create indexes for Title and Category*/
ALTER TABLE Recipes ADD INDEX Title_idx (Title);
ALTER TABLE Recipes ADD INDEX Category_idx (Category);
/* Set name of constrants and unique key for email and username*/
ALTER TABLE Users ADD CONSTRAINT Unique_Email UNIQUE (Email);
ALTER TABLE Users ADD CONSTRAINT Unique_Username UNIQUE (Username);



/* END right order */