/**
 * Order delivery system
 * 
 * @author Marko Radulovic
 * @since 1.0.0
 * @version 1.0.0
 */

'use strict';

if (document.body.classList.contains('page-id-29161')) {
    const insertAfter = (targetedValueBefore, referencedValueBefore) => referencedValueBefore.after(targetedValueBefore);
    const orderDeliveryMsg = document.querySelector('.order-delivery-msg');

    insertAfter(orderDeliveryMsg, document.querySelector('.woocommerce-thankyou-order-received'));
}