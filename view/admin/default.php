<html !DOCTYPE>
<html lang="eng">
<head>

    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css"  crossorigin="anonymous">
    <link rel="stylesheet" href="view/css/admin.css"  crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.js"  crossorigin="anonymous"></script>
    <script src="node_modules//popper.js/dist/umd/popper.js" crossorigin="anonymous"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.js"  crossorigin="anonymous"></script>

</head>
<body>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->


            <?php if(isset($data['result']) && $data['result']=='block'){echo ' <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Blocked! </strong>  Your profile is blocked!
  </div>';}else if(isset($data['result']) && $data['result']=='false'){echo '  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>User name or password is not exist! </strong> Please check the username and password!
  </div>';}?>
            <!-- Login Form -->
            <form action="http://localhost/admin_panel/?admin=checker/check_login" method="POST">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
                <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>


<?php require 'footer.php'?>