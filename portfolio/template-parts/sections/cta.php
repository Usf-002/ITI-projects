<?php
/**
 * CTA Section Template
 *
 * @package Modern_Portfolio
 */

$cta_title = get_theme_mod( 'cta_title', 'Let\'s take our relationship to the next level for your business' );
$cta_image = get_theme_mod( 'cta_image' );
?>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <div class="cta-text">
                <h5><?php echo esc_html__( 'LET\'S TALK!', 'modern-portfolio' ); ?></h5>
                <h1><?php echo esc_html( $cta_title ); ?></h1>
                <a href="#contact" class="cta-btn"><?php echo esc_html__( 'Let\'s Talk', 'modern-portfolio' ); ?> <span>→</span></a>
            </div>
            <div class="cta-image">
                <?php if ( $cta_image ) : ?>
                    <img src="<?php echo esc_url( $cta_image ); ?>" alt="<?php echo esc_attr__( 'Professional', 'modern-portfolio' ); ?>">
                <?php else : ?>
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&h=800&fit=crop" alt="<?php echo esc_attr__( 'Professional', 'modern-portfolio' ); ?>">
                <?php endif; ?>
            </div>
            <div class="cta-quote">
                <h5>*<?php echo esc_html( strtoupper( get_bloginfo( 'name' ) ) ); ?> ®</h5>
                <h4>- <?php echo esc_html( get_bloginfo( 'description' ) ); ?></h4>
            </div>
        </div>
    </div>
</section>
