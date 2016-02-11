<div class="gamesStructure col-md-offset-4 col-md-4">
    <style>
        #color
        {
            color: red;
        }
        .btn-default
        {
            background-image: none;
            background-color: transparent;

        }
        .btn:active
        {
            color: #ffffff;
        }
        .btn:focus
        {
            color: #ffffff;
        }

        .btn-default
        {
            color: #ffffff;
        }

        .btn-block
        {
            color: #ffffff;
        }
        .btn-default
        {
            color: #ffffff;
        }
    </style>
    <!--<div>

    </div>-->
    <div style="width:auto; height: auto; background-color: white; border-radius: 3px; margin-top: 5px; padding-left: 10px; padding-right: 10px">
        <center><div id="color">
                <span class="has-error"><?php echo $validationError; ?></span>
            </div></center>

        <center style="color: #333333;padding-top: 20px"><form action="" method="post">
                <div class="field">
                    <label for="password_current">Current password:</label>
                    <div id="">
                        <input class="form-control" type="password" name="password_current" id="password_current" placeholder="Current Password">
                    </div>
                </div>

                <div class="field">
                    <label for="password_new">New password:</label>
                    <div id="">
                        <input class="form-control" type="password" name="password_new" id="password_new" placeholder="New Password">
                    </div>
                </div>

                <div class="field">
                    <label for="password_new_again">Retype new password:</label>
                    <div id="">
                        <input class="form-control" type="password" name="password_new_again" id="password_new_again" placeholder="Retype New Password">
                    </div>
                </div>
                <input style="padding: 10px; background-color: cornflowerblue; border-color: transparent; margin-top: 15px" type="submit" class="btn btn-default btn-block" value="change">
                <input type="hidden" name="token" value="<?php echo Token::generate();?>">

            </form></center>
        <center><a style="color: #333333" href="../../Controller/info/account.php">BACK</a></center>
    </div>