<?php
session_start();

session_unset();
session_destroy();

 $emailmsg="";
 $pasdmsg="";
 $msg="";

 $ademailmsg="";
 $adpasdmsg="";


 if(!empty($_REQUEST['ademailmsg'])){
    $ademailmsg=$_REQUEST['ademailmsg'];
 }

 if(!empty($_REQUEST['adpasdmsg'])){
    $adpasdmsg=$_REQUEST['adpasdmsg'];
 }

 if(!empty($_REQUEST['emailmsg'])){
    $emailmsg=$_REQUEST['emailmsg'];
 }

 if(!empty($_REQUEST['pasdmsg'])){
  $pasdmsg=$_REQUEST['pasdmsg'];
}

if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- custom css link -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container login-container">
        <div class="row">
            <img class="imagelogo" src="images/logo.jpeg" alt="">
            <h4><?php echo $msg?></h4>
        </div>
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>Student Login</h3>
                <form action="login_server_page.php" method="get" autocomplete="off">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email "
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $emailmsg?></label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="login_password" placeholder="Your Password "
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $pasdmsg?></label>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                </form>
            </div>
            <div class="col-md-6 login-form-2">
                <h3>Admin Login</h3>
                <form action="loginadmin_server_page.php" method="get" autocomplete="off">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email *"
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $ademailmsg?></label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="login_password" placeholder="Your Password *"
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $adpasdmsg?></label>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <!-- <div class="form-group">
                            <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                    </div> -->
                </form>
            </div>
        </div>
    </div>







    <!-- bootstrap script link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <!-- jquery script link -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="" async defer></script>

</body>

</html>