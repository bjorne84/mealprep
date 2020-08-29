


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

