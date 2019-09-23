<?php  require 'header.php';?>


    <form class="form-horizontal" action="?admin=writer/profile/update_w" method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend>Update Profile</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-8 control-label" for="textinput">Name</label>
                <div class="col-md-8">
                    <input id="textinput" name="name" type="text" placeholder="name" value="<?=  $data['data'][0]['name'];?>" class="form-control input-md">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="textinput">Surname</label>
                <div class="col-md-8">
                    <input id="textinput" name="surname" type="text" placeholder="surname" value="<?=  $data['data'][0]['surname'];?>" class="form-control input-md">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="textinput">Email</label>
                <div class="col-md-8">
                    <input id="textinput" name="email" type="text" placeholder="email" value="<?=  $data['data'][0]['email'];?>" class="form-control input-md">

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-8 control-label" for="textinput">Password</label>
                <div class="col-md-8">
                    <input id="textinput" name="password" type="password" placeholder="password" value="<?=  $data['data'][0]['password'];?>" class="form-control input-md">

                </div>
            </div>
            <input id="textinput" name="id_writer" type="hidden" placeholder="Header" value="<?=  $data['data'][0]['id_writer'];?>" class="form-control input-md">

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-8 control-label" for="singlebutton">Apply</label>
                <div class="col-md-8">
                    <input type="submit" class="btn btn-primary"value="Apply">
                </div>
            </div>

        </fieldset>
    </form>
<?php  require 'footer.php';?>