<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php
    
    if(isLogin()){
        header("Location: home.php");
    }
?>


<html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <?php
        if(isset($_POST['login'])){

            // get data from post
            $email = $_POST['email'];
            $upass = $_POST['password'];
            $criteria = array("email"=> $email);
            $query = $collection->findOne($criteria);

            if(empty($query)){ // email not exist in db

                ?>
                    <body class="bg-[#D9D9DB]">
                        <div class="flex min-h-screen items-center justify-center">

                            <div class="min-h-1/2 bg-white rounded-2xl shadow-lg">
                                <div class="px-32 flex items-center space-y-4 py-28 text-gray-500 flex-col">
                                    <svg viewBox="0 0 24 24" class=" h-12 w-12 text-[#1DA1F2]" fill="currentColor">
                                        <g>
                                            <path
                                                d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                                            </path>
                                        </g>
                                    </svg>
                                    <h1 class="text-black text-3xl font-bold ">Sign in to Twitter</h1>
                                    <div class="text-center py-8 text-lg">
                                        <h2 class="text-red-500">Email is not registered.</h2>
                                        <h2 class="text-red-500">Either <a class="text-[#1DA1F2]" href='register.php'>Register</a> with the new Email or <a class="text-[#1DA1F2]" href='login.php'>Login</a> with an already registered email</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>
                <?php


            }else{
                
                    $pass = $query["password"];

                    if(password_verify($upass,$pass)){ //check pass

                        $var = setSession($email);

                        if($var){
                            header("Location: home.php");
                        }
                        else{
                            echo "Some error";
                        }
                    }

                    else{

                        ?>
                        <body class="bg-[#D9D9DB]">
                            <div class="flex min-h-screen items-center justify-center">
    
                                <div class="min-h-1/2 bg-white rounded-2xl shadow-lg">
                                    <div class="px-32 flex items-center space-y-4 py-28 text-gray-500 flex-col">
                                        <svg viewBox="0 0 24 24" class=" h-12 w-12 text-[#1DA1F2]" fill="currentColor">
                                            <g>
                                                <path
                                                    d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                                                </path>
                                            </g>
                                        </svg>
                                        <h1 class="text-black text-3xl font-bold ">Sign in to Twitter</h1>
                                        <div class="text-center py-8 text-lg">
                                            <h2 class="text-red-500">You have entered a wrong password</h2>
                                            <h2 class="text-red-500">Either <a class="text-[#1DA1F2]" href='register.php'>Register</a> with the new Email or <a class="text-[#1DA1F2]" href='login.php'>Login</a> with an already registered email</h2>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            
                        </body>
                    <?php
                    }
            }
        }
        
    ?>
</html>

