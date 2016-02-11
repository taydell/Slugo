<?php
require_once '../../Config/core/init.php';

$user = new User();
$validationError = "";
if(!$user->isLoggedIn())
{
    Redirect::to('../../View/account_info/index.php');
}

if(Input::exists())
{
    if(Token::check(Input::get('token')))
    {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'password_current' => array(
                'required' => true,
                'min' => 6
            ),
            'password_new' => array(
                'required' => true,
                'min' => 6,
                'canNotMatches'=> 'password_current'
            ),
            'password_new_again' => array(
                'required' => true,
                'min' => 6,
                'matches' => 'password_new'

            )
        ));

        if($validation ->passed())
            //change of password
        {
            if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password)
            {
                echo'Your current password is wrong.';
            }
            else
            {
                $salt = Hash::salt(32);
                $user->update(array(
                    'password' => Hash::make(Input::get('password_new'),$salt),
                    'salt'=> $salt
                ));

                Session::flash('home','<center> Your password has been changed.</center>');
                Redirect::to('../../Controller/info/account.php');
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
//require_once 'html/changepasswordhtml.php';
?>
