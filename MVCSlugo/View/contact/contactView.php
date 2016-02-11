<div class="col-md-offset-2 col-md-8">
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

    <div class="gamesStructure" >
        <div  style="border-radius: 5px; background-color: #ffffff; padding: 15px; color: #333333">
            <div id="color"
            <span class="has-error"><?php echo $validationError; ?></span>
        </div>
        <form action ="" method="post">

            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name"/>

            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email"/>

            <label for="topic">Topic:</label>
            <input type="text" class="form-control" name="topic" id="topic" placeholder="Topic"/>

            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" cols="42" rows="9" placeholder="Body"></textarea>

            <input name="submit" style="margin-top:15px; padding: 15px; background-color: cornflowerblue; border-color: transparent" type="submit" class="btn btn-default btn-block" value="Submit" />
        </form>
    </div>
</div>
</div>