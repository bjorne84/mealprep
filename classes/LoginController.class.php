<?php
include('includes/functions.php');
class LoginContoller extends UserModel {

    public function logInUser() {

        $data = [
            'userName' => '',
            'password' => ''
        ];

        /* POST-data get sanitizes from html/php/script-tags*/
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'userName' => $_POST['userName'],
            'password' => $_POST['password'],
        ];

         /* cData = cleanData, trim() function, delete whitespace*/
         $cData = array_map('trim', $data);

         /* If either of required fields are empty, error message is displayed. */
        if (empty($cData['userName']) || empty($cData['password'])) {
            $errorMsg = 'Du måste ange både användarnamn och lösenord!';
            return $errorMsg;
            exit();
        } 

        $userLoggedIn = $this->logIn($cData['userName'], $cData['password']);

        /*if ($userLoggedIn) {
            $this->SetUserSession($userLoggedIn);
        }   else {
            $errorMsg = 'Användarnamnet eller lösenordet var fel försök igen!';
            return $errorMsg;
            exit();
        }*/
    }

}