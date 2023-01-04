<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>


<?php


    if(isset($_POST['delete'])){
        
            echo "haloo";
            $tweet_id = $_POST['tweet_id'];
            echo $tweet_id;

            deleteTweet($tweet_id);

            header("Location: profile.php");

    }

?>