<?php
    require_once 'library.php';

    if(isLogin()){
        header("Location: home.php");
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
                    <h1 class="text-black text-3xl font-bold py-8">Creat your account</h1>
                    <form class="form-horizontal space-y-4" method="post" action="register_action.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control w-full p-2 bg-white rounded-md border border-gray-300 focus:outline-none focus:border-sky-500"
                            placeholder="Username" type="text" name="username" id="username" required>
                        </div>
                        <div>
                           <input class="form-control w-full p-2 mb-15 bg-white rounded-md border border-gray-300 focus:outline-none focus:border-sky-500" placeholder="Email"
                            type="email" name="email" id="email" required> 
                        </div>
                        <div>
                            <input class="form-control w-full p-2 mb-15 bg-white rounded-md border border-gray-300 focus:outline-none focus:border-sky-500" placeholder="Password"
                            type="password" name="password" id="password" required> 
                        </div>
                        <div>
                            <input class="form-control w-full p-2 mb-15 bg-white rounded-md border border-gray-300 focus:outline-none focus:border-sky-500" placeholder="Confirm Password"
                            type="password" id="cpass" name="cpass" onblur="chk()" required> 
                        </div>
                        <div>
                            <label for="foto" class="py-5">Upload Photo Profile</label>
                            <input class="form-control w-full p-2 mb-15 bg-white rounded-md border border-gray-300 focus:outline-none focus:border-sky-500" placeholder="Upload Photo Profile"
                                type="file" name="foto" id="foto" accept="image/*"> 
                        </div>
                        
                        <button class="w-full p-2 bg-black rounded-full font-bold text-white" type="submit" name="sign-up">Sign Up</button>
                    </form>
                    <p>Have an account already? <a style="color:#1DA1F2;" href="login.php">Sign In</a></p>
                </div>
            </div>

        </div>
    </body>
    
    <!-- <body>
      
        <form class="form-horizontal" action="register_action.php" method="post">
          <div class="form-group">
            <label for="inputFname3" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputUsername" name="username" placeholder="First Name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
          </div>
           <div class="form-group">
            <label for="inputCpassword3" class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="cpass" name="cpass" onblur="chk()" placeholder="Confirm Password" required>
            <div id="error"></div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="sign-up">Sign Up</button>
            </div>
          </div>
        </form>
        <script src="myscript.js" type="text/javascript"></script>
    </body> -->
</html>