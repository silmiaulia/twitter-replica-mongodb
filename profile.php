<?php 
    require_once 'library.php';

    if(isLogin()){ //if login success
       
        //buat nampilin username
        $username = $_SESSION["uname"];
        $email = $_SESSION["email"];
        $getDataAccount = getData($email);

        // buat nampilin foto
        
        $fileName = $getDataAccount['foto']['name'];
        $fileType = $getDataAccount['foto']['type'];

        $query = '{"email": "%s", "foto.name":"%s", "foto.type":"%s"}';
            
        $item = $collection->findOne(parseQuery($query, $email, $fileName, $fileType) );
	

    }
    else{
        header("Location: login.php");
    }

    if(isset($_POST['logout'])){
        
        $var = removeall();
        if($var){
            header("Location:login.php");
        }
        else{
            echo "Error!";
        }
    
    }
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Twitter Profile</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <!-- <div id="totop"></div> -->
    <!-- <a href="#totop" class="fa fa-arrow-up" id="fixedarrow"></a> -->
    <!-- <a href="#totop"><i class="fa fa-arrow-up" aria-hidden="true" id="fixedarrow"></i></a> -->
    <!-- LEFT VERTICAL FIXED MENU -->

    <!-- <div class="leftverticalmenu">
        <a href="#" class="fa fa-twitter" id="twittericon"></a>
        <ul>
            <li><a href="#"><i class="fa fa-home" id="icons"></i>Home</a></li>
            <li><a href="twitterprofile.html"><img src="https://res.cloudinary.com/dowrygm9b/image/upload/v1570267399/laptop-3174729_yiprzu.jpg" alt="profile"
                        class="profileimage">Profile</a></li>
            <li><a href="#"><i class="fa fa-align-center" id="icons"></i>More</a></li>
        </ul>
        <figure> Tweet</figure>
    </div> -->

    <!-- END OF LEFT FIXED MENU -->

    <!-- <div class="flexcontainer"> -->
        <div class="middlecontainer">
            <section class="headsec">
                <i class="fa fa-arrow-left" id="fa-arrow-left"></i>
                <!-- <div>
                    <h3>Soy Segun</h2>
                        <span>38.7k Tweets</span>
                </div> -->
            </section>
            <section class="twitterprofile">
                <div class="headerprofileimage">
                    <!-- <div id="headerimage"><div> -->
                    <!-- <img src="src/blue.png" alt="header" id="headerimage">
                    <img src="src/blue.jpg" alt="profile pic" id="profilepic"> -->
                    <?php echo "<img src=\"{$item['foto']['data']}\" id='headerimage' >"; ?>
                    <?php echo "<img src=\"{$item['foto']['data']}\"  id='profilepic'>"; ?>
                    <div class="editprofile">Edit Profile</div>
                </div>
                <div class="bio">
                    <div class="handle">
                        <h3> <?php echo "{$item['username']}"; ?></h3>
                        <span><?php echo "{$item['email']}"; ?></span>
                    </div>
                    <p> </p>
                    <p> </p>
                    <div class="nawa">
                        <!-- <div class="followers"> 421 <span>Following</span></div>
                        <div>1519<span> Followers</span></div> -->
                        <!-- <p>4237 Following   1456 Followers</p> -->
                    </div>
                    <br>
                </div>
            </section>

            <section class="tweets">
                <div class="heading">
                    <p>Tweets</p>
                    <p>Tweets and Replies</p>
                    <p>Media</p>
                    <p>Likes</p>
                </div>
            </section>
            <section class="mytweets">
             <?php echo "<img src=\"{$item['foto']['data']}\">"; ?>
                <div class="tweetbody">
                    <div class="tweetcontent"><?php echo "{$item['username']}"; ?> <?php echo "{$item['email']}"; ?></div>
                    <div class="tweetcontent">kim sunoo kim sunoo kim sunoo kim sunoo kim sunoo kim sunoo kim sunoo kim sunoo kim sunoo kim sunoo</div>
                    <ul class="retweeticons">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <i class="fa fa-retweet" aria-hidden="true"></i>
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-upload" aria-hidden="true"></i>
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </ul>
                </div>

            </section>
        </div>

    <!-- </div> -->

    <!-- <script>
alert('MY TWITTER PROFILE CLONE');
</script> -->
</body>

</html>