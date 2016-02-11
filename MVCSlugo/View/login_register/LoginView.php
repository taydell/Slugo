<!--login-->
<div class="gamesStructure col-md-12">

    <div class="col-md-offset-3 col-md-6" style="border-radius: 5px; background-color: #ffffff; padding: 15px">
        <style>
            #color
            {
                color: #ff0008;
                border: #ffffff;
                font-size: medium;
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
        <div id="color" class="" style="width:auto; height: auto; background-color: white; border-radius: 3px;padding-left: 5px; margin-top: 5px;">
            <span class="has-error"><?php echo $validationError; ?></span>
        </div>
        <form action="" method="post">
            <div class="field" style="padding-top: 10px; color: #333333">

                <label for="username">Username:</label>
                <div>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="off" placeholder="Username" >

                </div>
            </div>
            <div id="password" class="field" style="color: #333333">

                <label for="password">Password: </label>
                <div>
                    <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password">
                </div>
            </div>

            <div class="field" style="color: #333333">
                <label for="remember">
                    <input type="checkbox" name="remember" id="remember"> Remember me
            </div>

            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <input style="padding: 15px; background-color: cornflowerblue; border-color: transparent" type="submit" class="btn btn-default btn-block" value="Log in">

        </form>
        <center><a style="color: #333333;" href="../../Controller/recovery/forgotUsername.php">Forgot your Username? Click Here</a></center>
        <center><a style="color: #333333;" href="../../Controller/recovery/forgotPassword.php">Forgot your password? Click Here</a></center>

    </div>

    <div class="col-md-2">

    </div>
</div>