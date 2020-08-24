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
            'Title' => $_POST['headLine'],
            'Portions' => $_POST['port'],
            'Ingrediens' => $_POST['ingr'],
            'Unit' => $_POST['unit'],
            'Quantity' => $_POST['ingrNum']
        ];

          /* POST-data get sanitizes from html/php/script-tags, but fields 
          where we want users to be able to send in some html tags sanitzes 
          with other functions.*/
          $inputToFilter = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        /* Data where some html tags is allowed*/
         
        $Short_description = $_POST['blogPost'];
        $Step_by_step = $_POST['blogPostHow'];
         

         /* strip_tags() */
         $Short_description = strip_tags($Short_description, '<br><b><strong><a><i><H3>');
         $Step_by_step = strip_tags($Step_by_step, '<br><b><strong><a><i><H3>');
        
        $data = [
            'message' => '',
            'User_ID' => '',
            'title' => $inputToFilter['Title'],
            'portions' => $inputToFilter['Portions'],
            'ingrediens' => $inputToFilter['Ingrediens'],
            'unit' => $inputToFilter['Unit'],
            'quantity' => $inputToFilter['Quantity'],
            'short_description' => $Short_description,
            'step_by_step' => $Step_by_step,
            'image' => $_POST['foodImg']
        ];
          /* trim() function, delete whitespace*/
           $data = array_map('trim', $inputToFilter);

        // Add more data
        array_push($data,"blue","yellow");
     

        // trim

        // strip

        // strip tags
    }
}