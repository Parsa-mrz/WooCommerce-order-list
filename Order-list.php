<?php
/*
Plugin Name:  Order List
Plugin URI: #
Description: This plugin allows you to have own orders list to show
Author: Parsa Mirzaie
Version: 1.0.0
Author URI: https://eskanogroup.ir
Text Domain: Social
License: GPL2
Developers => 
          Parsa Mirzaie -> PHP Developer : https://github.com/Parsa-mrz/
*/
defined( 'ABSPATH' ) || exit;
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
    define("SOCL_DIR", plugin_dir_path(__FILE__));
    define("SOCL_URL", plugin_dir_url(__FILE__));
  }
  public function init()
  {
    register_activation_hook(__FILE__, [$this, 'activation']);
    register_deactivation_hook(__FILE__, [$this, 'deactivation']);
  }
}
new OrderList();
