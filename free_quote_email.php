<?php

if (!isset($_REQUEST['safety_key'])) {

    die();
}

$to = "contato@martinsrodrigues.adv.br"; // Set Admin email address in here.

$email_subject = "Contato: Martins e Rodrigues Adovogados Associados";

$customer_name = isset( $_POST['your_name'] ) ? $_POST['your_name'] : '';
$customer_email = isset( $_POST['your_email'] ) ? $_POST['your_email'] : '';
$customer_phone = isset( $_POST['your_phone'] ) ? $_POST['your_phone'] : '';
$your_service_type = isset( $_POST['your_service_type'] ) ? $_POST['your_service_type'] : '';
$customer_message = isset( $_POST['textarea_message'] ) ? $_POST['textarea_message'] : '';

$template = 'Olá Administrator, <br/>'
        . '<br/>Um cliente enviou uma mensagem. Aqui vai os detalhes:<br/>'
        . 'Name: ' . $customer_name . '<br/>'
        . 'Email: ' . $customer_email . '<br/>'
        . 'Phone No: ' . $customer_phone . '<br/>'
        . 'Service: ' . $your_service_type . '<br/>'
        . 'Message: ' . $customer_message;
$message = "<div>" . $template . "</div>";

// Send A Confirmation Message To The Site Admin.

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers.='Content-type: text/html; charset=utf-8; charset=iso-8859-1' . "\r\n";
$headers.='From: Free Quote Request <' . $customer_email . '>';
mail( $to, $email_subject, $message, $headers, '');


// Send A Confirmation Message To Customer.

$customer_email_subject = "Contato Site";

$template = 'Olá, ' . $customer_name . ',<br/>'
            . '<br/>Obrigado por entrar em contato conosco. Entraremos em contato com você em breve!
             <br>Obrigado!<br/>';
$message = "<div>" . $template . "</div>";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers.='Content-type: text/html; charset=utf-8; charset=iso-8859-1' . "\r\n";
$headers.='From: Confirmação de Contato <contato@martinsrodrigues.adv.br>'; // Change Admin Reply Email In here.

mail( $customer_email, $customer_email_subject, $message, $headers, '');

$data = array(
    'status' => 1,
    'msg' => "Sua mensagem foi recebida, em breve entraremos em contato."
);

echo json_encode($data);