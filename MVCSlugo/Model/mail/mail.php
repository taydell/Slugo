<?php
require_once '../../Config/core/init.php';
require_once 'mailer/PHPMailerAutoload.php';

?>


<?php
function mailBox()
{

    $mail = new PHPMailer;
    $user = new User();
    $data = $user->data();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
//$mail->SMTPDebug = 2;

//connecting
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'acm.slugo@gmail.com';
    $mail->Password = 'slugopassword';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;


//actual mail
    $mail->From = 'acm.slugo@gmail.com';
    $mail->FromName = 'ACM';
    $mail->addReplyTo('acm.slugo@gmail.com', 'Reply address');
    $mail->addAddress(($data->email), ($data->first_name) + ($data->last_name));
//$mail->addCC('tayd3ll@yahoo.com','Taylor Nichols');
//$mail->addBCC('tayd3ll@yahoo.com', 'Taylor Nichols');

//$mail->addAttachment('files/testImage.jpg','Test.jpg'); //sends files... write multiple lines to send multiple lines

    $mail->isHTML(true);//makes it an html email

    $mail->Subject = 'Validate Email';
//$mail->Body = 'This is the body of the email!';// normal email


    $link = "<li><a href='http://localhost:63342/MVCSlugo/Controller/login_register/activate.php?id=" . $data->id . "&email=" . $data->email . "&email_code=" . $data->email_code . "'>Click Here</a></li>";
    $url = "<li> href='http://localhost:63342/MVCSlugo/Controller/login_register/activate.php?id=" . $data->id . "&email=" . $data->email . "&email_code=" . $data->email_code . "</li>";

    $body = "Hello " . $data->first_name . ", " .
        "Please validate your email with the link below." . $link . " If you cannot click the link in your browser please copy and past this url into your browser.".$url;

    $mail->Body = $body;


    if ($mail->send()) {

        return 'You must verify your email, an email has been sent to you.';


    } else {

        return 'failed to send email';


    }
}

function resetPassMail()
{
    $mail = new PHPMailer;
    $user = new User();
    $data = $user->data();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
//$mail->SMTPDebug = 2;

//connecting
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'acm.slugo@gmail.com';
    $mail->Password = 'slugopassword';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;


//actual mail
    $mail->From = 'acm.slugo@gmail.com';
    $mail->FromName = 'ACM';
    $mail->addReplyTo('acm.slugo@gmail.com', 'Reply address');
    $mail->addAddress(($data->email), ($data->first_name) + ($data->last_name));
//$mail->addCC('tayd3ll@yahoo.com','Taylor Nichols');
//$mail->addBCC('tayd3ll@yahoo.com', 'Taylor Nichols');

//$mail->addAttachment('files/testImage.jpg','Test.jpg'); //sends files... write multiple lines to send multiple lines

    $mail->isHTML(true);//makes it an html email

    $mail->Subject = 'Reset Password';
//$mail->Body = 'This is the body of the email!';// normal email


    $link = "<li><a href='http://localhost:63342/MVCSlugo/Controller/recovery/resetPassword.php?email=" . $data->email . "&username=" . $data->username. "&resetPassCode=" .$data->resetPassCode."'>Click Here</a></li>";
    $url = "<li> href='http://localhost:63342/MVCSlugo/Controller/recovery/resetPassword.php?email=" . $data->email . "&username=" . $data->username. "&resetPassCode=" .$data->resetPassCode."'</li>";

    $body = "Hello " . $data->first_name . "," .
        "To reset your password, click the link below." . $link . " If you cannot click the link in your browser please copy and past this url into your browser.".$url;

    $mail->Body = $body;


    if ($mail->send()) {

        return 'You must verify your email, an email has been sent to you.';


    } else {

        return 'failed to send email';


    }

}
function forgotUserMail()
{
    $mail = new PHPMailer;
    $user = new User();
    $data = $user->data();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
//$mail->SMTPDebug = 2;

//connecting
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'acm.slugo@gmail.com';
    $mail->Password = 'slugopassword';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;


//actual mail
    $mail->From = 'acm.slugo@gmail.com';
    $mail->FromName = 'ACM';
    $mail->addReplyTo('acm.slugo@gmail.com', 'Reply address');
    $mail->addAddress(($data->email), ($data->first_name) + ($data->last_name));
//$mail->addCC('tayd3ll@yahoo.com','Taylor Nichols');
//$mail->addBCC('tayd3ll@yahoo.com', 'Taylor Nichols');

//$mail->addAttachment('files/testImage.jpg','Test.jpg'); //sends files... write multiple lines to send multiple lines

    $mail->isHTML(true);//makes it an html email

    $mail->Subject = 'Forgot Username';
//$mail->Body = 'This is the body of the email!';// normal email

    $username = $data->username;
    $space = '</br>';

    $body = "Hello " . $data->first_name . "," .$space.
        "We see that you've forgotten your username... here you go dummy. "."Your username: ".$username;

    $mail->Body = $body;


    if ($mail->send()) {

        return 'You must verify your email, an email has been sent to you.';


    } else {

        return 'failed to send email';


    }

}


