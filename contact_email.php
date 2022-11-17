<?php

if (!isset($_REQUEST['safety_key'])) {
    die();
}
// Admin Email.

$to = "contato@martinsrodrigues.adv.br"; // write you email address in here.

// Fetching Values from URL.

$user_name = $_POST['user_name'];

$user_email = $_POST['user_email'];

$email_subject = $_POST['email_subject'];

$email_message = $_POST['email_message'];



$template = '<div>Olá' . $user_name . ',<br/>'
        . '<br/>Obrigado, por entrar em contato!<br/><br/>'
        . 'Name:' . $user_name . '<br/>'
        . 'Email:' . $user_email . '<br/>'
        . 'Message:' . $email_message . '<br/><br/>'
        . 'Este é um e-mail de confirmação de contato.'
        . '<br/>'
        . 'Entraremos em contato com você o mais breve possível .</div>';

$message = "<div>" . $template . "</div>";

$headers = 'MIME-Version: 1.0' . "\r\n";

$headers.='Content-type: text/html; charset=utf-8; charset=iso-8859-1' . "\r\n";

$headers.='From:' . $user_email . "\r\n"; // Sender's Email

mail($to, $email_subject, $message, $headers, '');


$data = array(
    'status' => 1,
    'msg' => "Your Query has been received, We will contact you soon."
);

echo json_encode($data);