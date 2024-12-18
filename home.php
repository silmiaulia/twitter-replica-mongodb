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

    </head>

    <body>

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
                                <a href="#" class="group flex items-center px-2 py-2 text-base leading-6 font-bold rounded-full hover:bg-gray-200 text-gray-900">
                                    <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"></path>
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
                                <a href="profile.php" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-200">
                                    <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
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
                                    <a href="profile.php" class="flex-shrink-0 group block">
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
                        <aside>
                            <div class="flex">
                                <div class="flex-1 mx-2">
                                    <h2 class="px-2 pt-2 text-xl font-bold text-black">Home</h2>
                                </div>
                                <div class="flex-1 px-4 pt-2 mx-2">
                                    <a href="" class=" text-2xl font-medium rounded-full text-gray-900 hover:bg-gray-200 float-right">
                                        <svg class="m-2 h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                            <g>
                                                <path d="M22.772 10.506l-5.618-2.192-2.16-6.5c-.102-.307-.39-.514-.712-.514s-.61.207-.712.513l-2.16 6.5-5.62 2.192c-.287.112-.477.39-.477.7s.19.585.478.698l5.62 2.192 2.16 6.5c.102.306.39.513.712.513s.61-.207.712-.513l2.16-6.5 5.62-2.192c.287-.112.477-.39.477-.7s-.19-.585-.478-.697zm-6.49 2.32c-.208.08-.37.25-.44.46l-1.56 4.695-1.56-4.693c-.07-.21-.23-.38-.438-.462l-4.155-1.62 4.154-1.622c.208-.08.37-.25.44-.462l1.56-4.693 1.56 4.694c.07.212.23.382.438.463l4.155 1.62-4.155 1.622zM6.663 3.812h-1.88V2.05c0-.414-.337-.75-.75-.75s-.75.336-.75.75v1.762H1.5c-.414 0-.75.336-.75.75s.336.75.75.75h1.782v1.762c0 .414.336.75.75.75s.75-.336.75-.75V5.312h1.88c.415 0 .75-.336.75-.75s-.335-.75-.75-.75zm2.535 15.622h-1.1v-1.016c0-.414-.335-.75-.75-.75s-.75.336-.75.75v1.016H5.57c-.414 0-.75.336-.75.75s.336.75.75.75H6.6v1.016c0 .414.335.75.75.75s.75-.336.75-.75v-1.016h1.098c.414 0 .75-.336.75-.75s-.336-.75-.75-.75z">
                                                </path>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <hr class="border-white">
                            <form action="tweet_action.php" method="post" enctype="multipart/form-data">
                                <!--middle creat tweet-->
                                <div class="flex px-2">
                                    <div class="m-2 w-10 py-1">
                                        <?php echo "<img class='inline-block h-10 w-10 rounded-full' src=\"{$item['foto']['data']}\" alt=''>"; ?>
                                    </div>
                                    <div class="flex-1 px-2 pt-2 mt-2">
                                        <textarea class="bg-transparent text-gray-500 font-small focus:outline-0 text-lg w-full" rows="2" cols="50" id="isi_text" name="isi_text" placeholder="What's happening?"></textarea>
                                    </div>
                                </div>
                                
                                <!--middle creat tweet below icons-->
                                <div class="flex">
                                    <div class="w-10"></div>

                                    <div class="w-64 px-4">

                                        <div class="flex items-center">
                                            <div class="flex-1 text-center px-1 py-1 m-2">
                                                <a href="#" class="mt-1 group flex items-center text-blue-400 px-2 py-2 text-base leading-6 font-normal">
                                                    <input class="text-gray-400 border rounded-md hover:bg-gray-200 text-md"
                                                    type="file" name="foto" id="foto" accept="image/*"> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-1">
                                        <button class="bg-blue-500 hover:bg-blue-600 mt-5 text-white font-bold py-2 px-8 rounded-full mr-8 float-right" type="submit" name="up_tweet">
                                            Tweet
                                        </button>
                                    </div>
                                </div>
                            
                            </form>
                            <hr class="border-white-500 border-1">
                        </aside>

                        <ul class="list-none">
                            <?php
                                if (!empty($result)): {
                                    # code...
                                    foreach ($result as $data) {
                                        
                                        $user_tweet = $data["user_id"];
                                        $getDataUser = getData2($user_tweet); // get data account 

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
                                                        <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                                                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                            <g>
                                                            <path d="M17.53 7.47l-5-5c-.293-.293-.768-.293-1.06 0l-5 5c-.294.293-.294.768 0 1.06s.767.294 1.06 0l3.72-3.72V15c0 .414.336.75.75.75s.75-.336.75-.75V4.81l3.72 3.72c.146.147.338.22.53.22s.384-.072.53-.22c.293-.293.293-.767 0-1.06z"></path>
                                                            <path d="M19.708 21.944H4.292C3.028 21.944 2 20.916 2 19.652V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 .437.355.792.792.792h15.416c.437 0 .792-.355.792-.792V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 1.264-1.028 2.292-2.292 2.292z"></path>
                                                            </g>
                                                        </svg>
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr class="border-white-400">
                                            </article>
                                        </li>';
                                    }
                                }
                            endif;
                            ?>
                        </ul>
                    </section>

                    <aside class="w-2/5 h-12 position-relative">
                        <!--Aside menu (right side)-->
                        <div style="max-width:350px;">
                            <div class="overflow-y-auto fixed  h-screen">
                                <div class="relative text-gray-300 w-80 p-5">
                                    <button type="submit" class="absolute ml-4 mt-3 mr-4">
                                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"></path>
                                        </svg>
                                    </button>

                                    <input type="search" name="search" placeholder="Search Twitter" class=" bg-dim-700 h-10 px-10 pr-5 w-full rounded-full text-sm focus:outline-none bg-purple-white shadow rounded border-0">
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
                                            
                                            foreach ($follow_suggest as $fol) {
                                                
                                                $unm_ = $fol["_id"];
                                                $getDataUser = getData2($unm_); // get data account


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


                                <div class="flow-root m-6 inline">
                                    <!-- <div class="flex-1">
                                        <a href="#">
                                            <p class="text-sm leading-6 font-medium text-gray-500">Terms Privacy Policy Cookies Imprint Ads info
                                            </p>
                                        </a>
                                    </div> -->
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
<!--

    <?php #echo "<img src=\"{$item['foto']['data']}\">"; ?>

        <form method="post" action="">
            <input type="submit" name="logout" value="Logout!">
        </form>
    </body>
-->
</html>
