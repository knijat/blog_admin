<?php require 'header.php'; ?>

<form class="form-horizontal" action="?admin=writer/update/update" method="POST">
    <fieldset>

        <!-- Form Name -->
        <legend>Update the article</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-8 control-label" for="textinput">Header</label>
            <div class="col-md-8">
                <input id="textinput" name="header" type="text" placeholder="Header" value="<?=  $data['data'][0]['header'];?>" class="form-control input-md">

            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-8 control-label" for="selectbasic">Subject of article</label>
            <div class="col-md-8">
                <select id="selectbasic" name="subject" class="form-control">
                    <option <?php if($data['data'][0]['subject']=="world"){echo 'selected';} ?> value="World">World</option>
                    <option <?php if($data['data'][0]['subject']=="economy"){echo 'selected';} ?> value="Economics">Economy</option>
                    <option <?php if($data['data'][0]['subject']=="literature"){echo 'selected';} ?> value="Literature">Literature</option>
                    <option <?php if($data['data'][0]['subject']=="daily"){echo 'selected';} ?> value="Daily">Daily</option>
                </select>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-8 control-label" for="textarea">Text Area</label>
            <div class="col-md-8">
             <textarea name="article" id="editor1" rows="10" cols="80">
               <?= $data['data'][0]['articles'];?>
            </textarea>
            </div>
        </div>
        <input id="textinput" name="id_article" type="hidden" placeholder="Header" value="<?=  $data['data'][0]['id_article'];?>" class="form-control input-md">

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-8 control-label" for="singlebutton">Apply</label>
            <div class="col-md-8">
                <input type="submit" class="btn btn-primary"value="Apply">
            </div>
        </div>

    </fieldset>
</form>



<?php require 'footer.php';?>
