<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php
    
    if(isLogin()){
        header("Location: home.php");
    }
?>

<?php


   if(isset($_POST['sign-up'])){
       
        $username = $_POST['username'];
        $email = $_POST['email'];
        $temp  = $_POST['password'];
        $options = array('cost' => 10);
        $password = password_hash($temp, PASSWORD_BCRYPT, $options);
    

        if ($_FILES) {

            $fileName = $_FILES['foto']['name'];
            $fileType = $_FILES['foto']['type'];
            $fileContent = file_get_contents($_FILES['foto']['tmp_name']);
            $dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
            
            $item = new Item(array(
                'name' => $fileName,
                'type' => $fileType,
                'data' => $dataUrl
            ));

            // $foto = $_FILES["foto"];
            // echo "masuk";

            $arrays = array(
                "username" => $username,
                "email" => $email,
                "password" => $password,
                "foto" => $item
            
            );

        }else{
            echo "ga masuk";
            $arrays = array(
            
                "username" => $username,
                "email" => $email,
                "password" => $password
            
            );
        }



        
        $emailEmpty = checkEmail($email);
        $usernameEmpty = checkUsername($username);

        if(($emailEmpty == true) && ($usernameEmpty == true)){

            register($arrays);
            header("Location: login.php");
        
        }else{

            if($emailEmpty == false){
                echo "Email already registered!";
                echo"<br>";
                echo "Please <a href='register.php'>Register</a> with another email";
                
            }else{

                if($usernameEmpty == false){
                    echo "username already taken!";
                    echo"<br>";
                    echo "Please <a href='register.php'>Register</a> with another username";
                }
            }





       }
}

?>