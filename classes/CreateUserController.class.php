<?php
include_once('includes/functions.php');
class CreateUserController extends UserModel {
    
    public function registerUser() {
        $uData = [
            'forName' => '',
            'surName' => '',
            'email' => '',
            'IP_Address' => '',
            'userName' => '',
            'password' => '',
            'passwordRepeat' => ''
        ];

        /* ERROR-ARAY*/
        $errorData = [
            'message' => '',
            'forName' => '',
            'surName' => '',
            'email' => '',
            'userName' => ''
        ];

        /* POST-data get sanitizes from html/php/script-tags*/
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $uData = [
            'forName' => $_POST['forName'],
            'surName' => $_POST['surName'],
            'email' => $_POST['email'],
            'IP_Address' => '',
            'userName' => $_POST['userName'],
            'password' => $_POST['password'],
            'passwordRepeat' => $_POST['passwordRepeat']
        ];
        /* cData = cleanData, trim() function, delete whitespace*/
        $cData = array_map('trim', $uData);


        /* Error array to display errormessages and send back input-data 
        so users don´t have to fill in fields they already have filled in*/
        $errorData = [
            'message' => '',
            'forName' => $cData['forName'],
            'surName' => $cData['surName'],
            'email' => $cData['email'],
            'userName' => $cData['userName']
        ];

        /* If either of required fields are empty, error array with input-data and message. */
        if (empty($cData['email']) || empty($cData['userName']) || empty($cData['password']) || empty($cData['passwordRepeat'])) {
            $errorData['message'] = 'Alla fält markerade med stjärna måste fyllas i!';
            return $errorData;
            exit();
        }
     
         /*Email - VALIDATE that it is a correct e-mail-adress and
         that the email is already taken*/
        if (!filter_var($cData['email'], FILTER_VALIDATE_EMAIL)) {
            $errorData['message'] = 'Ange en korrekt e-post adress!';
            $errorData['email'] = '';
            return $errorData;
            exit();
        }   else {
            //check if email exist
            if($this->existInUserTable($cData['email'], 'Email')) {
                $errorData['message'] = 'Det finns redan en användare med den e-post adressen';
                $errorData['email'] = '';
                return $errorData;
                exit();
            }
        }  

        /*Username - Check if the chars are correct*/
        if(!preg_match('/^[a-öA-Ö0-9]{1,20}$/',$cData['userName'])) {
            $errorData['message'] = 'Användarnamnet kan enbart innehålla bokstäver och siffror och max 20 tecken långt!';
            $errorData['userName'] = '';
            return $errorData;
            exit();
        } else {
            //Check if username exist
            if($this->existInUserTable($cData['userName'], 'Username')) {
                $errorData['message'] = 'Användarnamnet är upptaget';
                $errorData['userName'] = '';
                return $errorData;
                exit();
            }
        }
    
         /*password - check length*/
        if (strlen($cData['password']) < 6) {
            $errorData['message'] = 'Lösenordet måste vara minst 6 tecken långt!';
            return $errorData;
            exit();
        } else {
            // check that password contains at least one number
            if(preg_match("/^(.{0,7}|[^a-ö]*|[^\d]*)$/i", $cData['password'])) {
            $errorData['message'] = 'Lösenordet måste innehålla minst en siffra!';
            return $errorData;
            exit();
            }
        }


         /*password repeat - check that password match*/
         if ($cData['password'] != $cData['passwordRepeat']) {
            $errorData['message'] = 'Lösenordet matchade inte, försök igen!';
            return $errorData;
            exit();
         }

         /* Delete passwordRepeat*/
         $cData['passwordRepeat'] = '';
          /* Hash password*/
          $cData['password'] = password_hash($cData['password'], PASSWORD_DEFAULT);

          /* Get IP-adress from user
          $ip = get_ip_address();*/
          $ip = '192.0.2.1';
          $ip_inet = "(inet6_aton('$ip'))";  
          $cData['IP_Address'] = $ip_inet;

          /* CREATE NEW ARRAY FOR INPUT*/
           $inArr = [
            'forName' => $cData['forName'],
            'surName' => $cData['surName'],
            'email' => $cData['email'],
            'IP-Address' => $cData['IP_Address'],
            'userName' => $cData['userName'],
            'password' => $cData['password']
           ];

           $forname = $inArr['forName'];
           $surName = $inArr['surName'];
           $email = $inArr['email'];
           $IP_Address = $inArr['IP-Address'];
           $userName = $inArr['userName'];
           $password = $inArr['password'];
        //Register user in database
         if ($this->regUserInDB($forname, $surName, $email, $IP_Address, $userName, $password)) {
             header('Location: logga-in.php');
         }  else {
             die('Någonting gick fel när användaren skulle sparas i databasen.');
         }
         //return $inArr;
    }

}