<?php
class LogController extends UserModel {

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

        if ($userLoggedIn) {
            /* userLoggedIn contains array of userdata */
            $this->setUserSession($userLoggedIn);
          
        }   else {
            $errorMsg = 'Användarnamnet eller lösenordet var fel försök igen!';
            return $errorMsg;
            exit();
        }
    }

    public function setUserSession($user) {
        session_start();
        $_SESSION['user_id'] = $user['User_ID'];
        $_SESSION['username'] = $user['Username'];
        $_SESSION['email'] = $user['Email'];
        header('Location: index.php?login=success');
        exit();
    }
}