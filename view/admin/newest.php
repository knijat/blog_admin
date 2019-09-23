<?php  require 'header.php';?>

<?php

if(!empty($data['data']))
    echo'<table class="table table-hover">
            <thead>
            <tr>
                <th>Writer</th>
                <th>Header</th>
                <th>Article</th>
                <th>View</th>
                <th>Date</th>
                <th>Published</th>
                <th>Delete</th>
                <th>View</th>
               
               
            </tr>
            </thead>
            <tbody>';

foreach($data['data'] as $datas):
    ?>


    <tr>
        <td><?= $datas['name'] ; ?></td>
        <td><?= $datas['header'] ; ?></td>
        <td><?= substr($datas['articles'],0,500).'<b>....</b>' ; ?></td>
        <td><?= $datas['view'] ; ?></td>
        <td><?= $datas['date'] ; ?></td>
        <td><?= $published=($datas['published']) ? '<a href="http://localhost/admin_panel/?admin=admin/newest/publish/0/'.$datas['id_article'].'"><button type="button" class="btn btn-success btn-sm">Yes</button></a>':'<a href="http://localhost/admin_panel/?admin=admin/newest/publish/1/'.$datas['id_article'].'"><button type="button" class="btn btn-danger btn-sm">No</button></a>'; ?></td>
        <td><a href="http://localhost/admin_panel/?admin=admin/get_articles/delete_a/<?= $datas['id_article'] ?>"><button type="button" class="btn btn-success btn-sm">Delete</button></a></td>
        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#a<?= $datas['id_article'];?>">Open modal</button></td>
    </tr>

    <div class="modal" id="a<?= $datas['id_article'];?>">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1 class="modal-title"><?= $datas['header'] ; ?></h1>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h3><?= $datas['subject'];?></h3>
                    <?= $datas['articles'];?>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <?= $published=($datas['published']) ? '<a href="http://localhost/admin_panel/?admin=admin/newest/publish/0/'.$datas['id_article'].'"><button type="button" class="btn btn-success btn-sm">Yes</button></a>':'<a href="http://localhost/admin_panel/?admin=admin/newest/publish/1/'.$datas['id_article'].'"><button type="button" class="btn btn-danger btn-sm">No</button></a>'; ?>
                    <a href="http://localhost/admin_panel/?admin=admin/get_articles/delete_a/<?= $datas['id_article'] ?>"><button type="button" class="btn btn-success btn-sm">Delete</button></a>
                </div>

            </div>
        </div>
    </div>

<?php endforeach ;

echo'</tbody></table>';
?>




    </div>




<?php  require 'footer.php';?>