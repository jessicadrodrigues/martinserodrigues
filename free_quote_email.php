<?php

if (!isset($_REQUEST['safety_key'])) {

    die();
}

$to = "test.you@gmail.com"; // Set Admin email address in here.

$email_subject = "Customer Free Quote Request";

$customer_name = isset( $_POST['your_name'] ) ? $_POST['your_name'] : '';
$customer_email = isset( $_POST['your_email'] ) ? $_POST['your_email'] : '';
$customer_phone = isset( $_POST['your_phone'] ) ? $_POST['your_phone'] : '';
$your_service_type = isset( $_POST['your_service_type'] ) ? $_POST['your_service_type'] : '';
$customer_message = isset( $_POST['textarea_message'] ) ? $_POST['textarea_message'] : '';

$template = 'Hello Administrator, <br/>'
        . '<br/>A customer has been submitted free quotation request. Here goes the details.<br/>'
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

$customer_email_subject = "Free Quote Confirmation";

$template = 'Hello ' . $customer_name . ',<br/>'
            . '<br/>Thanks for submitting free quote request. One of our customer support representative will contact you very soon. <br>Regards.<br/>';
$message = "<div>" . $template . "</div>";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers.='Content-type: text/html; charset=utf-8; charset=iso-8859-1' . "\r\n";
$headers.='From: Free Quote Confirmation <no-reply@yoursite.com>'; // Change Admin Reply Email In here.

mail( $customer_email, $customer_email_subject, $message, $headers, '');

$data = array(
    'status' => 1,
    'msg' => "Your Query has been received, We will contact you soon."
);

echo json_encode($data);