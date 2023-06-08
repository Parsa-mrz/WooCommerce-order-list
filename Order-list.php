<?php
/*
Plugin Name:  Order List
Plugin URI: #
Description: This plugin allows you to have own orders list to show
Author: Parsa Mirzaie
Version: 1.0.0
Author URI: https://eskanogroup.ir
Text Domain: wc-order-list
License: GPL2
Developers => 
          Parsa Mirzaie -> PHP Developer : https://github.com/Parsa-mrz/
*/
defined('ABSPATH') || exit;
class OrderList
{
    public function __construct()
    {
        $this->define_constant();
        $this->init();
    }
    public function activation()
    {
    }
    public function deactivation()
    {
    }
    public function define_constant()
    {
        define("ORD_LI_DIR", plugin_dir_path(__FILE__));
        define("ORD_LI_URL", plugin_dir_url(__FILE__));
    }
    public function init()
    {
        register_activation_hook(__FILE__, [$this, 'activation']);
        register_deactivation_hook(__FILE__, [$this, 'deactivation']);
        require_once(ORD_LI_DIR . DIRECTORY_SEPARATOR . 'vendor/autoload.php');
        $this->add_classes();
        $this->add_style();
    }

    public function add_classes()
    {
        require_once(ORD_LI_DIR . DIRECTORY_SEPARATOR . 'App/Dashboard/Menu.php');
        require_once(ORD_LI_DIR . DIRECTORY_SEPARATOR . 'App/Order/Complete.php');
    }

    public function add_style(){
        wp_register_style( 'WC_order_list_style', ORD_LI_URL . 'src/css/style.css');
        wp_enqueue_style( 'WC_order_list_style' );
    }
}
new OrderList();
