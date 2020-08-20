<?php

class CreateUserController extends UserModel {
    
    private $errors = "hej";

    public function registerUser() {
        $uData = [
            'foreName' => '',
            'surName' => '',
            'email' => '',
            'userName' => '',
            'password' => '',
            'passwordRepeat' => ''
        ];

        /* POST-data get sanitizes from html/php/script-tags*/
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $uData = [
            'foreName' => $_POST['foreName'],
            'surName' => $_POST['surName'],
            'email' => $_POST['email'],
            'userName' => $_POST['userName'],
            'password' => $_POST['password'],
            'passwordRepeat' => $_POST['passwordRepeat']
        ];
        /* cData = cleanData, trim() function, delete whitespace*/
        $cData = array_map('trim', $uData);
       
        if (empty($cData['email']) || empty($cData['userName']) || empty($cData['password']) || empty($cData['passwordRepeat'])) {
            // header("Location:index.php");
            header("Location:skapakonto.php?error=emptyfields&foreName=".$cData['forname']."&surName=".$cData['surName']."&email=".$cData['email']."&userName=".$cData['userName']);
            exit();
        }

        /*Username - taken, rätt tecken, tom*/

        /*email - taken, valideringsfunktion, tom*/

         /*password - rätt tecken tom*/
         /*password repeat - lika, tom*/

        //return var_dump($cData);
        $hej = "'<p>hej</p>'";
        return $hej;
    }

}