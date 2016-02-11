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

<div  class=" gamesStructure col-md-12">

    <div class="col-md-offset-3 col-md-6"  style="border-radius: 5px; background-color: #ffffff; padding: 15px">
        <div  id="color" class="" style="width:auto; height: auto; background-color: white; border-radius: 3px; padding-left: 5px; margin-top: 5px">
            <span class="has-error"><?php echo $validationError; ?></span>
        </div>
        <form action ="" method="post">
            <div class="field" style="padding-top: 10px; color: #333333;">
                <label for="username">Username*:</label>
                <div id="fix">
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete ="off" placeholder="Username">
                </div>
            </div>

            <div class="field" style="color: #333333;">
                <label for="password">password*:</label>
                <div id="fix">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
            </div>

            <div class="field" style="color: #333333;">
                <label for="password_again">Retype Password*:</label>
                <div id="fix">
                    <input type="password" class="form-control" name="password_again" id="password_again" placeholder="Retype Password">
                </div>
            </div>

            <div class="field" style="color: #333333;">
                <label for="first_name">First Name*:</label>
                <div id="fix">
                    <input type="text" class="form-control" name="first_name" value="<?php echo escape(Input::get('first_name')); ?>" id="name" placeholder="First Name">
                </div>
            </div>

            <div class="field" style="color: #333333;">
                <label for="last_name">Last Name*:</label>
                <div id="fix">
                    <input type="text" class="form-control" name="last_name" value="<?php echo escape(Input::get('last_name')); ?>" id="name" placeholder="Last Name">
                </div>
            </div>

            <div class="field" style="color: #333333;">
                <label for="email">Email Address*:</label>
                <div id="fix">
                    <input type="text" class="form-control" name="email" value="<?php echo escape(Input::get('email')); ?>" id="email" placeholder="Email Address">
                </div>
            </div>
            <div style="padding-top: 10px">

                <input style="padding-top: 5px" type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                <div style="">
                    <input style="padding: 15px; background-color: cornflowerblue; border-color: transparent" id="alert" type="submit" class="btn btn-default btn-block" value="Register">
                </div>

            </div>
        </form>
    </div>
    <!--<div class="col-md-12">
        <div id="color"
            <label>When you attempt to login for the first time, an email will be sent to you to activate your account.</label>
        </div>-->
</div>
</div>