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
            'forName' => 'test',
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
       
        if (empty($cData['email']) || empty($cData['userName']) || empty($cData['password']) || empty($cData['passwordRepeat'])) {
            $errorData = [
                'message' => 'Alla fält markerade med stjärna måste fyllas i!',
                'forName' => $cData['forName'],
                'surName' => $cData['surName'],
                'email' => $cData['email'],
                'userName' => $cData['userName']
            ];
            return $errorData;
            // header("Location:index.php");
            //header("Location:skapakonto.php?error=emptyfields&foreName=".$cData['forname']."&surName=".$cData['surName']."&email=".$cData['email']."&userName=".$cData['userName']);
            exit();
        }
        else {
            return $errorData; 
        }

        /*Username - taken, rätt tecken, tom*/

        /*email - taken, valideringsfunktion, tom*/

         /*password - rätt tecken tom*/
         /*password repeat - lika, tom*/

        //return var_dump($cData);
        $this->hej = "längst ner";
        return $this->hej;
    }

}