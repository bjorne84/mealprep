<?php
abstract class UserModel extends Dbc {


    /* Connects to the database and with prepared statements ask if
    email exist. Returns true or false.*/
    protected function findEmail($email) {
        $sql = "SELECT * FROM Users WHERE Email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            return true;
        }   else {
            return false;
        }

    }

      /* Connects to the database and with prepared statements ask if
    Username  exist. Returns true or false.*/
    protected function findUserName($user) {
        $sql = "SELECT * FROM Users WHERE Username  = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user]);

        if ($stmt->rowCount() > 0) {
            return true;
        }   else {
            return false;
        }

    }

     /* Check if data exist on a specific tablename in the Users 
    Connects to the database and ask with prepared statement. 
    
    Takes two arguments:
    1. $check = the data you want to controll, can be a email etc.
    2. $tablename = the tablename you want the control to be done in
    
    Returns true or false.*/
    protected function existInUserTable($check, $tablename) {
        $sql = "SELECT * FROM Users WHERE ".$tablename."  = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$check]);

        if ($stmt->rowCount() > 0) {
            return true;
        }   else {
            return false;
        }

    }
  

    protected function regUserInDB($forname, $surName, $email, $IP_Address, $userName, $password) {

        /* SQL-function now() have to be added direct in values and can not be binded with prepared statements*/
        $sql = "INSERT INTO Users (Forname, Surname, Email, IP_Address, Create_date, Username, Pass) VALUES(?, ?, ?, ?, now(), ?, ?)";
        /* connecting to database with parent-class and prepare the sql-quary*/ 
        $stmt = $this->connect()->prepare($sql);
        /* exexute the sql query*/
        $stmt->execute([$forname, $surName, $email, $IP_Address, $userName, $password]);
        return true;
    }

    /* Log the user in, check if password matches and returns array of userdata*/
    protected function logIn($user, $password) {
        $sql = "SELECT * FROM Users WHERE Username  = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user]);

        $result = $stmt->fetch();
        $hashedpass = $result["Pass"];

        /* check if the passwords match*/
        if (password_verify($password, $hashedpass)) {
            return $result;
        } else {
            return false;
        }
    }

    protected function getUser($name) {
        $sql = "SELECT * FROM users WHERE user_firstName = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        /* Sparar resultat som en array som skickas vidare till
        annan view-klassen*/
        $result = $stmt->fetchAll();
        return $result;
    }    

}