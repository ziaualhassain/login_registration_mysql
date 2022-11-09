<?php

@include 'config.php';
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
        $insert = "INSERT INTO user_form(email,name,password) VALUES('$email','$name','$pass')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }
};
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <body>
        <img class="wave" src="img/wave.png">
        <div class="container">
            <div class="img">
                <img src="img/bg.svg">
            </div>
            <div class="login-content">
                <form action="" method="post">

                <?php
                   if(isset($error)){
                   foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
               };
              ?>
                    <img src="img/avatar.svg">
                    <h2 class="title">Create Account </h2>

                    <div class="input-div one">
                        <div class="i"> 
                             <i class="fas fa-envelope"></i>
                        </div>
                        <div class="input-div">
                             <h5>Email</h5>
                             <input type="email" name="email" class="input">
                     </div>

                     
                     <div class="input-div one">
                        <div class="i">
                                <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                                <h5>Name</h5>
                                <input type="text" name="name" class="input">
                        </div>
                     </div>

                       <div class="input-div one">
                          <div class="i">
                                  <i class="fas fa-lock"></i>
                          </div>
                          <div class="div">
                                  <h5>Password</h5>
                                  <input type="password" name="password" class="input">
                          </div>
                       </div>

                       <div class="input-div pass">
                          <div class="i"> 
                               <i class="fas fa-lock"></i>
                          </div>
                          <div class="div">
                               <h5>Comfirm Password</h5>
                               <input type="password"  name="cpassword" class="input">
                       </div>
                    </div>
                    Already have an account?<a href="./login.php">Login Here</a>
                    <input type="submit" name="submit" class="btn" value="Register">
                </form>
            </div>
        </div>
        <script type="text/javascript" src="js/main.js"></script>
</body>
</html>