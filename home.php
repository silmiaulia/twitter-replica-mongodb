<?php
    require_once 'library.php';

    if(isLogin()){ //if login success
       
        //buat nampilin username
        echo "Logged in!";
        $username = $_SESSION["uname"];
        echo "Welcome $username!!!";

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
    <body>

    <?php echo "<img src=\"{$item['foto']['data']}\">"; ?>

        <form method="post" action="">
            <input type="submit" name="logout" value="Logout!">
        </form>
    </body>
</html>
