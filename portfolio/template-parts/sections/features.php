<?php
/**
 * Features Section Template
 *
 * @package Modern_Portfolio
 */

// Get features from pages or custom fields
$features = get_posts( array(
    'post_type'      => 'page',
    'posts_per_page' => 3,
    'meta_key'       => '_is_feature',
    'meta_value'     => 'yes',
) );

if ( empty( $features ) ) {
    // Default features if none are set
    $features = get_posts( array(
        'post_type'      => 'page',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );
}
?>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <div class="features-grid">
            <?php foreach ( $features as $index => $feature ) : setup_postdata( $feature ); ?>
                <div class="feature-item">
                    <?php if ( $index === 1 ) : ?>
                        <h5><?php echo esc_html( get_the_title( $feature ) ); ?></h5>
                        <p><?php echo esc_html( get_the_excerpt( $feature ) ); ?></p>
                        <?php if ( has_post_thumbnail( $feature ) ) : ?>
                            <div class="feature-image">
                                <?php echo get_the_post_thumbnail( $feature, 'medium', array( 'alt' => get_the_title( $feature ) ) ); ?>
                            </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if ( has_post_thumbnail( $feature ) ) : ?>
                            <div class="feature-image">
                                <?php echo get_the_post_thumbnail( $feature, 'medium', array( 'alt' => get_the_title( $feature ) ) ); ?>
                            </div>
                        <?php endif; ?>
                        <h5><?php echo esc_html( get_the_title( $feature ) ); ?></h5>
                        <p><?php echo esc_html( get_the_excerpt( $feature ) ); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>
