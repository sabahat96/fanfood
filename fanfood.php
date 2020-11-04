<?php
/*
  Plugin name: FanFood
  Plugin URI: #
  Description: Custom plugin to get quotes of stores and sell products at same time
  Author: Shopdev
  Author URI: https://shopdev.co/
  Version: 1.0
  */

define('SHOPDEV_CLASSES_DIR', __DIR__ . '/classes');
define('SHOPDEV_PAGES_DIR', __DIR__ . '/forms');

$root = dirname(dirname(dirname(dirname(__FILE__))));
if (file_exists($root.'/wp-load.php')) {
    require_once($root.'/wp-load.php');
}
require_once('vendor/autoload.php');

class Fanfood{

    protected $instance;

    public function __construct()
    {
        if (!session_id())
            session_start();

        add_action('admin_menu', array($this, 'fanfoodMenu'));

        register_deactivation_hook(__file__, array(&$this, 'down'));
        register_activation_hook(__file__,  array(&$this, 'up')) ;
        //shortcodes
        add_shortcode( 'fanfood_form', array(&$this, 'form') );


        return $this->instance;
    }

    public function fanfoodMenu()
    {
        add_menu_page('fanfood', 'fanfood', 'manage_options', 'fanfood', array(&$this, 'dashboard'), '');
        add_submenu_page('fanfood', 'Products', 'Fanfood Products', 'manage_options', 'fanfood-products', array(&$this, 'stripe'));
    }

    public function dashboard(){
            
    }

    public function getProducts() {
        require_once SHOPDEV_CLASSES_DIR . '/api.php';
        $api = new API();
        return $api->getProducts('5d052cd2-89e0-449b-a502-9f8664f7952f');
    }

    public function form(){
        ob_start();
        $products=$this->getProducts();
         include 'forms/index.php';
        return ob_get_clean();
    }

    public function stripe(){
        require_once SHOPDEV_CLASSES_DIR . '/stripe.php';
        $stripe = new Stripe();
        $stripe->index();
    }
}

$obj = new Fanfood();


