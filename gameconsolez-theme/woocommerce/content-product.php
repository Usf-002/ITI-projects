<?php
/**
 * Product card template
 */
global $product;

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="product-card">
    <a href="<?php echo esc_url(get_permalink()); ?>">
        <?php 
        if ($product->get_image_id()) {
            echo $product->get_image('woocommerce_thumbnail', array('class' => 'product-image'));
        } else {
            echo '<div class="product-image" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center; height: 250px;"><span style="font-size: 48px;">📦</span></div>';
        }
        ?>
    </a>
    <div class="product-info">
        <h3 class="product-title">
            <a href="<?php echo esc_url(get_permalink()); ?>">
                <?php echo esc_html(get_the_title()); ?>
            </a>
        </h3>
        <div class="product-price">
            <?php echo $product->get_price_html(); ?>
        </div>
        <?php
        echo apply_filters(
            'woocommerce_loop_add_to_cart_link',
            sprintf(
                '<a href="%s" data-quantity="%s" class="%s add-to-cart-btn" %s>%s</a>',
                esc_url($product->add_to_cart_url()),
                esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
                esc_attr(isset($args['class']) ? $args['class'] : 'button'),
                isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
                esc_html($product->add_to_cart_text())
            ),
            $product,
            $args
        );
        ?>
    </div>
</div>
