<?php
include_once('includes/functions.php');
class PostController extends PostModel {

    public function postRecipe() {

        /* data we need
        $data = [
            'User_ID' => '',
            'Title' => '',
            'Short_description ' => '',
            'Step_by_step ' => '',
            'Portions' => ''
        ];



        $ingredients = [
            
            'Recipe_ID' => '',
            'Ingredient_ID' => '',
            'Unit_ID' => '',
            'Quantity' => ''
        ];*/

        /* Data to sanitize with filter_input_array */
        $inputToFilter = [
            'headLine' => $_POST['headLine'],
            'port' => $_POST['port']
        ];

          /* POST-data get sanitizes from html/php/script-tags, but fields 
          where we want users to be able to send in some html tags sanitzes 
          with other functions.*/
          $inputToFilter = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        /* Data where some html tags is allowed*/
         
        $Short_description = $_POST['blogPost'];
        $Step_by_step = $_POST['blogPostHow'];
         /* strip_tags */
         $Short_description = strip_tags($Short_description, '<br><b><strong><a><i><h4>');
         $Step_by_step = strip_tags($Step_by_step, '<br><b><strong><a><i><h4>');
        
        $data = [
            'message' => '',
            'User_ID' => $_SESSION['user_id'],
            'headLine' => $inputToFilter['headLine'],
            'short_description' => $Short_description,
            'step_by_step' => $Step_by_step,
            'port' => $inputToFilter['port'],
            'image' => $_POST['foodImg']
        ];
          /* trim() function, delete whitespace*/
           $data = array_map('trim', $data);
    
          /*If either of required fields are empty, error array with input-data and message.*/ 
          if (empty($data['headLine']) || empty($data['short_description']) || empty($data['step_by_step'])) {
            $data['message'] = 'Du måste skriva in titel, beskrivning, steg-för-steg (gör så här) och antal!';
            return $data;
            exit();
        } 

         /* Send dataarray to method for insert of recipe in sql*/
         $this->setRecipe($data, true);
         return $data;
            exit();

         
    }
}