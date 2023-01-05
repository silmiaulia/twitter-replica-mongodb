<?php
    require_once 'connection.php';
    session_start();

    // class for image 
    class Item {
        public $_id;
        
        function __construct(array $fields = array()) {
            foreach ($fields as $field => $value) {
                $this->$field = stripslashes($value);
            }
            if (empty($this->_id)) {
                $this->_id = (string) new ItemID;
            }
        }
    }

    class ItemID {
        function __tostring() {
            $template = '%04X%04X-%04X-%04X-%04X-%04X%04X%04X';
            return sprintf(
                $template, 
                mt_rand(0, 65535), 
                mt_rand(0, 65535), 
                mt_rand(0, 65535), 
                mt_rand(16384, 20479), 
                mt_rand(32768, 49151), 
                mt_rand(0, 65535), 
                mt_rand(0, 65535), 
                mt_rand(0, 65535)
            );
        }
    }

    // insert new doc account
    function register($document){

        global $collection;
        $collection->insertOne($document);
        return true;
    }

    // update new data account
    function updateData($document, $username){

        global $collection;

        $condition = array("username" => $username);

        $newdata = array('$set' => $document);

        if($collection->updateMany($condition, $newdata))
        {

            setSession($document["email"]);
            return true;

        }
        else
        {
            return false;

        }
        
    }

    // delete tweet
    function deleteTweet($tweet_id){

        global $tweet;

        $objectId = new MongoDB\BSON\ObjectID($tweet_id);

        $delRec = $tweet->deleteOne(array('_id'=> $objectId));
    }

    // count tweet from a user
    function countTweetUser($user_id){

        global $tweet;

        $filter = array('user_id' => $user_id);

        return $tweet->count($filter);
    }

    // check if email already registered
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

    // check if username already registered
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

    // session login
    function setSession($email){
     
        $_SESSION["userLoggedIn"] = 1;
        global $collection;
        $temp = $collection->findOne(array('email'=> $email));
        $_SESSION["uname"] = $temp["username"];
        $_SESSION["user_id"] = $temp["_id"];
        $_SESSION["email"] = $email;

        return true;
        
    }

    //check if session is set
    function isLogin(){
        
        if(isset($_SESSION["userLoggedIn"])){
            return true;
        }
        else{
            return false;
        }
    }

    // unset session
    function removeall(){
        unset($_SESSION["userLoggedIn"]);
        unset($_SESSION["uname"]);
        unset($_SESSION["email"]);
        return true;
    }

    
    // get data account with email 
    function getData($email){
        
        global $collection;
        $temp = $collection->findOne(array('email'=> $email));

        return $temp;

    }

    // get data account with username 
    function getData2($user_id){
        
        global $collection;
        $temp = $collection->findOne(array('_id'=> $user_id));

        return $temp;

    }

    // for get image 
    function parseQuery( $template ){
        $values = array_slice( func_get_args(), 1 );
        $query = vsprintf( $template, $values );
        $query = json_decode( $query, true );
        $query = var_export( $query, true );
        
        return eval("return $query;");
    }

    // insert new doc tweet
    function up_tweet($document){

        global $tweet;
        $tweet->insertOne($document);
        return true;
    }

?>