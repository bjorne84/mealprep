<?php
abstract class PostModel extends Dbc {
    
    protected function setRecipe(&$arr) {

        /* $createORmodify = skickar med ett värde av antingen */
      
        /* */
        $User_ID = $arr['User_ID'];
        $title = $arr['headLine'];
        $short_description = $arr['short_description'];
        $step_by_step = $arr['step_by_step'];
        $port = $arr['port'];

        /* SQL-function now() have to be added direct in values and can not be binded with prepared statements*/
        $sql = "INSERT INTO Recipes (User_ID, Title, Short_description, Step_by_step, create_date, Portions) VALUES(?, ?, ?, ?, now(), ?)";
        /* connecting to database with parent-class and prepare the sql-quary*/ 
        $stmt = $this->connect()->prepare($sql);
        /* exexute the sql query*/
        $stmt->execute([$User_ID, $title, $short_description, $step_by_step, $port]);
        return true;
    }
}