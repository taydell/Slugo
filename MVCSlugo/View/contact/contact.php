<?php
require_once '../../Config/core/init.php';
require_once '../../Model/mail/mailer/PHPMailerAutoload.php';

$user = new User();

function contact()
{
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    //$mail->SMTPDebug = 2;

    //connecting
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'acm.slugo@gmail.com';
    $mail->Password = 'slugopassword';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $message = $_POST['message'];
    //actual mail
    $mail->From = $email;
    $mail->FromName = $name;
    $mail->addReplyTo('acm.slugo@gmail.com', 'Reply address');
    $mail->addAddress('acm.slugo@gmail.com');


    $mail->isHTML(true);//makes it an html email
    $mail->Subject = $topic;
    $space = '<br>';
    $body = "Hello my name is " .$name.
        ",".$space.$space.$message.$space.$space.
        "My email is: ".$email."";


    $mail->Body = $body;


    if ($mail->send())
    {

        //echo escape($data->email);
        return   ' Thankyou for your feedback, an email has been sent.';

    } else
    {
        return 'failed to send email';
    }
}
$validationError = "";
if(isset($_POST['submit']))
{
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'name' => array(
            'required' => true
        ),
        'email' => array(
            'required' => true,
            'valid_email'=> 'true'
        ),
        'topic' => array(
            'required' => true
        ),
        'message' => array(
            'required' => true)
    ));
    if ($validation->passed())
    {

        $validationError = contact();
    }
    else
    {
        $bulkErrors =" ";
        foreach ($validation->errors() as $errors)
        {
            $space = '<br>';
            $bulkErrors .= $errors.$space;
        }
        $validationError = $bulkErrors;
    }
}

//require_once 'html/contactView.php';
?>
