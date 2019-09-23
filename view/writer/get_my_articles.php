<?php  require 'header.php';?>

                <?php


                if(!empty($data['data']) && isset($data['data']))
                    echo'<table class="table table-hover">
            <thead>
            <tr>
                <th>No</th>
                <th>Header</th>
                <th>Article</th>
                <th>View</th>
                <th>Date</th>
                <th>Published</th>
                <th>Edit</th>
                <th>Delete</th>
               
            </tr>
            </thead>
            <tbody>';

                foreach($data['data'] as $datas):
                    ?>


                    <tr>
                        <td><?= $datas['id_article'] ; ?></td>
                        <td><?= $datas['header'] ; ?></td>
                        <td><?= substr($datas['articles'],0,50).'<b>....</b>' ; ?></td>
                        <td><?= $datas['view'] ; ?></td>
                        <td><?= $datas['date'] ; ?></td>
                        <td><?= $published=($datas['published']) ? 'yes':'no' ; ?></td>
                        <td><a href="http://localhost/admin_panel/?admin=writer/get_my_articles/<?php echo $datas['id_article'];?>"><button type="button" class="btn btn-danger btn-sm">Edit</button></a><br></td>
                        <td><a href="http://localhost/admin_panel/?admin=writer/delete/<?php echo $datas['id_article'];?>"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a><br></td>
                    </tr>



                <?php endforeach ;

                echo'</tbody></table>';
                ?>






<?php  require 'footer.php';?>