<?php

class GetPostController extends PostModel {

    
    public function getPostsByUserId($id) {
 
       $users_posts = $this->getRecipesFromUser($id); 
       
       return $users_posts;
    }


    public function getImageFolder() {
        $folder = "gallery/";
        return $folder;
    }


    public function getAllPosts() {
        $allPosts = $this->getAllPostsDB();
        return $allPosts ;
    }

    public function getAllUsers() {
        $allUsers = $this->getAllUsersDB();
        return $allUsers;
    }

    public function getUserName($id) {
        $usernname = $this->getUserById($id);
        return $usernname;
    }

}

