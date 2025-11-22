<?php
/**
 * Portfolio Section Template
 *
 * @package Modern_Portfolio
 */

$portfolio_query = new WP_Query( array(
    'post_type'      => 'portfolio',
    'posts_per_page' => 6,
    'orderby'        => 'date',
    'order'          => 'DESC',
) );
?>

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html__( 'Latest Works', 'modern-portfolio' ); ?></h2>
        <?php if ( $portfolio_query->have_posts() ) : ?>
            <div class="portfolio-grid">
                <?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
                    <?php
                    $categories = get_the_terms( get_the_ID(), 'portfolio_category' );
                    $category_slug = 'all';
                    if ( $categories && ! is_wp_error( $categories ) ) {
                        $category_slug = $categories[0]->slug;
                    }
                    ?>
                    <div class="portfolio-item" data-category="<?php echo esc_attr( $category_slug ); ?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large', array( 'alt' => get_the_title() ) ); ?>
                        <?php else : ?>
                            <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?w=500&h=600&fit=crop" alt="<?php echo esc_attr( get_the_title() ); ?>">
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="portfolio-link"></a>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="load-more-wrapper">
                <a href="<?php echo esc_url( get_post_type_archive_link( 'portfolio' ) ); ?>" class="load-more-btn">
                    <?php echo esc_html__( 'Load More', 'modern-portfolio' ); ?> <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php echo esc_html__( 'No portfolio items found.', 'modern-portfolio' ); ?></p>
        <?php endif; ?>
    </div>
</section>
