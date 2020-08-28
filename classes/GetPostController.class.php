<?php

class GetPostController extends PostModel {
    
    private $Recipe_ID;
    private $User_ID;
    private $username;
    private $title;
    private $imgPath;
    private $Short_description;
    private $Step_by_step;
    private $create_date;
    private $last_mod_date;
    private $Portions;
    
    public function getPostsBySessionId($id) {
    
        //$user_ID = $_SESSION['user_id']; 

       $users_posts = $this->getRecipesFromUser($id); 
       // Set properties with values from database
        /*$this->Recipe_ID = $users_posts['Recipe_ID'];
        $this->User_ID = $users_posts['User_ID'];
        $this->username = $users_posts['username'];
        $this->imgPath = $users_posts['imgPath'];
        $this->Short_description = $users_posts['Short_description'];
        $this->Step_by_step = $users_posts['Step_by_step'];
        $this->create_date = $users_posts['create_date'];
        $this->last_mod_date = $users_posts['last_mod_date'];
        $this->Portions = $users_posts['Portions'];
*/
      
       
       return $users_posts;
    }

    public function getImageFolder() {
        $folder = "gallery/";
        return $folder;
    }
}



class OutPost {
	private $username;
	private $title;

	public function getThaPost() {
        $this->username = "hej";
        $this->title = "titel skog";

        $arr = [
         'användarnamn' => $this->username,
         'title' => $this->title 
        ];
        return $arr;
    }
    
}
