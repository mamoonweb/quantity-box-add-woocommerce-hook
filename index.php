<?php
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );

function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {

    $cartIcon= '<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"><g><path d="M8.5,16.71H22a0.74,0.74,0,0,0,.71-0.54l3-10.39a0.74,0.74,0,0,0-.71-0.95H6.79L6.26,2.45a0.74,0.74,0,0,0-.72-0.58H1.08a0.74,0.74,0,0,0,0,1.48H4.94L7.61,15.41a2.23,2.23,0,0,0,.88,4.27H22a0.74,0.74,0,1,0,0-1.48H8.5A0.74,0.74,0,0,1,8.5,16.71ZM23.94,6.32l-2.54,8.9H9.09l-2-8.9H23.94Z"/><path d="M7.76,21.9A2.23,2.23,0,1,0,10,19.68,2.23,2.23,0,0,0,7.76,21.9ZM10,21.16a0.74,0.74,0,1,1-.74.74A0.74,0.74,0,0,1,10,21.16Z"/><path d="M18.24,21.9a2.23,2.23,0,1,0,2.23-2.23A2.23,2.23,0,0,0,18.24,21.9Zm2.23-.74a0.74,0.74,0,1,1-.74.74A0.74,0.74,0,0,1,20.47,21.16Z"/></g></svg>
';

    if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
        $html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart custom-cart" method="post" enctype="multipart/form-data">';
        $html .= woocommerce_quantity_input( array(), $product, false );
        $html .= '<div class="custom-price-btn"> <button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . $cartIcon.'  </button> <div>';
        $html .= '</form>';
    }
    return $html;
}
?>
