<?php  require 'header.php';?>

    <h1>Header</h1>
<p><?= $data['data'][0]['header']?></p>
    <h4>Subject</h4>
<p><?= $data['data'][0]['subject']?></p>
    <h4>Writer name</h4>
<p><?= $data['data'][0]['name']?></p>

    <h5>Article</h5>
<p style="border:1px solid black;"><?= $data['data'][0]['articles']?></p>

<?php  require 'footer.php';?>