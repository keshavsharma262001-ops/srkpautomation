<?php
/**
 * Shared layout for SRKP marketing page templates.
 *
 * @package Astra_Child
 */

if ( ! isset( $srkp_page_data ) || ! is_array( $srkp_page_data ) ) {
    return;
}

$srkp_page_data = wp_parse_args(
    $srkp_page_data,
    array(
        'eyebrow'     => '',
        'title'       => get_the_title(),
        'description' => '',
        'hero_image'  => '',
        'sections'    => array(),
    )
);

get_header( 'home' );
?>

<main class="srkp-homepage srkp-inner-page">
    <section class="srkp-page-hero">
        <div class="container srkp-page-hero__grid">
            <div class="srkp-page-hero__copy anim-load anim-delay-1">
                <?php if ( $srkp_page_data['eyebrow'] ) : ?>
                    <span class="srkp-eyebrow"><?php echo esc_html( $srkp_page_data['eyebrow'] ); ?></span>
                <?php endif; ?>
                <h1><?php echo esc_html( $srkp_page_data['title'] ); ?></h1>
                <?php if ( $srkp_page_data['description'] ) : ?>
                    <p><?php echo esc_html( $srkp_page_data['description'] ); ?></p>
                <?php endif; ?>
                <a class="srkp-cta srkp-quote-trigger" href="#srkp-quote-modal">Get a Free Quote</a>
            </div>

            <?php if ( $srkp_page_data['hero_image'] ) : ?>
                <div class="srkp-page-hero__media anim-load anim-delay-2">
                    <img src="<?php echo esc_url( $srkp_page_data['hero_image'] ); ?>" alt="<?php echo esc_attr( $srkp_page_data['title'] ); ?>">
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="srkp-section srkp-page-sections">
        <div class="container">
            <?php if ( ! empty( $srkp_page_data['sections'] ) ) : ?>
                <div class="srkp-page-section-grid">
                    <?php foreach ( $srkp_page_data['sections'] as $index => $section ) : ?>
                        <article class="srkp-page-card anim-scroll anim-zoom-in anim-delay-<?php echo esc_attr( ( $index % 4 ) + 1 ); ?>">
                            <div class="srkp-page-card__media">
                                <img src="<?php echo esc_url( $section['image'] ); ?>" alt="<?php echo esc_attr( $section['title'] ); ?>">
                            </div>
                            <div class="srkp-page-card__content">
                                <h2><?php echo esc_html( $section['title'] ); ?></h2>
                                <p><?php echo esc_html( $section['description'] ); ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php
            if ( isset( $srkp_extra_template ) && $srkp_extra_template ) {
                get_template_part( $srkp_extra_template );
            }
            ?>
        </div>
    </section>
</main>

<?php get_footer( 'home' ); ?>
