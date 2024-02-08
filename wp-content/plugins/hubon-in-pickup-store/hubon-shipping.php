<?php

/**
 * Plugin Name: HubOn In-store Pickup 
 * Plugin URI: https://woo.com/products/woocommerce-extension/
 * Description: Your extension's description text.
 * Version: 1.0.0
 * Author: HubOn
 * Author URI: https://letshubon.com/
 * Developer: Eka Krisna
 * Developer URI: https://letshubon.com/
 * Text Domain: woocommerce-extension
 * Domain Path: /languages
 *
 * Woo: 12345:342928dfsfhsf8429842374wdf4234sfd
 * WC requires at least: 2.2
 * WC tested up to: 2.3
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/* 
* Check if WooCommerce is active 
*/
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    function hubon_shipping_method()
    {
        if (!class_exists('Hubon_Shipping_Method')) {
            class Hubon_Shipping_Method extends WC_Shipping_Method
            {
                /** 
                 * Constructor for your shipping class 
                 * 
                 * @access public 
                 * @return void 
                 */
                public function __construct()
                {
                    $this->id                 = 'hubon';
                    $this->method_title       = __('HubOn In-store Pickup', 'hubon');
                    $this->method_description = __('Custom Shipping Method for HubOn', 'hubon');
                    // Availability & Countries 
                    // $this->availability = 'including';
                    // $this->countries = array(
                    //     'US', // Unites States of America 
                    //     'CA', // Canada 
                    //     'DE', // Germany 
                    //     'GB', // United Kingdom 
                    //     'IT',   // Italy 
                    //     'ES', // Spain 
                    //     'HR'  // Croatia 
                    // );
                    $this->init();
                    $this->enabled = isset($this->settings['enabled']) ? $this->settings['enabled'] : 'yes';
                    $this->title = isset($this->settings['title']) ? $this->settings['title'] : __('HubOn In-store Pickup', 'hubon');

                    // Check if the plugin is enabled
                    if ($this->enabled === 'yes') {
                        // Create the webhook when the plugin is enabled
                        $this->create_hubon_webhook();
                    } else {
                        // Remove the webhook when the plugin is disabled
                        $this->remove_hubon_webhook();
                    }
                }
                /** 
                 * Init your settings 
                 * 
                 * @access public 
                 * @return void 
                 */
                function init()
                {
                    // var_dump($this);
                    // Load the settings API 
                    $this->init_form_fields();
                    $this->init_settings();

                    // Save settings in admin if you have any defined 
                    add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));
                }

                /** 
                 * Define settings field for this shipping 
                 * @return void 
                 */
                function init_form_fields()
                {
                    $this->form_fields = array(
                        'enabled' => array(
                            'title' => __('Enable', 'hubon'),
                            'type' => 'checkbox',
                            'description' => __('Enable this shipping.', 'hubon'),
                            'default' => 'yes'
                        ),
                        'title' => array(
                            'title' => __('Title', 'hubon'),
                            'type' => 'text',
                            'default' => __('HubOn In-Store Pickup', 'hubon')
                        ),
                        'description' => array(
                            'title'       => __('Method Description', 'hubon'),
                            'type'        => 'text',
                            'desc_tip'    => true,
                            'description' => __('This controls the description which the user sees during checkout.', 'hubon'),
                            'default'     => __('Description of your shipping method')
                        ),
                        'hubon_key' => array(
                            'title' => __('HubOn API Key', 'hubon'),
                            'type' => 'text',
                            'desc_tip'    => true,
                            'description' => __('This controls the description which the user sees during checkout.', 'hubon'),
                            'default' => '',
                            'required' => true
                        ),
                        'hubon_price_first_bag' => array(
                            'title' => __('HubOn First Bag', 'hubon'),
                            'type' => 'text',
                            'desc_tip'    => true,
                            'description' => __('This controls the description which the user sees during checkout.', 'hubon'),
                            'default' => __('6.99', 'hubon')
                        ),
                        'hubon_price_additional' => array(
                            'title' => __('HubOn Additional Price', 'hubon'),
                            'type' => 'text',
                            'desc_tip'    => true,
                            'description' => __('This controls the description which the user sees during checkout.', 'hubon'),
                            'default' => __('6.99', 'hubon')
                        ),
                    );
                }

                /** 
                 * This function is used to calculate the shipping cost. Within this function we can check for weights, dimensions and other parameters. 
                 * 
                 * @access public 
                 * @param mixed $package 
                 * @return void 
                 */
                public function calculate_shipping($package = array())
                {
                    $rate = array(
                        'label' => $this->title,
                        'cost' => '25000',
                        'calc_tax' => 'per_item'
                    );
                    $this->add_rate($rate);
                }

                /** 
                 * Create HubOn webhook
                 * 
                 * @access public 
                 * @return void 
                 */
                public function create_hubon_webhook()
                {
                    $webhook_data = array(
                        'name' => 'HubOn Order Name',
                        'topic' => 'order.created',
                        'delivery_url' => 'http://requestb.in/1g0sxmo1',
                        'secret' => wp_generate_password(24, false),
                    );

                    // Log webhook data
                    error_log('HubOn Webhook Data: ' . print_r($webhook_data, true));

                    $webhook = new WC_Webhook();
                    $webhook->set_name($webhook_data['name']);
                    $webhook->set_topic($webhook_data['topic']);
                    $webhook->set_delivery_url($webhook_data['delivery_url']);
                    $webhook->set_secret($webhook_data['secret']);
                    $webhook->set_status('active');

                    // Save webhook
                    $webhook->save();

                    // Log success message
                    error_log('HubOn Webhook created successfully.');
                }

                /** 
                 * Remove HubOn webhook
                 * 
                 * @access public 
                 * @return void 
                 */
                public function remove_hubon_webhook()
                {
                    // Get all webhooks
                    $data_store = WC_Data_Store::load('webhook');
                    $webhooks   = $data_store->search_webhooks(['status' => 'active', 'paginate' => true]);
                    $_items     = array_map('wc_get_webhook', $webhooks->webhooks);
                    $_array     = [];
                    foreach ($_items as $_item) {
                        $_array[] = [
                            'id'            => $_item->get_id(),
                            'name'          => $_item->get_name(),
                            'topic'         => $_item->get_topic(),
                            'delivery_url'  => $_item->get_delivery_url(),
                            'secret'        => $_item->get_secret(),
                        ];
                    }
                    // var_dump($_array);
                    return;
                    global $wpdb;
                    $results = $wpdb->get_results("SELECT webhook_id, delivery_url FROM {$wpdb->prefix}wc_webhooks");
                    // var_dump($results);
                    foreach ($results as $result) {
                        if ($result->delivery_url  === 'http://requestb.in/1g0sxmo1') {
                            // Log webhook data
                            error_log('Removing HubOn Webhook: ' . print_r($result, true));
                            // Remove the webhook
                            $wh = new WC_Webhook();
                            $wh->set_id($result->webhook_id);
                            $wh->delete();
                            // Log success message
                            error_log('HubOn Webhook removed successfully.');
                            break;
                        }
                    }
                }
            }
        }

        add_action('woocommerce_new_order', 'create_hubon_webhook');
        function create_hubon_webhook($order_id)
        {
            // Check if the order exists
            $order = wc_get_order($order_id);

            // If the order is created, create the webhook
            if ($order) {
                $webhook_data = array(
                    'name' => 'HubOn Order Name',
                    'topic' => 'order.created',
                    'delivery_url' => 'http:http://requestb.in/1g0sxmo1',
                    'secret' => wp_generate_password(24, false),
                );

                // Log webhook data
                error_log('HubOn Webhook Data: ' . print_r($webhook_data, true));

                $webhook = new WC_Webhook();
                $webhook->set_name($webhook_data['name']);
                $webhook->set_topic($webhook_data['topic']);
                $webhook->set_delivery_url($webhook_data['delivery_url']);
                $webhook->set_secret($webhook_data['secret']);
                $webhook->set_status('active');

                // Save webhook
                $webhook->save();

                // Log success message
                error_log('HubOn Webhook created successfully.');
            } else {
                // Log error if order not found
                error_log('Error: Order not found with ID ' . $order_id);
            }
        }
    }
    add_action('woocommerce_shipping_init', 'hubon_shipping_method');



    function add_hubon_shipping_method($methods)
    {
        $methods[] = 'Hubon_Shipping_Method';
        return $methods;
    }
    add_filter('woocommerce_shipping_methods', 'add_hubon_shipping_method');
}
