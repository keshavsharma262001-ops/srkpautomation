<?php
/**
 * Custom home header template.
 *
 * @package Astra_Child
 */

$upload_dir = wp_upload_dir();
$logo_url   = trailingslashit( $upload_dir['baseurl'] ) . '2026/04/cropped-srkpautomation.png';
$logo_html  = has_custom_logo()
    ? get_custom_logo()
    : sprintf(
        '<a class="srkp-brand" href="%1$s" aria-label="%2$s"><img src="%3$s" alt="%4$s"></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_url ),
        esc_attr( get_bloginfo( 'name' ) )
    );

$header_menu_args = array(
    'theme_location' => 'primary',
    'menu'           => 'Header',
    'container'      => false,
    'menu_class'     => 'srkp-menu',
    'fallback_cb'    => false,
);
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'srkp-home-template' ); ?>>
<?php wp_body_open(); ?>
<header class="srkp-header anim-load">
    <div class="container srkp-header__inner">
        <?php echo $logo_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

        <nav class="srkp-nav" aria-label="Primary">
            <?php
            wp_nav_menu( $header_menu_args );
            ?>
        </nav>

        <a class="srkp-cta srkp-cta--small srkp-quote-trigger" href="#srkp-quote-modal">Get a Free Quote</a>

        <button class="srkp-mobile-toggle" type="button" aria-expanded="false" aria-controls="srkp-mobile-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <div id="srkp-mobile-menu" class="srkp-mobile-menu" hidden>
        <?php
        wp_nav_menu( $header_menu_args );
        ?>
        <a class="srkp-cta srkp-cta--mobile srkp-quote-trigger" href="#srkp-quote-modal">Get a Free Quote</a>
    </div>
</header>
