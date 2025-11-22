<?php
/**
 * The main template file
 *
 * @package Modern_Portfolio
 */

get_header();
?>

<?php if ( is_front_page() ) : ?>
    <?php get_template_part( 'template-parts/content', 'front-page' ); ?>
<?php else : ?>
    <main id="main" class="site-main">
        <div class="container">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content', get_post_type() );
                endwhile;

                the_posts_navigation();
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
        </div>
    </main>
<?php endif; ?>

<?php
get_footer();
