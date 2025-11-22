<?php
/**
 * Template part for displaying posts
 *
 * @package Modern_Portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;

        if ( 'post' === get_post_type() ) :
            ?>
            <div class="entry-meta">
                <?php
                modern_portfolio_posted_on();
                modern_portfolio_posted_by();
                ?>
            </div>
        <?php endif; ?>
    </header>

    <?php modern_portfolio_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        if ( is_singular() ) {
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'modern-portfolio' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'modern-portfolio' ),
                    'after'  => '</div>',
                )
            );
        } else {
            the_excerpt();
        }
        ?>
    </div>

    <footer class="entry-footer">
        <?php modern_portfolio_entry_footer(); ?>
    </footer>
</article>
