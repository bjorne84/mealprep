


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