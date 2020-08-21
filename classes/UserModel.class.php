<?php
class UserModel extends Dbc {


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




    protected function getUser($name) {
        $sql = "SELECT * FROM users WHERE user_firstName = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        /* Sparar resultat som en array som skickas vidare till
        annan view-klassen*/
        $result = $stmt->fetchAll();
        return $result;
    }


       //Find user by email. Email is passed in by the Controller.
       public function findUserByEmail2($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}