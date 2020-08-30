<?php
include_once('includes/functions.php');
class PostController extends PostModel
{


    public function testReturn(&$bildArr)
    {

        $testArray = [
            'namnet' => $bildArr['newImgName'],
            'temporara' => $bildArr['tmp_name']
        ];


        $imgDestination = 'gallery/' . $testArray['namnet'];
        move_uploaded_file($testArray['temporara'], $imgDestination);
        return $testArray;
    }

    public function setPostImg()
    {
        $imgData = [
            'name' => $_FILES['foodImg']['name'],
            'type' => $_FILES['foodImg']['type'],
            'tmp_name' => $_FILES['foodImg']['tmp_name'],
            'error' => $_FILES['foodImg']['error'],
            'size' => $_FILES['foodImg']['size']

        ];

        $errorImg = '';
        /* check type 
        First, exlode, create an array, with type, exluding image/jpg to separate image*/
        $imgExt = explode("/", $imgData['type']);
        // converting to lower case and grab last part of the array $imgExt
        $imgType = strtolower(end($imgExt));
        // Allowed file extensions
        $rightTypes = ['jpg', 'jpeg', 'gif', 'png', 'webp'];

        // check allowed filetypes
        if (!in_array($imgType, $rightTypes)) {
            $errorImg = 'Otilåten filtyp på bilden!';
            return $errorImg;
            exit();
        }
        // check for errors
        if (!$imgData['error'] === 0) {
            $errorImg = 'Det är nåot fel på bilden';
            return $errorImg;
            exit();
        }
        // check size
        if ($imgData['size'] >= 5000000) {
            $errorImg = 'Bilden är för stor, max 5 MB!';
            return $errorImg;
            exit();
        }
        /* add unique name
        First, exlode, create an array, with type, exluding image/jpg to separate image*/
        $imgNameArr = explode(".", $imgData['name']);
        /* Current takes the first element int the array*/
        $imgName = current($imgNameArr);
        /* Adds unique name, with the uniqid function, true adds even more chars*/
        $newImgName  = $imgName . '_ID_' . uniqid("", false) . '.' . $imgType;
        /* Create array with name and tempname */
        $imgOutput = [
            'newImgName' => $newImgName,
            'tmp_name' => $imgData['tmp_name'],
            'imgType' => $imgType
        ];

        // add right location
        //$imgDestination = 'gallery/' . $newImgName; 
        //move_uploaded_file($imgData['tmp_name'], $imgDestination);
        return $imgOutput;
        unset($_REQUEST["submitImg"]);
        exit();
    }

    public function postRecipe(&$bildArr, $recipeToUpdate)
    {


        $imgArr = [
            'namnet' => $bildArr['newImgName'],
            'temporara' => $bildArr['tmp_name']
        ];

        /* Save image in gallery*/
        $imgDestination = 'gallery/' . $imgArr['namnet'];
        move_uploaded_file($imgArr['temporara'], $imgDestination);


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
            'image_Name' => $imgArr['namnet']
        ];
        /* trim() function, delete whitespace*/
        $data = array_map('trim', $data);

        /*If either of required fields are empty, error array with input-data and message.*/
        if (empty($data['headLine']) || empty($data['short_description']) || empty($data['step_by_step'])) {
            $data['message'] = 'Du måste skriva in titel, beskrivning, steg-för-steg (gör så här) och antal!';
            return $data;
            exit();
        }

        /* Insert image to the gallery*/
        //$imgDestination = 'gallery/' . $imgArr['imgName']; 
        //move_uploaded_file($imgArr['tempImgName'], $imgDestination);

        /* If posttype = 0 it means thats a new post else an update*/
        if ($recipeToUpdate === 0) {
            /* Send dataarray to method for insert of recipe in sql*/
            if ($this->setRecipe($data)) {
                unset($_REQUEST["submitPost"]);
                header("Location: post.php?message=success");
                /*$data['message'] = 'success';
            return $data;*/
                /* header skall in här istället*/
            } else {
                die('något gick del med kopplingen till databasen, otur.');
            }
        } else {
           // $hej = "hej";
           // echo $recipeToUpdate ;
           // header("Location: post.php?update=VERKARFUNGERA$recipeToUpdate");
             /* Send dataarray and recipe id for update*/
             if ($this->setUpdateRecipe($data, $recipeToUpdate)) {
                unset($_REQUEST["submitPost"]);

                if (headers_sent()) {
                    die("Redirect failed. Please click on this link: <a href='http://webb01.se/mealprep/index.php'>Vidare till start</a>");
                }
                else{
                    header('Location: post.php?update=success"'); //funderar på att köra en if runt headern
                    exit();
                }
               
            } else {
                die('något gick del med kopplingen till databasen, otur.');
            }
        }
    }

    public function deletePost($recipe)
    {
        if ($this->deletePostSql($recipe)) {



            /* header skall in här istället*/

            if (headers_sent()) {
                die("Redirect failed. Please click on this link: <a href='http://webb01.se/mealprep/index.php'>Vidare till start</a>");
            }
            else{
                header("Location: post.php?delete=success");//funderar på att köra en if runt headern
                exit();
            }

        } else {
            die('något gick del med kopplingen till databasen, otur.');
        }
    }

    public function returnRec($recipe)
    {
        return $recipe;
    }

    public function getRecipeById($recipe_id)
    {

        $theRecipe = $this->getRecipeByIdDB($recipe_id);
        return $theRecipe;
    }

    public function update($arr) {
        /* strip tags/script from field*/
        $arr['Short_desc'] = strip_tags($arr['Short_desc'], '<br><b><strong><a><i><h4>');
        $arr['Step_by_step'] = strip_tags($arr['Step_by_step'], '<br><b><strong><a><i><h4>');
       // $arr = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if($this->updateSql($arr)) {
                return true;
            } else {
                return false;
            }
        
    }
}
