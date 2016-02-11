<?php
require_once '../../Config/core/init.php';

$user = new User();

if(!$user -> isLoggedIn())
{
    Redirect::to('../../View/account_info/index.php');
}
$validationError = "";
if(Input::exists())
{
    if(Token::check(Input::get('token')))
    {
        $validate = new Validate();
        $validation = $validate->check($_POST,array(
            'first_name'=> array(
                'required'=> true,
                'min' => 2,
                'max' => 50
            ),
            'last_name'=> array(
                'required'=> true,
                'min' => 2,
                'max' => 50
            )
        ));
        // this is $validation
        if($validation->passed())
        {
            //update
            try
            {
                $user->update(array(
                    'first_name'=> Input::get('first_name'),
                    'last_name'=> Input::get('last_name'),
                ));
                Session::flash('home', '<center>Your details have been updated.</center>');
                Redirect::to('../../Controller/info/account.php');
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
        else
        {
            $bulkErrors = " ";
            foreach ($validation->errors() as $errors) {
                // echo $errors,'<br>';
                $space = '<br>';
                $bulkErrors .= $errors . $space;
            }
            $validationError = $bulkErrors;
        }
    }
}
//require_once 'html/updatehtml.php';
?>
