<?php
    require_once 'library.php';

    if(isLogin()){ //if login success

        $username = $_SESSION["uname"];
        $user_id = $_SESSION["user_id"];
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

    $filter = [];
    $options = ['sort' => ['created_at' => -1]];
    $result = $tweet->find($filter, $options);
?>
<html>
    <head>
        <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
   

    <body class="bg-[#D9D9DB]">
       
    <div class="p-relative h-screen" style="background-color: #FFFFFF">
            <div class="flex justify-center">

                <header class="text-gray-900 h-12 py-4 h-auto">
                    <!-- Navbar (left side) -->
                    <div style="width: 275px;">
                        <div class="overflow-y-auto fixed h-screen pr-3" style="width: 275px;">
                            <!--Logo-->
                            <svg viewBox="0 0 24 24" class="h-8 w-8 text-[#1DA1F2] ml-3" fill="currentColor">
                            <g>
                                <path d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                                </path>
                            </g>
                            </svg>


                            <!-- Nav-->
                            <nav class="mt-5 px-2">
                                <a href="home.php" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-200">
                                    <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"></path>
                                    </svg>
                                    Home
                                </a>
                                <a href="#" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-gray-200 ">
                                    <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    Explore
                                </a>
                                <a href="#" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-200">
                                    <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                        </path>
                                    </svg>
                                    Notifications
                                    </a>
                                <a href="#" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-200">
                                    <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Messages
                                </a>
                                <a href="#" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-200">
                                    <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                    </svg>
                                    Bookmarks
                                </a>
                                <a href="#" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-200">
                                    <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                    Lists
                                </a>
                                <a href="profile.php" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-bold rounded-full hover:bg-gray-200 text-gary-900">
                                    <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Profile
                                </a>
                                <a href="#" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-200">
                                    <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    More
                                </a>
                                <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                                    <button class="bg-blue-500 hover:bg-blue-600 w-full mt-5 text-white font-bold py-2 px-4 rounded-full type="submit" name="logout"">
                                        Logout
                                    </button>
                                </form>
                            </nav>


                            <!-- User Menu -->
                            <div class="absolute" style="bottom: 2rem;">
                                <div class="flex-shrink-0 flex hover:bg-gray-200 rounded-full px-4 py-3 mt-12 mr-2">
                                    <a href="#" class="flex-shrink-0 group block">
                                        <div class="flex items-center">
                                            <div>
                                                <?php echo "<img class='inline-block h-10 w-10 rounded-full' src=\"{$item['foto']['data']}\" alt=''>"; ?>

                                            </div>
                                            <div class="ml-3">
                                                <p class="text-base leading-6 font-medium text-gray-900">
                                                <?php echo "{$item['username']}"; ?>
                                                </p>
                                                <p class="text-sm leading-5 font-small text-gray-400 group-hover:text-gray-400 transition ease-in-out duration-150">
                                                <?php echo "{$item['email']}"; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

            <main role="main">
                <div class="flex" style="width: 990px;">
                    <section class="w-3/5 border border-y-0 border-gray-200" style="max-width:600px;">
                        <!--Content (Center)-->
                        <!-- Nav back-->
                        <div>
                            <div class="flex justify-start">
                                <div class="px-4 py-2 mx-2">
                                    <a href="home.php" class=" text-2xl font-medium rounded-full text-blue-400 hover:bg-gray-800 hover:text-blue-300 float-right">
                                        <svg class="m-2 h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                            <g>
                                                <path d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                                                </path>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mx-2">
                                    <h2 class="mb-0 text-xl font-bold text-gray-900"><?php echo "{$item['username']}"; ?></h2>
                                    <?php $countTweet = countTweetUser($user_id)  ?>
                                    <p class="mb-0 w-48 text-xs text-gray-400"><?php echo $countTweet ?> Tweets</p>
                                </div>
                            </div>

                            <hr class="border-gray-800">
                        </div>

                        <!-- User card-->
                        <div>
                            <div class="w-full bg-cover bg-no-repeat bg-center" style="height: 200px; background-color: #657786">
                                <?php echo "<img class='opacity-0 w-full h-full' src=\"{$item['foto']['data']}\" alt=''>"; ?>
                            </div>
                            <div class="p-4">
                                <div class="relative flex w-full">
                                    <!-- Avatar -->
                                    <div class="flex flex-1">
                                        <div style="margin-top: -5rem;">
                                            <div style="height:9rem; width:9rem;" class="md rounded-full relative avatar">
                                                <?php echo "<img style='height:8rem; width:8rem;' class='md rounded-full relative border-4 border-white-300' src=\"{$item['foto']['data']}\"  id='profilepic'>"; ?>
                                                <div class="absolute"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Follow Button -->
                                    <div class="flex flex-col text-right">
                                        <a href="editprofile.php"><button class="flex justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  rounded max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 hover:border-blue-800 flex items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                                            Edit Profile
                                        </button></a>
                                    </div>
                                </div>

                                <!-- Profile info -->
                                <div class="space-y-1 justify-center w-full mt-3 ml-3">
                                    <!-- User basic-->
                                    <div>
                                        <h2 class="text-xl leading-6 font-bold text-gray-900"><?php echo "{$item['username']}"; ?></h2>
                                        <p class="text-sm leading-5 font-medium text-gray-600"><?php echo "{$item['email']}"; ?></p>
                                    </div>
                                    <!-- Description and others -->
                                    <div class="mt-3">
                                        <p class="text-gray-900 leading-tight mb-2">I'm new to this platform and i am still working on my bio</b> </p>
                                        <div class="text-gray-600 flex">
                                            <span class="flex mr-2"><svg viewBox="0 0 24 24" class="h-5 w-5 paint-icon"><g><path d="M11.96 14.945c-.067 0-.136-.01-.203-.027-1.13-.318-2.097-.986-2.795-1.932-.832-1.125-1.176-2.508-.968-3.893s.942-2.605 2.068-3.438l3.53-2.608c2.322-1.716 5.61-1.224 7.33 1.1.83 1.127 1.175 2.51.967 3.895s-.943 2.605-2.07 3.438l-1.48 1.094c-.333.246-.804.175-1.05-.158-.246-.334-.176-.804.158-1.05l1.48-1.095c.803-.592 1.327-1.463 1.476-2.45.148-.988-.098-1.975-.69-2.778-1.225-1.656-3.572-2.01-5.23-.784l-3.53 2.608c-.802.593-1.326 1.464-1.475 2.45-.15.99.097 1.975.69 2.778.498.675 1.187 1.15 1.992 1.377.4.114.633.528.52.928-.092.33-.394.547-.722.547z"></path><path d="M7.27 22.054c-1.61 0-3.197-.735-4.225-2.125-.832-1.127-1.176-2.51-.968-3.894s.943-2.605 2.07-3.438l1.478-1.094c.334-.245.805-.175 1.05.158s.177.804-.157 1.05l-1.48 1.095c-.803.593-1.326 1.464-1.475 2.45-.148.99.097 1.975.69 2.778 1.225 1.657 3.57 2.01 5.23.785l3.528-2.608c1.658-1.225 2.01-3.57.785-5.23-.498-.674-1.187-1.15-1.992-1.376-.4-.113-.633-.527-.52-.927.112-.4.528-.63.926-.522 1.13.318 2.096.986 2.794 1.932 1.717 2.324 1.224 5.612-1.1 7.33l-3.53 2.608c-.933.693-2.023 1.026-3.105 1.026z"></path></g></svg> <a href="" target="#" class="leading-5 ml-1 text-blue-400">www.helloiam<?php echo "{$item['username']}"; ?>.com</a></span>
                                        </div>
                                    </div>
                                    <div class="pt-3 flex justify-start items-start w-full divide-x divide-gray-800 divide-solid">
                                        <div class="text-center pr-3"><span class="font-bold text-white">520</span><span class="text-gray-600"> Following</span></div>
                                        <div class="text-center px-3"><span class="font-bold text-white">23,4m </span><span class="text-gray-600"> Followers</span></div>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-gray-800">
                        </div>

                        <ul class="list-none">
                            <?php
                                if (!empty($result)): {
                                    # code...
                                    foreach ($result as $data) {
                                        # code...
                                        $user_tweet = $data["user_id"];

                                        if($user_tweet == $user_id){
                                            $getDataUser = getData2($user_tweet);
                                            $now = new DateTime();
                                            $date = new DateTime($data['created_at']);
                                            if ($date->diff($now)->format("%h") < 1) {
                                                $date_res = $date->diff($now)->format("%im");
                                            } else if ($date->diff($now)->format("%d") < 1) {
                                                $date_res = $date->diff($now)->format("%hh");
                                            } else {
                                                $date_res = $date->diff($now)->format("%dd");
                                            }

                                            echo '<li>
                                                <!--timeline tweet--> 
                                                <article class="hover:bg-gray-200 transition duration-350 ease-in-out">
                                                    <div class="flex flex-shrink-0 p-4 pb-0">
                                                        <a href="#" class="flex-shrink-0 group block">
                                                            <div class="flex items-center">
                                                                <div>
                                                                    <img class="inline-block h-10 w-10 rounded-full" src="'. $getDataUser['foto']['data'] .'" alt="">
                                                                </div>
                                                                <div class="ml-3">
                                                                    <p class="text-base leading-6 font-medium text-gray-900">
                                                                        '. $getDataUser["username"].'
                                                                        <span class="text-sm leading-5 font-normal text-gray-500 group-hover:text-gray-600 transition ease-in-out duration-150">
                                                                            '. $getDataUser["email"] .'  <span>&#183;</span> '. $date_res .'
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>';
    
    
                                                    echo '<div class="pl-16">
                                                        <p class="text-base width-auto font-normal text-black flex-shrink">
                                                            '. $data["text"] .'
                                                        </p>';

                                                        if ($data["isContent"] == TRUE) {
                                                            # code...
                                                            echo '<div class="md:flex-shrink pr-6 pt-3">
                                                            <div class="bg-cover bg-no-repeat bg-center rounded-lg w-full h-64" style="height: 200px;">
                                                                <img class="w-full h-full" src="'. $data['content']['data'] .'" alt="">
                                                            </div>
                                                            </div>';
                                                        }
    
                                                    echo '<div class="flex items-center py-4">
                                                            <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                                                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                                <g>
                                                                <path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path>
                                                                </g>
                                                            </svg>
                                                            '. $data["comment_count"] .'
                                                            </div>
                                                            <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-green-400 transition duration-350 ease-in-out">
                                                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                                <g>
                                                                <path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path>
                                                                </g>
                                                            </svg>
                                                            '. $data["retweet_count"] .'
                                                            </div>
                                                            <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-red-600 transition duration-350 ease-in-out">
                                                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                                <g>
                                                                <path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
                                                                </g>
                                                            </svg>
                                                            '. $data["likes"] .'
                                                            </div>

                                                            <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-red-600 transition duration-350 ease-in-out">
                                                                <form method="post" action="deleteTweet_action.php">
                                                                    <input type="hidden" name="tweet_id" id="tweet_id" value='. $data["_id"] .'>
                                                                    <div class="mt-5">
                                                                        <button class="w-full p-2 bg-red-700 hover:bg-red-500 rounded-full font-bold text-white" type="submit" name="delete">Delete</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                        
    
                                                    </div>
                                                    <hr class="border-white-400">
                                                </article>
                                            </li>';
                                        }

                                       
                                    }
                                }
                            endif;
                            ?>
                        </ul>
                    </section>
          


                    <aside class="w-2/5 h-12 position-relative">
                         
                        <!--Aside menu (right side)-->
                        <div style="max-width:350px;">
                            <div class="overflow-y-auto fixed h-screen">
                                <div class="relative text-gray-300 w-80 p-5">
                                    <button type="submit" class="absolute ml-4 mt-3 mr-4">
                                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"></path>
                                        </svg>
                                    </button>

                                    <input type="search" name="search" placeholder="Search Twitter" class=" bg-dim-700 h-10 px-10 pr-5 w-full rounded-full text-sm focus:outline-none bg-purple-white shadow rounded border-0">
                                </div>
                                
                                <!--people suggetion to follow section-->
                                <div class="max-w-sm rounded-lg  bg-gray-50 overflow-hidden shadow-lg m-4 mt-8">
                                                                    <div class="flex">
                                        <div class="flex-1 m-2">
                                            <h2 class="px-4 py-2 text-xl w-48 font-bold text-black">Who to follow</h2>
                                        </div>
                                    </div>


                                    <hr class="border-gray-50">

                                                                        <!--first person who to follow-->
                                    <?php
                                        $follow_suggest = $collection->find();

                                        if (!empty($follow_suggest)) {
                                            # code...
                                            foreach ($follow_suggest as $fol) {
                                                # code...
                                                $unm_ = $fol["_id"];

                                                $getDataUser = getData2($unm_);


                                                if ($unm_ != $user_id) {
                                                    # code...
                                                    echo '<div class="flex flex-shrink-0">
                                                    <div class="flex-1 ">
                                                        <div class="flex items-center w-48">
                                                            <div>
                                                                <img class="inline-block h-10 w-10 rounded-full ml-4 mt-2" src="'. $getDataUser['foto']['data'] .'" alt="">
                                                            </div>
                                                            <div class="ml-3 mt-3">
                                                                <p class="text-base leading-6 font-medium text-black">
                                                                    '. $fol["username"] .'
                                                                </p>
                                                                <p class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                                                    '. $fol["email"] .' 
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="flex-1 px-4 py-2 m-2">
                                                        <a href="" class=" float-right">
                                                            <button class="bg-black hover:bg-gray-800 text-white font-semibold hover:text-white py-2 px-4 border border-gray hover:border-transparent rounded-full">
                                                                Follow
                                                            </button>
                                                        </a>

                                                    </div>
                                                </div>
                                                <hr class="border-gray-50">';
                                                }
                                            }
                                        }
                                    ?>
                                    
                                    <!--show more-->
                                    <div class="flex hover:bg-gray-100">
                                        <div class="flex-1 p-4">
                                            <h2 class="pr-4 ml-2 w-48 font-bold text-blue-400 hover:text-blue-500">Show more</h2>
                                        </div>
                                    </div>

                                </div>

                                <!--trending tweet section-->
                                <div class="max-w-sm rounded-lg bg-gray-50 overflow-hidden shadow-lg m-4">
                                    <div class="flex">
                                        <div class="flex-1 m-2">
                                            <h2 class="px-4 py-2 text-xl w-48 font-bold text-black">Trends For You</h2>
                                        </div>
                                    </div>


                                    <hr class="border-gray-50">

                                    <!--first trending tweet-->
                                    <div class="flex hover:bg-gray-100">
                                        <div class="flex-1">
                                            <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">1 . Trending in Indonesia</p>
                                            <h2 class="px-4 ml-2 w-48 font-bold text-black">#Semester5</h2>
                                            <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">9,880 Tweets</p>

                                        </div>
                                        <div class="flex-1 px-4 py-2 m-2">
                                            <a href="" class=" text-2xl rounded-full text-gray-400 hover:text-gray-500 float-right">
                                                <svg class="m-2 h-5 w-5" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" stroke="currentColor" viewBox="0 0 20 20">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>

                                    <hr class="border-gray-50">

                                    <!--second trending tweet-->
                                    <div class="flex hover:bg-gray-100">
                                        <div class="flex-1">
                                            <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">2 . Entertainment <span>&#183;</span> Trending</p>
                                            <h2 class="px-4 ml-2 w-48 font-bold text-black">#BlackPink</h2>
                                            <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">1,112 Tweets</p>

                                        </div>
                                        <div class="flex-1 px-4 py-2 m-2">
                                            <a href="" class=" text-2xl rounded-full text-gray-400 hover:text-gray-500 float-right">
                                                <svg class="m-2 h-5 w-5" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" stroke="currentColor" viewBox="0 0 20 20">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>

                                    <hr class="border-gray-50">

                                    <!--third trending tweet-->
                                    <div class="flex hover:bg-gray-100">
                                        <div class="flex-1">
                                            <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">3 . Politic <span>&#183;</span> Trending</p>
                                            <h2 class="px-4 ml-2 w-48 font-bold text-black">#RUUKUHP</h2>
                                            <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">5,367 Tweets</p>

                                        </div>
                                        <div class="flex-1 px-4 py-2 m-2">
                                            <a href="" class=" text-2xl rounded-full text-gray-400 hover:text-gray-500 float-right">
                                                <svg class="m-2 h-5 w-5" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" stroke="currentColor" viewBox="0 0 20 20">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>

                                    <hr class="border-gray-50">

                                    <!--forth trending tweet-->

                                    <div class="flex hover:bg-gray-100">
                                        <div class="flex-1">
                                            <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">4 . Trending in Indonesia</p>
                                            <h2 class="px-4 ml-2 w-48 font-bold text-black">#Mixue</h2>
                                            <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">4,889 Tweets</p>

                                        </div>
                                        <div class="flex-1 px-4 py-2 m-2">
                                            <a href="" class=" text-2xl rounded-full text-gray-400 hover:text-gray-500 float-right">
                                                <svg class="m-2 h-5 w-5" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" stroke="currentColor" viewBox="0 0 20 20">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <hr class="border-gray-50">

                                    <!--show more-->
                                    <div class="flex hover:bg-gray-100">
                                        <div class="flex-1 p-4">
                                            <h2 class="pr-4 ml-2 w-48 font-bold text-blue-400 hover:text-blue-500">Show more</h2>
                                        </div>
                                    </div>

                                </div>


                                <div class="flow-root m-6 inline">
                                    <div class="flex-1">
                                        <p class="text-sm leading-6 font-medium text-gray-600"> © 2022 Basis Data Non Relational.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </main>
        </div>
    </div>




    <style>
    .overflow-y-auto::-webkit-scrollbar, .overflow-y-scroll::-webkit-scrollbar, .overflow-x-auto::-webkit-scrollbar, .overflow-x::-webkit-scrollbar, .overflow-x-scroll::-webkit-scrollbar, .overflow-y::-webkit-scrollbar, body::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .overflow-y-auto, .overflow-y-scroll, .overflow-x-auto, .overflow-x, .overflow-x-scroll, .overflow-y, body {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .bg-dim-700 {
    --bg-opacity: 1;
    background-color: #FFFFFF;
    }

    html, body {
    margin: 0;
    background-color: #FFFFFF;
    }

    svg.paint-icon {
    fill: currentcolor;
    }

    </style>
        
    </body>
</html>