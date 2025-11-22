<?php
/**
 * Hero Section Template
 *
 * @package Modern_Portfolio
 */

$hero_title = get_theme_mod( 'hero_title', 'Illustrator & Visual Designer' );
$hero_description = get_theme_mod( 'hero_description', 'I\'m a Designer & Developer, creating minimal modern designs and products. I\'m passionate about crafting beautiful digital experiences.' );
$years_experience = get_theme_mod( 'years_experience', '6' );
$projects_done = get_theme_mod( 'projects_done', '683' );
$hero_image = get_theme_mod( 'hero_image' );
?>

<!-- Hero Section -->
<section id="home" class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-left">
                <div class="hero-text">
                    <h1 class="hero-title"><?php echo esc_html( $hero_title ); ?></h1>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <h2><?php echo esc_html( $years_experience ); ?></h2>
                            <p>YEARS OF<br>EXPERIENCE</p>
                        </div>
                        <div class="stat-item">
                            <h2><?php echo esc_html( $projects_done ); ?></h2>
                            <p>PROJECTS<br>DONE</p>
                        </div>
                    </div>
                </div>
                <div class="hero-about">
                    <span class="about-icon">✨</span>
                    <h4><?php echo esc_html( $hero_description ); ?></h4>
                    <ul class="social-links">
                        <?php if ( get_theme_mod( 'social_instagram' ) ) : ?>
                            <li><a href="<?php echo esc_url( get_theme_mod( 'social_instagram' ) ); ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'social_tiktok' ) ) : ?>
                            <li><a href="<?php echo esc_url( get_theme_mod( 'social_tiktok' ) ); ?>" target="_blank" rel="noopener" aria-label="Tiktok"><i class="fab fa-tiktok"></i></a></li>
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'social_dribbble' ) ) : ?>
                            <li><a href="<?php echo esc_url( get_theme_mod( 'social_dribbble' ) ); ?>" target="_blank" rel="noopener" aria-label="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'social_behance' ) ) : ?>
                            <li><a href="<?php echo esc_url( get_theme_mod( 'social_behance' ) ); ?>" target="_blank" rel="noopener" aria-label="Behance"><i class="fab fa-behance"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="hero-right">
                <div class="filter-section">
                    <span class="filter-icon">🎨</span>
                    <div class="filter-buttons">
                        <button class="filter-btn active" data-filter="all">All</button>
                        <?php
                        $portfolio_categories = get_terms( array(
                            'taxonomy'   => 'portfolio_category',
                            'hide_empty' => false,
                        ) );

                        if ( ! empty( $portfolio_categories ) && ! is_wp_error( $portfolio_categories ) ) {
                            foreach ( $portfolio_categories as $category ) {
                                echo '<button class="filter-btn" data-filter="' . esc_attr( $category->slug ) . '">' . esc_html( $category->name ) . '</button>';
                            }
                        }
                        ?>
                    </div>
                    <div class="contact-info">
                        <p class="hire-label">*HIRE ME!</p>
                        <ul>
                            <?php if ( get_theme_mod( 'contact_location' ) ) : ?>
                                <li>📍 <?php echo esc_html( get_theme_mod( 'contact_location' ) ); ?></li>
                            <?php endif; ?>
                            <?php if ( get_theme_mod( 'contact_email' ) ) : ?>
                                <li>✉️ <?php echo esc_html( get_theme_mod( 'contact_email' ) ); ?></li>
                            <?php endif; ?>
                            <?php if ( get_theme_mod( 'contact_phone' ) ) : ?>
                                <li>📞 <?php echo esc_html( get_theme_mod( 'contact_phone' ) ); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="hero-image">
                    <?php if ( $hero_image ) : ?>
                        <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php echo esc_attr( $hero_title ); ?>">
                    <?php else : ?>
                        <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=600&h=800&fit=crop" alt="<?php echo esc_attr( $hero_title ); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
