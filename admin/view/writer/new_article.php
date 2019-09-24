<?php require 'header.php';?>


<form class="form-horizontal" action="?admin=writer/send" method="POST">
    <fieldset>

        <!-- Form Name -->
        <legend>Write new articles</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-8 control-label" for="textinput">Header</label>
            <div class="col-md-8">
                <input id="textinput" name="header" type="text" placeholder="Header" class="form-control input-md">

            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-8 control-label" for="selectbasic">Subject of article</label>
            <div class="col-md-8">
                <select id="selectbasic" name="subject" class="form-control">
                    <option value="World">World</option>
                    <option value="Economics">Economics</option>
                    <option value="Literature">Literature</option>
                    <option value="Daily">Daily</option>
                </select>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-8 control-label" for="textarea">Text Area</label>
            <div class="col-md-8">
             <textarea name="article" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            </div>
        </div>

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
