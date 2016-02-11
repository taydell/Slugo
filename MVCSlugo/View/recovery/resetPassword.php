<?php
require_once '../../Config/core/init.php';

$user = new User();
$data = $user->data();

$validationError = "";

if($user->isLoggedIn())
{
    //echo $data->id;
    Redirect::to('../../Controller/general/home.php');
}
else
{

    $resetPassCode = "";
    if (isset($_GET['email'], $_GET['username'], $_GET['resetPassCode']) == true) {
        $email = trim($_GET['email']);
        $username = trim($_GET['username']);
        $reset = trim($_GET['resetPassCode']);

        $user = new User();
        $pass = Input::get('email');
        $login = $user->forgotPass(Input::get('username'), $pass);
        $data = $user->data();

        if ($reset === $data->resetPassCode) {
            $user->logout();

            if (Input::exists()) {

                if (Token::check(Input::get('token'))) {

                    $validate = new Validate();
                    $validation = $validate->check($_POST, array(
                        'password_new' => array(
                            'required' => true,
                            'min' => 6,
                        ),
                        'password_again' => array(
                            'required' => true,
                            'min' => 6,
                            'matches' => 'password_new'

                        )
                    ));

                    if ($validation->passed()) //change of password
                    {

                        $user = new User();
                        $pass = Input::get('email');
                        $login = $user->forgotPass(Input::get('username'), $pass);
                        $data = $user->data();


                        $user = new User();
                        $salt = Hash::salt(32);
                        $user->update(array(
                            'password' => Hash::make(Input::get('password_new'), $salt),
                            'salt' => $salt
                        ));
                        $username = "random";
                        try {
                            $user = new User();
                            $user->update(array(
                                'resetPassCode' => md5($username.microtime())
                            ));
                        } catch (Exception $e) {
                            die($e->getMessage());
                        }

                        $user->logout();
                        Redirect::to('../../Controller/login_register/login.php');

                    } else {
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
        }
        else
        {
            $user->logout();
            Redirect::to('../../Controller/login_register/login.php');
        }
    }

}
//require_once 'html/resetPasswordView.php';
?>
