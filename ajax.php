<?php

define('SHOPDEV_CLASSES_DIR', __DIR__ . '/classes');
$root = dirname(dirname(dirname(dirname(__FILE__))));
if (file_exists($root.'/wp-load.php')) {
    require_once($root.'/wp-load.php');
}

require_once('vendor/autoload.php');

if(isset($_POST)){
    if(isset($_POST['card_number']) AND isset($_POST['account_title']) AND isset($_POST['expiry_date']) AND isset($_POST['cvc'])){
        if(!empty($_POST['card_number']) AND !empty($_POST['account_title']) AND !empty($_POST['expiry_date']) AND !empty($_POST['cvc'])){
            $formData = $_POST;

            require_once SHOPDEV_CLASSES_DIR . '/stripe.php';
            $stripe = new Stripe();
            $data=$stripe->payment($formData);
            echo json_encode($data);


        }else{
            echo json_encode('All fields of payment are required');
            return false;
        }
    }else{
        echo json_encode('All fields of payment are required');
        return false;
    }
}
