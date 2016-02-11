<?php
//require_once '../../Config/core/init.php';
//require_once '../../Config/data/IncludesNeeded.php';


$user = new User();
if($user->isLoggedIn())
{
    Redirect::to('../../Controller/general/home.php');
}
else
{
    $username = "";
    $validationError = "";
    if (Input::exists()) {
        if (Token::check(Input::get('token'))) {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'username' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 20,
                    'unique' => 'users',
                    'spaces' => 'true'
                ),
                ('password') => array(
                    'required' => true,
                    'min' => 6,
                    'spaces' => 'true'
                ),
                'password_again' => array(
                    'required' => true,
                    'matches' => 'password'
                ),
                'first_name' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 50
                ),
                'last_name' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 50
                ),
                'email' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 100,
                    'unique' => 'users',
                    'valid_email' => 'true'
                )
            ));

            if ($validation->passed()) {
                //register user
                $user = new User();

                $salt = Hash::salt(32);
                try {
                    $user->create(array(
                        'username' => Input::get('username'),
                        'password' => Hash::make(Input::get('password'), $salt),
                        'salt' => $salt,
                        'first_name' => Input::get('first_name'),
                        'last_name' => Input::get('last_name'),
                        'email' => Input::get('email'),
                        'joined' => date('Y-m-d H:i:s'),
                        'email_code' => md5($_POST[$username] + microtime()),
                        'resetPassCode' => md5($_POST[$username] + microtime())
                    ));

                    $user = new User();
                    $pass = (Input::get('password'));
                    $login = $user->login(Input::get('username'), $pass);
                    $data = $user->data();

                    mailBox();
                    $user->logout();

                    Redirect::to('../../Controller/contact/email.php');
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                //output errors
                $bulkErrors = "";
                foreach ($validation->errors() as $errors) {
                    //echo $errors, '<br>';
                    $space = '<br>';
                    $bulkErrors .= $errors . $space;
                }
                $validationError = $bulkErrors;


            }
        }
    }
}
//require_once "html/registerView.php";
?>

