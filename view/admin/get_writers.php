<?php  require 'header.php';?>

<?php
if(!empty($data['data']))
     echo'<table class="table table-hover">
            <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Articles</th>
                <th>Email</th>
                <th>Last seen</th>
                <th>Block</th>
                <th>Delete</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>';

    foreach($data['data'] as $datas):
?>


            <tr>
                <td><?= $datas['name'] ; ?></td>
                <td><?= $datas['surname'] ; ?></td>
                <td><?= $datas['count_article'] ; ?></td>
                <td><?= $datas['email'] ; ?></td>
                <td><?= $datas['last_seen'] ; ?></td>
                <td><a href="http://localhost/admin_panel/?admin=admin/get_writers/block/<?php if($datas['block']){echo'0/'.$datas['id_writer'].'"';}else{echo '1/'.$datas['id_writer'].'"';}?>"><?php if($datas['block']==1){echo '<button type="button" class="btn btn-outline-danger btn-sm">Unblock</button>';}else{echo '<button type="button" class="btn btn-outline-danger btn-sm">Block</button>';}?></a><br></td>
                <td><a href="http://localhost/admin_panel/?admin=admin/get_writers/delete_w/<?= $datas['id_writer'];?>"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a><br></td>
                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#a<?= $datas['id_writer'];?>">Open modal</button></td>

            </tr>

        <div class="modal" id="a<?= $datas['id_writer'];?>">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h1 class="modal-title"><?= $datas['name'] ; ?></h1>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <h3><?= $datas['surname'];?></h3>
                        <?= $datas['email'];?>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <a href="http://localhost/admin_panel/?admin=admin/get_writers/block/<?php if($datas['block']){echo'0/'.$datas['id_writer'].'"';}else{echo '1/'.$datas['id_writer'].'"';}?>"><?php if($datas['block']==1){echo '<button type="button" class="btn btn-outline-danger btn-sm">Unblock</button>';}else{echo '<button type="button" class="btn btn-outline-danger btn-sm">Block</button>';}?></a>
                        <a href="http://localhost/admin_panel/?admin=admin/get_writers/delete_w/<?= $datas['id_writer'];?>"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a>
                    </div>

                </div>
            </div>
        </div>


<?php endforeach ;

    echo'</tbody></table>';
?>



<?php  require 'footer.php';?>