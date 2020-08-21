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
            if($this->findEmail($cData['email'])) {
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
         /*password repeat - lika, tom*/

    }

}