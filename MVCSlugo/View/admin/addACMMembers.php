<?php
require_once '../../Config/core/init.php';
require_once '../../Config/data/IncludesNeeded.php';


$user = new User();
if($user->isLoggedIn()) {
    if ($user->hasPermission('admin')) {
        $validationError = "";

        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {
                $validate = new Validate();
                $validation = $validate->check($_POST, array(
                    'name' => array(
                        'required' => true,
                        'min' => 2,
                        'max' => 50
                    ),
                    'contactEmail' => array(
                        'required' => true,
                        'min' => 2,
                        'max' => 100,
                        'valid_email' => 'true'
                    ),
                    'contactPhone' => array(
                        'required' => true,
                        'min' => 2,
                        'max' => 100
                    ),
                    'bio' => array(
                        'required' => true,
                        'min' => 2,
                        'max' => 1000,


                    )
                ));

                if ($validation->passed()) {
                    //register user
                    $user = new User();

                    $salt = Hash::salt(32);
                    try {
                        $user->createMembers(array(
                            'title' => Input::get('title'),
                            'name' => Input::get('name'),
                            'contactEmail' => Input::get('contactEmail'),
                            'contactPhone' => Input::get('contactPhone'),
                            'bio' => Input::get('bio'),
                            'joined' => date('Y-m-d H:i:s')
                        ));

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
    else
    {

    }
}
else
{

}

?>

