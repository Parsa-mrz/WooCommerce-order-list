<?php 
namespace App\Order;

class Proccessing{

    public function __construct()
    {
        $this->add_shortcode();
    }

    public function loadView()
    {
        // pass orders to view 
        $proccessing_orders = $this->get_proeccessing_order();
        include_once(ORD_LI_DIR  . '/src/templates/orders/proccessing.view.php');
    }
    public function add_shortcode()
    {
        add_shortcode('proccessing-view', [$this, 'loadView']);
        add_shortcode('proccessing-count', [$this, 'proccessing_order_count']);
    }

    public function get_proeccessing_order()
    {
        $proccessing_orders = wc_get_orders(array(
            'status' => array('processing'),
            'numberposts' => -1,
            'customer_id' => get_current_user_id(),
        ));
        return $proccessing_orders;
    }
    public function proccessing_order_count()
    {
        $proccessing_orders = $this->get_proeccessing_order();
        return count($proccessing_orders);
    }
}
new Proccessing();