<html !DOCTYPE>
<html lang="eng">
<head>

    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css"  crossorigin="anonymous">
<!--    <link rel="stylesheet" href="view/css/admin.css"  crossorigin="anonymous">-->
    <script src="node_modules/jquery/dist/jquery.js"  crossorigin="anonymous"></script>
    <script src="node_modules//popper.js/dist/umd/popper.js" crossorigin="anonymous"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.js"  crossorigin="anonymous"></script>
    <script src="node_modules/ckeditor/ckeditor.js"></script>

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="border-bottom:1px solid black">
            <h1 >Welcome to writer panel </h1>
            <?php if(isset($data['result']) && $data['result']=='true'){echo ' <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success! </strong>  Action is successfully completed!
  </div>';}else if(isset($data['result']) && $data['result']=='false'){echo '  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Unsuccess ! </strong>  Action is not completed
  </div>';}?>
        </div>
        <div class="col-md-2" style="padding-left:0px;">
            <a href="http://localhost/blog_admin_git/?admin=writer/profile"> <button type="button" selected class="btn btn<?php if($data['page'][1]=='profile'){echo '';}else{echo '-outline';}?>-dark">My Profile</button></a><br>
            <a href="http://localhost/blog_admin_git/?admin=writer/get_my_articles"> <button type="button" class="btn btn<?php if($data['page'][1]=='get_my_articles'){echo '';}else{echo '-outline';}?>-dark">My articles</button></a><br>
            <a href="http://localhost/blog_admin_git/?admin=writer/new_article"> <button type="button" class="btn btn<?php if($data['page'][1]=='new_article'){echo '';}else{echo '-outline';}?>-dark">New article</button></a><br>
            <a href="http://localhost/blog_admin_git/?admin=writer/setting"> <button type="button" class="btn btn<?php  if($data['page'][1]=='setting'){echo '';}else{echo '-outline';}?>-dark">Setting</button></a><br>
            <a href="http://localhost/blog_admin_git/?admin=checker/unset"><button type="button" class="btn btn-outline-dark">Log out</button></a><br>
        </div>

        <div class="col-md-10" style="border-left:1px solid black;">