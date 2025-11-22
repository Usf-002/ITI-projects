<?php
/**
 * Timeline Section Template
 *
 * @package Modern_Portfolio
 */

// Get timeline items from custom post type or pages
$timeline_items = get_posts( array(
    'post_type'      => 'page',
    'posts_per_page' => 5,
    'meta_key'       => '_is_timeline',
    'meta_value'     => 'yes',
    'orderby'        => 'meta_value',
    'meta_key'       => '_timeline_year',
    'order'          => 'ASC',
) );

if ( empty( $timeline_items ) ) {
    // Sample timeline items
    $timeline_data = array(
        array( 'year' => '2016', 'title' => 'Bachelor Degree of Design', 'subtitle' => 'University Name' ),
        array( 'year' => '2017', 'title' => 'UI/UX Design Certificate', 'subtitle' => 'Course Platform' ),
        array( 'year' => '2017', 'title' => 'Web Designer', 'subtitle' => 'Freelancer' ),
        array( 'year' => '2018', 'title' => 'Graphic Designer', 'subtitle' => 'Company Name' ),
        array( 'year' => '2019 - Present', 'title' => 'Creative Director / Founder', 'subtitle' => 'Studio Name' ),
    );
}
?>

<!-- Education & Experience -->
<section class="timeline-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html__( 'Education & Experience', 'modern-portfolio' ); ?></h2>
        <div class="timeline">
            <?php if ( ! empty( $timeline_items ) ) : ?>
                <?php foreach ( $timeline_items as $item ) : ?>
                    <?php
                    $year = get_post_meta( $item->ID, '_timeline_year', true );
                    $subtitle = get_post_meta( $item->ID, '_timeline_subtitle', true );
                    ?>
                    <div class="timeline-item">
                        <h6><?php echo esc_html( $year ? $year : get_the_date( 'Y', $item ) ); ?></h6>
                        <h4><?php echo esc_html( get_the_title( $item ) ); ?></h4>
                        <h6 class="subtitle"><?php echo esc_html( $subtitle ? $subtitle : get_the_excerpt( $item ) ); ?></h6>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <?php foreach ( $timeline_data as $item ) : ?>
                    <div class="timeline-item">
                        <h6><?php echo esc_html( $item['year'] ); ?></h6>
                        <h4><?php echo esc_html( $item['title'] ); ?></h4>
                        <h6 class="subtitle"><?php echo esc_html( $item['subtitle'] ); ?></h6>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
