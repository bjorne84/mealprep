<?php
abstract class PostModel extends Dbc {
    
    protected function setRecipe(&$arr) {
      
        /* */
        $User_ID = $arr['User_ID'];
        $title = $arr['headLine'];
        $short_description = $arr['short_description'];
        $step_by_step = $arr['step_by_step'];
        $port = $arr['port'];
        $imgPath = $arr['image_Name'];
        /* SQL-function now() have to be added direct in values and can not be binded with prepared statements*/
        $sql = "INSERT INTO Recipes (User_ID, Title, Short_description, Step_by_step, create_date, Portions, imgPath) VALUES(?, ?, ?, ?, now(), ?, ?)";
        /* connecting to database with parent-class and prepare the sql-quary*/ 
        $stmt = $this->connect()->prepare($sql);
        /* exexute the sql query*/
        $stmt->execute([$User_ID, $title, $short_description, $step_by_step, $port, $imgPath]);
        return true;
    }

    /* Gets all recipes and its data from a specific user, return array*/
    protected function getRecipesFromUser($User_ID) {
        $sql = "SELECT recipes.Recipe_ID, recipes.Title, recipes.Short_description, recipes.Step_by_step, 
        recipes.create_date, recipes.last_mod_date, recipes.Portions, recipes.imgPath, users.Username
        FROM recipes 
        JOIN users
            ON recipes.User_ID = users.User_ID
        WHERE recipes.User_ID  = $User_ID;";

        $stmt = $this->connect()->query($sql);
        /* fetch all is already set to associative array*/
        $result = $stmt->fetchAll();
        return $result;
      
    }


    /* Delete recipies */
    protected function deletePostSql($recipe) {
        $sql = "DELETE FROM recipes WHERE recipes.Recipe_ID = $recipe";
        $this->connect()->query($sql);
        return true;

    }

    protected function getAllPostsDB() {
        $sql = "SELECT recipes.Recipe_ID, recipes.Title, recipes.Short_description, recipes.Step_by_step, 
        recipes.create_date, recipes.last_mod_date, recipes.Portions, recipes.imgPath, users.Username
        FROM recipes 
        JOIN users
            ON recipes.User_ID = users.User_ID
        ORDER BY recipes.create_date DESC";
        $stmt = $this->connect()->query($sql);
        /* fetch all is already set to associative array*/
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function getAllUsersDB() {
        $sql ="SELECT Username, User_ID FROM users ORDER BY User_ID DESC";
        $stmt = $this->connect()->query($sql);
          /* fetch all is already set to associative array*/
          $result = $stmt->fetchAll();
          return $result;

    }

    protected function getUserById($id) {
        $sql = "SELECT username FROM users WHERE user_id = $id";
        $stmt = $this->connect()->query($sql);
        /* fetch all is already set to associative array*/
        $result = $stmt->fetch();
        return $result;

    }

    


    
}