<?php
/**
 * Class Ds_Init
 * 
 * All init functions for Delivery System
 * 
 * @package Ds_Init
 * @author Marko Radulovic <upss070288@gmail.com>
 * @version 1.0.0
 * @since 1.0.0
 */

if ( !class_exists( 'Ds_Init' ) ) {

    class Ds_Init {
        public function __construct() {
            add_action( 'woocommerce_before_checkout_form', array( $this, 'trigger_checkout_page' ), 10 );
            add_action( 'woocommerce_thankyou', array( $this, 'trigger_thankyou_page' ) );
            add_action( 'woocommerce_email_after_order_table', array( $this, 'trigger_email_invoice' ), 10, 4 );
            add_action( 'add_meta_boxes', array( $this, 'single_order_msg' ) );
        }

        // Check weekdays
        protected function check_weekdays() {
            switch ( date('w') ) {
                case 1: 
                    return "mon";
                    break;
                case 2: 
                    return 'tue';
                    break;
                case 3: 
                    return 'wed';
                    break;
                case 4: 
                    return 'thu';
                    break;
                case 5: 
                    return 'fri';
                    break;
                case 6: 
                    return 'sat';
                    break;
                case 0: 
                    return 'sun';
                    break;
            }
        }

        // Weekdays conditional logic
        protected function weekdays_condition() {
            if ( $this->check_weekdays() == 1 || $this->check_weekdays() == 2 ) {
                echo '<h2 class="order-delivery-msg">Your order will be delivered on Thursday</h2>';
            } elseif ( $this->check_weekdays() == 3 || $this->check_weekdays() == 4 || $this->check_weekdays() == 5 || $this->check_weekdays() == 6 || $this->check_weekdays() == 0 ) {
                echo '<h2 class="order-delivery-msg">Your order will be delivered on Tuesday</h2>';
            } else {
                echo 'You don\'t have to access to order.';
            }
        }

        // Add condition on checkout page
        public function trigger_checkout_page() {
            $this->weekdays_condition();
        }

        // Add condition on thank you page
        public function trigger_thankyou_page() {
            $this->weekdays_condition();
        }

        // Trigger new order and processing order email invoice
        public function trigger_email_invoice( $order, $sent_to_admin, $plain_text, $email ) {
            $this->weekdays_condition();
        }
    }

    new Ds_Init();
}