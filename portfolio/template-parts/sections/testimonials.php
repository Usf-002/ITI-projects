<?php
/**
 * Testimonials Section Template
 *
 * @package Modern_Portfolio
 */

$testimonials = new WP_Query( array(
    'post_type'      => 'testimonial',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
) );
?>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html__( 'Testimonial Client', 'modern-portfolio' ); ?></h2>
        <?php if ( $testimonials->have_posts() ) : ?>
            <div class="testimonials-container">
                <div class="testimonials-carousel">
                    <?php $slide_index = 0; ?>
                    <?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
                        <div class="testimonial-slide <?php echo $slide_index === 0 ? 'active' : ''; ?>">
                            <div class="testimonial-card">
                                <div class="testimonial-header">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title() ) ); ?>
                                    <?php else : ?>
                                        <img src="https://i.pravatar.cc/150?img=<?php echo esc_attr( $slide_index + 1 ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                                    <?php endif; ?>
                                    <div>
                                        <?php
                                        $client_name = get_the_title();
                                        $client_title = get_post_meta( get_the_ID(), '_client_title', true );
                                        ?>
                                        <strong><?php echo esc_html( $client_name ); ?></strong>
                                        <p><?php echo esc_html( $client_title ? $client_title : 'Client' ); ?></p>
                                    </div>
                                </div>
                                <p><?php echo esc_html( get_the_content() ); ?></p>
                            </div>
                        </div>
                        <?php $slide_index++; ?>
                    <?php endwhile; ?>
                </div>
                <div class="carousel-controls">
                    <button class="carousel-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
                    <button class="carousel-btn next-btn"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php echo esc_html__( 'No testimonials found.', 'modern-portfolio' ); ?></p>
        <?php endif; ?>
    </div>
</section>
