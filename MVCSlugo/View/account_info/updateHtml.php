<div class="gamesStructure col-md-offset-4 col-md-4">
    <style>
        #color
        {
            color: red;
        }

    </style>
    <!--<div>

    </div>-->
    <div style="width:auto; height: auto; background-color: white; border-radius: 3px;padding-left: 10px; padding-right: 10px; margin-top: 5px ">
        <div id="color">
            <span style="width:auto; height: auto; background-color: white; border-radius: 3px; padding-left: 5px; margin-top: 5px" class="has-error"><?php echo $validationError; ?></span>
        </div>

        <form action="" method="post">
            <div class="field">
                <label style="color: #333333" for="name">First Name:</label>
                <div id="">
                    <input  style="color: #333333" class="form-control" Type="text" name="first name" value="<?php echo escape($user->data()->first_name);?>" placeholder="First Name">
                </div>
                <label  style="color: #333333" for="name">Last Name:</label>
                <div id="">
                    <input  style="color: #333333" class="form-control" Type="text" name="last name" value="<?php echo escape($user->data()->last_name);?>" placeholder="Last Name">
                </div>
                <div style=" padding-top: 5px">

                    <input style="padding: 10px; background-color: cornflowerblue; border-color: transparent; margin-top: 15px" type="submit" class="btn btn-default btn-block" value="Update">

                    <input type="hidden" name="token" value="<?php echo Token::generate();?>">

                </div>

            </div>
            <center><a style="color: #333333" href="../../Controller/info/account.php">BACK</a></center>
        </form>

    </div>
