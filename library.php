<?php

    session_start();

    function register($document){

        global $collection;
        $collection->insertOne($document);
        return true;
    }
    
    function checkEmail($email){
        
        global $collection;

        $temp = $collection->findOne(array('email'=> $email));

        if(empty($temp)){
            return true;
        }
        else{
            return false;
        }
    }

    function checkUsername($username){
        
        global $collection;

        $temp = $collection->findOne(array('username'=> $username));

        if(empty($temp)){
            return true;
        }
        else{
            return false;
        }
    }
    function setSession($email){
     
        $_SESSION["userLoggedIn"] = 1;
        global $collection;
        $temp = $collection->findOne(array('email'=> $email));
        $_SESSION["uname"] = $temp["username"];
        $_SESSION["email"] = $email;

        return true;
        
    }
    function isLogin(){
        
        
        if(isset($_SESSION["userLoggedIn"])){
            return true;
        }
        else{
            return false;
        }
    }
    function removeall(){
        unset($_SESSION["userLoggedIn"]);
        unset($_SESSION["uname"]);
        unset($_SESSION["email"]);
        return true;
    }

?>