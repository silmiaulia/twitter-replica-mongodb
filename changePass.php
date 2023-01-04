<?php
    require_once 'library.php';

    if(isLogin()){

      $username = $_SESSION["uname"];
      $email = $_SESSION["email"];

      $getDataAccount = getData($email);

    }
?>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-[#D9D9DB]">
        <div class="flex min-h-screen items-center justify-center">

            <div class="min-h-1/2 bg-white rounded-2xl shadow-lg">
                <div class="px-32 flex items-center space-y-4 py-20 text-gray-500 flex-col">
                    <svg viewBox="0 0 24 24" class=" h-12 w-12 text-[#1DA1F2]" fill="currentColor">
                        <g>
                            <path
                                d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                            </path>
                        </g>
                    </svg>
                    <h1 class="text-black text-3xl font-bold py-8">Edit Profile</h1>
                    <?php
                            
                            if (isset($_GET['message'])) {

                                $pesan = trim($_GET['message']);

                                echo "<div class='bg-white text-center py-4 lg:px-4'>
                                        <div class='p-5 bg-blue-500 items-center text-white leading-none lg:rounded-full flex lg:inline-flex' role='alert'>
                                        <span class='font-semibold mr-2 text-left flex-auto'>$pesan</span>
                                        </div>
                                    </div>";

                            }

                    ?>
                    <form class="form-horizontal space-y-4" method="post" action="changePass_action.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control w-full p-2 bg-white rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                             type="hidden" 
                             name="user_id" 
                             id="user_id" 
                             value=<?php echo $getDataAccount["_id"]?>>

                            <input class="form-control w-full p-2 bg-white rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                             type="hidden" 
                             name="username_real" 
                             id="username_real" 
                             value=<?php echo $getDataAccount["username"]?>>
                        </div>
                        <div>

                            <input class="form-control w-full p-2 bg-white rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                             type="hidden" 
                             name="email_real" 
                             id="email_real" 
                             value=<?php echo $getDataAccount["email"]?>>

                        </div>
                        <div>
                            <label class="form-label">Enter your old password</label>
                            <input class="form-control w-full p-2 bg-white rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                             type="text" 
                             name="old_password" 
                             id="old_password" >

                        </div>
                        <div>
                            <label class="form-label">Enter new Password</label>
                            <input class="form-control w-full p-2 bg-white rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                             type="text" 
                             name="password" 
                             id="password" >

                        </div>
                        
                        <div class="mt-5">
                            <button class="w-full p-2 bg-black hover:bg-gray-700 rounded-full font-bold text-white" type="submit" name="update_pass">Update</button>
                        </div>

                        <div class="mt-5">
                            <a href="editprofile.php">
                                <button class="w-full p-2 bg-black hover:bg-gray-700 rounded-full font-bold text-white " type="button">Back</button>
                            </a>
                        </div>
                        
                    </form>



                    
                </div>
            </div>

        </div>
    </body>
    
</html>