<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>


<?php


    if(isset($_POST['delete'])){

            $tweet_id = $_POST['tweet_id'];
            echo $tweet_id;

            deleteTweet($tweet_id); // call func to delete tweet from db

            header("Location: profile.php");

    }

?>