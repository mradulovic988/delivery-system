<?php
// Change the default AJAX call
add_action( 'pt-ocdi/time_for_one_ajax_call', 'mlab_ajax_call' );
function mlab_ajax_call() {
	return 10;
}

// Including files for the delivery system
require get_stylesheet_directory() . '/delivery-system/Ds_Init.php';

// Enqueue all necessary scripts and styles for front-end
add_action( 'wp_enqueue_scripts', 'mlab_enqueue_scripts' );
function mlab_enqueue_scripts() {
	wp_enqueue_script(
		'mlab_script',
		get_stylesheet_directory_uri() . '/assets/js/mlab_script.js',
		array(), '1.0.0', true
	);

	wp_enqueue_script(
		'mlab_localstorage_script',
		get_stylesheet_directory_uri() . '/assets/js/mlab_localstorage_script.js',
		array(), '1.0.0', true
	);

	wp_enqueue_script(
		'mlab_countdown_script',
		get_stylesheet_directory_uri() . '/assets/js/mlab_countdown_script.js',
		array(), '1.0.0', true
    );
    
	wp_enqueue_script(
		'mlab_delivery_system',
		get_stylesheet_directory_uri() . '/assets/js/mlab_delivery_system.js',
		array(), '1.0.0', true
	);
}

// Enqueue all necessary scripts and styles for the admin part
add_action( 'admin_enqueue_scripts', 'mlab_admin_enqueue_scripts' );
function mlab_admin_enqueue_scripts(){
	wp_enqueue_script(
		'mlab_admin_script',
		get_stylesheet_directory_uri() . '/assets/js/mlab_admin_script.js',
		array(), '1.0.0', true
	);
}

// Adding nutrition table on single product from hidden ACF fields inside single product
add_action( 'woocommerce_after_single_product_summary', 'mlab_add_single_nutrition_table' );
function mlab_add_single_nutrition_table(){

	if( is_product() && get_the_id() == 29215 ) { ?>
        <style>.nutrition-fact.nutrition-fact-ajax{display:none}</style>
    <?php }

    $calories       = get_field('calories');
    $protein        = get_field('protein');
    $fats           = get_field('fats');
    $carbohydrates  = get_field('carbohydrates');

    ?>

    <!-- nutrition-->
    <div id="single_product_nutr">
        <div class="col-xs-12 col-sm-5 wow fadeInLeft">
            <div class="nutrition-fact nutrition-fact-ajax">
                <h6><?php echo esc_html__('Nutrition Facts', 'madang'); ?></h6>
                <div class="facts-table">
                    <table>
                        <tbody>
                            <tr>
                                <td><span><?php echo esc_html__('Calories', 'madang'); ?></span></td>
                                <td><span class="cart_calories"><?= !empty($calories) ? $calories : 'Not specified'; ?></span></td>
                            </tr>
                            <tr>
                                <td><span class="cart_proteins"><?php echo esc_html__('Proteins', 'madang'); ?></span></td>
                                <td><span class="cart_proteins"><?= !empty($protein) ? $protein : 'Not specified'; ?></span></td>
                            </tr>
                            <tr>
                                <td><span><?php echo esc_html__('Fats', 'madang'); ?></span></td>
                                <td><span class="cart_fats"><?= !empty($fats) ? $fats : 'Not specified'; ?></span></td>
                            </tr>
                            <tr>
                                <td><span><?php echo esc_html__('Carbohydrates', 'madang'); ?></span></td>
                                <td><span class="cart_carbohydrates"><?= !empty($carbohydrates) ? $carbohydrates : 'Not specified'; ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- nutritation ends-->

<?php
}

// Added modal popup on header page
add_action( 'wp_head', function(){

    echo '<div id="myModal" class="modal"> 
        <div class="modal-content"> 
            <span class="close">&times;</span> 
            <h4 class="modal-welcome">Hi there, let\'s check the delivery postcode</h4>
            <p class="modal-desc">Please enter your delivery postcode below to check if we deliver to your area.</p>
            <form id="postal-form"> 
                <small id="notice"></small>
                <input type="text" name="postalcode" id="postal-code" placeholder="Enter your Postcode"> 
                <button type="submit" id="postal-submit">Check Postcode</button> 
            </form> 
            <div id="modal-notice"></div>
            <!-- Begin Mailchimp Signup Form -->
        </div>
    </div>';

	// Added modal popup on header page for the compare pricing
	echo '<div id="myModal3" class="modal3"> 
        <div class="modal-content3"> 
            <span class="close3">&times;</span> 
            <h4 class="modal-welcome3">Hi there, let\'s check the delivery postcode</h4>
            <p class="modal-desc3">Please enter your delivery postcode below to check if we deliver to your area.</p>
            <form id="postal-form3"> 
                <small id="notice3"></small>
                <input type="text" name="postalcode3" id="postal-code3" placeholder="Enter your Postcode"> 
                <button type="submit" id="postal-submit3">Check Postcode</button> 
            </form> 
            <div id="modal-notice3"></div>
        </div>
    </div>';

	// Added modal popup on header for mobile
	echo '<div id="myModal2" class="modal2">
        <div class="modal-content2">
            <span class="close2">&times;</span>
            <h4 class="modal-welcome2">Hi there, let\'s check the delivery postcode</h4>
            <p class="modal-desc2">Please enter your delivery postcode below to check if we deliver to your area.</p>
            <form id="postal-form2">
                <small id="notice2"></small>
                <input type="text" name="postalcode2" id="postal-code2" placeholder="Enter your Postcode">
                <button type="submit" id="postal-submit2">Check Postcode</button>
            </form>
            <div id="modal-notice2"></div>
        </div>
    </div>';
});