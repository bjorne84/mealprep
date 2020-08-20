<?php

class CreateUserController extends UserModel {


    public function registerUser() {
        $data = [
            'foreName' => '',
            'surName' => '',
            'email' => '',
            'userName' => '',
            'password' => '',
            'passwordRepeat' => ''
        ];
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $cleandata = $_POST;
        return var_dump($cleandata);
    }

}