<style>
    #color
    {
        color: red;
    }
</style>
<?php

    $validationError = '';

?>
<div  class="col-md-12" STYLE="padding-top: 15px">
    <div class="col-md-offset-4 col-md-4">
        <div id="color">
            <span class="has-error"><?php echo $validationError; ?></span>
        </div>
        <form action ="" method="post">
            <div class = "field">
                <label for="title">Title:

                <select name="title">
                    <option value="President">President</option>
                    <option value="Vice President">Vice President</option>
                    <option value="Secretary">Secretary</option>
                    <option value="Treasurer">Treasurer</option>
                </select></label>
               <!-- <label for="title">Title:</label>
                <div id="fix">
                    <input type="text" class="form-control" name="title" id="title" autocomplete ="off" placeholder="Title">
                </div>-->


            </div>

            <div class = "field">
                <label for="name">Full Name:</label>
                <div id="fix">
                    <input type="text" class="form-control" name="name" id="name" autocomplete ="off" placeholder="Full Name">
                </div>
            </div>

            <div class="field">
                <label for="contactEmail">Email Address*:</label>
                <div id="fix">
                    <input type="text" class="form-control" name="contactEmail" id="contactEmail" placeholder="Email Address">
                </div>
            </div>

            <div class="field">
                <label for="contactPhone">Phone Number*:</label>
                <div id="fix">
                    <input type="text" class="form-control" name="contactPhone" id="contactPhone" placeholder="Phone Number">
                </div>
            </div>
            <div class="field">
                <label for="bio">Bio*:</label>
                <div id="fix">
                    <input type="text" class="form-control" name="bio" id="bio" placeholder="Bio">
                </div>
            </div>

            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <input id="alert" type="submit" class="btn btn-default" value="Submit">
        </form>
    </div>
    <!--<div class="col-md-12">
        <div id="color"
            <label>When you attempt to login for the first time, an email will be sent to you to activate your account.</label>
        </div>-->
</div>
</div>