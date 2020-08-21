<?php

class CreateUserController extends UserModel {
    
    private $hej;

    public function registerUser() {
        $uData = [
            'forName' => '',
            'surName' => '',
            'email' => '',
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
    
         /*password - rätt tecken tom*/
        if (strlen($_POST['password']) < 6) {
            $errorData['message'] = 'Lösenordet måste vara minst 6 tecken långt!';
            return $errorData;
            exit();
        } else {
            if(preg_match("/^(.{0,7}|[^a-ö]*|[^\d]*)$/i", $_POST['password'])) {
            $errorData['message'] = 'Lösenordet måste innehålla minst en siffra!';
            return $errorData;
            exit();
            }
        }


         /*password repeat - lika, tom*/
         if ($_POST['password'] != $_POST['passwordRepeat']) {
            $errorData['message'] = 'Lösenordet matchade inte, försök igen!';
            return $errorData;
            exit();
         }

          // Hash password
          $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    }

}