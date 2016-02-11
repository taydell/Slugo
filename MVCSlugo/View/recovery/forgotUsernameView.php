<div class="gamesStructure col-md-offset-3 col-md-6">
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
    <div style="padding-top: 15px; width:auto; height: auto; background-color: white; border-radius: 3px;padding-left: 10px;padding-right: 10px; margin-top: 5px; padding-bottom: 15px">
        <div id="color">
            <span class="has-error"><?php echo $validationError; ?></span>
        </div>
        <form action="" method="post">
            <div id="email" class="field">

                <label style="color: #333333" for="email">Email: </label>
                <div>
                    <input type="text" class="form-control" name="email" id="email" autocomplete="off" placeholder="Email">
                </div>
            </div>

            <div style="padding-top: 5px">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <input style="padding: 10px; background-color: cornflowerblue; border-color: transparent; margin-top: 15px" type="submit" class="btn btn-default btn-block" value="send">
            </div>

        </form>
    </div>