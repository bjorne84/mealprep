


/* Plocka ut alla recept från en användare*/
SELECT Recipe_ID FROM recipes WHERE User_ID = 1010;
SELECT Recipe_id, Title, prep_time FROM recipes WHERE prep_time <=30;


SELECT title FROM recipes;



SELECT Username, User_ID FROM users ORDER BY User_ID DESC;
/*ALLA RECEPT med titel och recept id samt användarnamn från en enskild
användare:*/
SELECT recipes.Recipe_ID,  recipes.Title, users.Username
FROM recipes 
JOIN users
	ON recipes.User_ID = users.User_ID
WHERE recipes.User_ID  = 1011;



SELECT username FROM users WHERE user_id = 1003;

SELECT recipes.Recipe_ID, recipes.Title, recipes.Short_description, recipes.Step_by_step, 
        recipes.create_date, recipes.last_mod_date, recipes.Portions, recipes.imgPath, users.Username, users.User_ID
        FROM recipes 
        JOIN users
            ON recipes.Recipe_ID = users.Recipe_ID
		WHERE recipes.Recipe_ID = 10088;	

SELECT recipes.Recipe_ID, recipes.Title, recipes.Short_description, recipes.Step_by_step, 
recipes.create_date, recipes.last_mod_date, recipes.Portions, recipes.imgPath, users.Username, users.User_ID 
	FROM recipes 
	JOIN users 
		ON recipes.User_ID = users.User_ID 
	WHERE recipes.Recipe_ID = 10088;


UPDATE Customers
SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
WHERE CustomerID = 1;

UPDATE Recipes
	SET Title = "UPPDATERAT MSQL"
WHERE Recipe_ID = 10100;


UPDATE Recipes
	SET Title = '?', Short_description = '?', Step_by_step = '?', last_mod_date = now(), Portions = '?', imgPath = '?'
WHERE Recipe_ID = '?';


INSERT INTO Recipes (User_ID, Title, Short_description,
 Step_by_step, last_mod_date, Portions, imgPath) VALUES(?, ?, ?, ?, now(), ?, ?);



/* detta fungerar*/
 UPDATE Recipes
        SET Title = 'update' , Short_description = 'updaterat', Step_by_step = 'updaterat', last_mod_date = now(), Portions = 4, imgPath = null
    WHERE Recipe_ID = 10099;


$sql = "UPDATE Recipes
        SET Title = '$title' , Short_description = '$short_description', Step_by_step = '$step_by_step', last_mod_date = now(), Portions = $port, imgPath = '$imgPath'
    WHERE Recipe_ID = $recipeToUpdate";

    
//$User_ID = $arr['User_ID'];
        $title = $arr['headLine'];
        $short_description = $arr['short_description'];
        $step_by_step = $arr['step_by_step'];
        $port = $arr['port'];
        $imgPath = $arr['image_Name'];
        /* SQL-function now() have to be added direct in values and can not be binded with prepared statements*/
        $sql = "UPDATE Recipes
        SET Title = '$title' , Short_description = '$short_description', Step_by_step = '$step_by_step', last_mod_date = now(), Portions = $port, imgPath = '$imgPath'
    WHERE Recipe_ID = $recipeToUpdate";
        $this->connect()->query($sql);
        /* connecting to database with parent-class and prepare the sql-quary
        $stmt = $this->connect()->prepare($sql);
        /* exexute the sql query
        $stmt->execute([$title, $short_description, $step_by_step, $port, $imgPath]);
        $stmt = $this->connect()->prepare($sql);*/ 
        return true;








/* sql fråga för max fem, kräver sql 8 eller senare*/
SELECT r.Recipe_ID, r.Title, r.Short_description, r.Step_by_step, r.create_date, 
r.last_mod_date, r.Portions, r.imgPath, users.Username 
FROM ( SELECT r.*, ROW_NUMBER() OVER(PARTITION BY User_ID ORDER BY create_date DESC) rn 
FROM recipes r ) r 
INNER JOIN users ON r.User_ID = users.User_ID 
WHERE r.rn <= 5 ORDER BY r.create_date DESC; 



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
Forname     VARCHAR(70) NOT NULL,
Surname     VARCHAR(70) NOT NULL,
Email       VARCHAR(100) NOT NULL,
IP_Address  VARBINARY(16),
Create_date DATETIME NOT NULL,
Username    VARCHAR(50) NOT NULL,
Pass        VARCHAR(255) NOT NULL
);


/* sql fråga för max fem, kräver sql 8 eller senare*/
SELECT r.Recipe_ID, r.Title, r.Short_description, r.Step_by_step, r.create_date, 
r.last_mod_date, r.Portions, r.imgPath, users.Username 
FROM ( SELECT r.*, ROW_NUMBER() OVER(PARTITION BY User_ID ORDER BY create_date DESC) rn 
FROM recipes r ) r 
INNER JOIN users ON r.User_ID = users.User_ID 
WHERE r.rn <= 5 ORDER BY r.create_date DESC; 


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





Insert into Users (Forname, Surname , Email, Create_date, Username, Pass)
    values('Björn', 'Edin', 'bjed1500@student.miun.se', now(), 'bjorne', 'password01');


INSERT INTO Recipes (User_ID, Title, Short_description, Step_by_step, create_date)
VALUES (1001, 'ägg med kaviar', 'Ett kokat ägg med kaviar, så enkelt men ack så gott.',
'1. Koka upp rikligt med vatten.<br> 1. Lägg i ägget och koka i 5min<br>3. Servera med kaviar.', now());






/*----Recipes table----------*/
/*Sets Primary key for the Recipe_ID*/
ALTER TABLE Recipes ADD CONSTRAINT Recipe_PK PRIMARY KEY (Recipe_ID);


/* Sets Foreign key*/
ALTER TABLE Recipes ADD CONSTRAINT Recipe_FK FOREIGN KEY (User_ID) REFERENCES Users (User_ID);
/*Sets AUTO INCREMENT*/
ALTER TABLE Recipes MODIFY Recipe_ID INTEGER AUTO_INCREMENT;
ALTER TABLE Recipes AUTO_INCREMENT=10001;

/* Create indexes for Title and Category*/
ALTER TABLE Recipes ADD INDEX Title_idx (Title);
ALTER TABLE Recipes ADD INDEX Category_idx (Category);


/*---Users table------*/

/*Sets Primary key for the User_ID*/
ALTER TABLE Users ADD CONSTRAINT User_PK PRIMARY KEY (User_ID);
/*Sets AUTO INCREMENT*/
ALTER TABLE Users MODIFY User_ID INTEGER AUTO_INCREMENT;
ALTER TABLE Users AUTO_INCREMENT=1001;

/* Set name of constrants and unique key for email and username*/
ALTER TABLE Users ADD CONSTRAINT Unique_Email UNIQUE (Email);
ALTER TABLE Users ADD CONSTRAINT Unique_Username UNIQUE (Username);