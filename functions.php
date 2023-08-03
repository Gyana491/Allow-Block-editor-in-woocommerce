//Allow Block Editor In Woocommerce

// Disable new WooCommerce product template (from Version 7.7.0)
function restored_reset_product_template($post_type_args) {
    if (array_key_exists('template', $post_type_args)) {
        unset($post_type_args['template']);
    }
    return $post_type_args;
}
add_filter('woocommerce_register_post_type_product', 'restored_reset_product_template');
// Enable Gutenberg editor for WooCommerce
function restored_activate_gutenberg_product($can_edit, $post_type) {
    if ($post_type == 'product') {
        $can_edit = true;
    }
    return $can_edit;
}
add_filter('use_block_editor_for_post_type', 'restored_activate_gutenberg_product', 10, 2);

// Enable taxonomy fields for woocommerce with gutenberg on
function restored_enable_taxonomy_rest($args) {
    $args['show_in_rest'] = true;
    return $args;
}
add_filter('woocommerce_taxonomy_args_product_cat', 'restored_enable_taxonomy_rest');
add_filter('woocommerce_taxonomy_args_product_tag', 'restored_enable_taxonomy_rest');;
