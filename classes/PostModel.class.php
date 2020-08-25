<?php
abstract class PostModel extends Dbc {
    
    protected function setRecipe(&$arr, $createORmodify) {

        /* $createORmodify = skickar med ett värde av antingen */
        function create_date($createORmodify) {
        if($createORmodify === true) {
            return 'create_date';
        } else if ($createORmodify === false) {
            return 'last_mod_date';
        }
    }
        $datevalue = create_date($createORmodify);

        /* */
        $User_ID = $arr['User_ID'];
        $title = $arr['headLine'];
        $short_description = $arr['short_description'];
        $step_by_step = $arr['step_by_step'];
        $port = $arr['port'];

        /* SQL-function now() have to be added direct in values and can not be binded with prepared statements*/
        $sql = "INSERT INTO Recipes (User_ID, Title, Short_description, Step_by_step, $datevalue, Portions) VALUES(?, ?, ?, ?, now(), ?)";
        /* connecting to database with parent-class and prepare the sql-quary*/ 
        $stmt = $this->connect()->prepare($sql);
        /* exexute the sql query*/
        $stmt->execute([$User_ID, $title, $short_description, $step_by_step, $port]);
        return true;
    }
}