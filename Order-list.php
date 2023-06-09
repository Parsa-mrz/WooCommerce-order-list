<?php
/*
Plugin Name:  Order List
Plugin URI: #
Description: This plugin allows you to have own orders list to show
Author: Parsa Mirzaie
Version: 1.0.0
Author URI: https://eskanogroup.ir
Text Domain: order_list
License: GPL2
Developers => 
          Parsa Mirzaie -> PHP Developer : https://github.com/Parsa-mrz/
          Masih Balali =>  Frontend Developer : https://github.com/Masihbalali

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
        $this->add_classes();
        add_action('wp_enqueue_scripts', [$this, 'add_style']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_custom_admin_styles']);
    }

    public function add_classes()
    {
        require_once(ORD_LI_DIR  . 'App/Dashboard/Menu.php');
        require_once(ORD_LI_DIR  . 'App/Order/Complete.php');
        require_once(ORD_LI_DIR  . 'App/Order/Refunded.php');
        require_once(ORD_LI_DIR  . 'App/Order/Failed.php');
        require_once(ORD_LI_DIR  . 'App/Order/Processing.php');
    }

    public function add_style()
    {
        wp_register_style('WC_order_list_style', ORD_LI_URL . 'src/css/style.css');
        wp_enqueue_style('WC_order_list_style');
    }
    function enqueue_custom_admin_styles()
    {
        wp_enqueue_style('custom-admin-styles', ORD_LI_URL . 'src/css/admin.css');
    }
}
new OrderList();
