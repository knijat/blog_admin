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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="border-bottom:1px solid black">
            <h1 >Welcome to admin panel</h1>
            <?php if(isset($data['result']) && $data['result']=='true'){echo ' <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success! </strong>  Action is successfully completed!
  </div>';}else if(isset($data['result']) && $data['result']=='false'){echo '  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Unsuccess ! </strong>  Action is not completed
  </div>';}?>
        </div>
        <div class="col-md-2" style="padding-left:0px;">
            <a href="http://localhost/admin_panel/?admin=admin/main"> <button type="button" selected class="btn btn<?php if($data['page'][1]=='main'){echo '';}else{echo '-outline';}?>-dark">Main menu</button></a><br>
            <a href="http://localhost/admin_panel/?admin=admin/newest"> <button type="button" class="btn btn<?php if($data['page'][1]=='newest'){echo '';}else{echo '-outline';}?>-dark">Newest</button></a><br>
            <a href="http://localhost/admin_panel/?admin=admin/get_writers"> <button type="button" class="btn btn<?php if($data['page'][1]=='get_writers'){echo '';}else{echo '-outline';}?>-dark">Writers</button></a><br>
            <a href="http://localhost/admin_panel/?admin=admin/get_articles"> <button type="button" class="btn btn<?php  if($data['page'][1]=='get_articles'){echo '';}else{echo '-outline';}?>-dark">Articles</button></a><br>
            <a href="http://localhost/admin_panel/?admin=checker/unset"><button type="button" class="btn btn-outline-dark">Log out</button></a><br>
        </div>
        <div class="col-md-10" style="border-left:1px solid black;">
